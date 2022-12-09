<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClientResource;
use App\Http\Resources\FacebookBillResource;
use App\Http\Resources\FacebookBillsDateResource;
use App\Models\Client;
use App\Models\FacebookBill;
use App\Models\FacebookBillsDate;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Validation\Rule;

class FacebookBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fbBill = FacebookBill::with(['dates:id,total_amount,start_at,ends_at', 'clients:id,business'])->latest();

        if (request()->has("id")) {
            $id = request("id");

            $fbBill = $fbBill->where("date_id", '=', $id);
        }

        $fbBill = $fbBill->simplePaginate(10);

        return Inertia::render('FB/Bills/Index', [
            'fbBills' => FacebookBillResource::collection($fbBill),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('FB/Bills/Form', [
            'edit' => false,
            'fbBill' => new FacebookBillResource(new FacebookBill()),
            'dates' => FacebookBillsDateResource::collection(FacebookBillsDate::select(['id', 'start_at', 'ends_at'])->get()),
            'clients' => ClientResource::collection(Client::select(['id', 'business', 'balance'])->get()),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {

        $data = $request->validate([
            'date_id' => ['required', Rule::exists(FacebookBillsDate::class, 'id')],
            'client_id' => ['required', Rule::exists(Client::class, 'id')],
            'campaign' => ['required', 'string'],
            'amount' => ['required', 'numeric'],
            'commission' => ['required', 'numeric'],
            'total' => ['required', 'numeric'],
        ]);

        FacebookBill::create($data);

        $id = $request->validate(['date_id' => ['required', Rule::exists(FacebookBillsDate::class, 'id')],]);

        return redirect()->route('fbBills.index', ['id' => $id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'balance' => ['required', 'numeric'],
        ]);

        $updateBalance = Client::find($id);
        $updateBalance = $updateBalance->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        facebookBill::destroy($id);

        return redirect()->route('fbBills.index');
    }
}
