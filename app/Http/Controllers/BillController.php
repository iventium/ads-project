<?php

namespace App\Http\Controllers;

use App\Http\Resources\BillResource;
use App\Http\Resources\ClientResource;
use App\Models\Bill;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bill = Bill::with(['clients:id,business'])->latest();

        if (request()->has("name")) {
            $name = request("name");

            $bill = $bill->where("promotion_link", 'like', '%' . $name . '%');
        }

        $bill = $bill->simplePaginate(10);


        return Inertia::render('Bills/Index', [
            'bills' => BillResource::collection($bill),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Bills/Form', [
            'edit' => false,
            'bill' => new BillResource(new Bill()),
            'clients' => ClientResource::collection(Client::select(['id', 'business'])->get()),

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
            'client_id' => ['required', Rule::exists(Client::class, 'id')],
            'promotion_link' => ['required', 'string'],
            'campaign' => ['required', 'string'],
            'type' => ['required', 'string'],
            'start_at' => ['date'],
            'ends_at' => ['date'],
            'days' => ['required', 'numeric'],
            'investment_per_day' => ['required', 'numeric'],
            'invoiced' => ['required', 'numeric'],
            'commission' => ['required', 'numeric'],
            'total' => ['required', 'numeric'],
        ]);

        Bill::create($data);

        return redirect()->route('bills.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bill = Bill::with(['clients:id,business,owner'])->find($id);

        return Inertia::render('Bills/Show', [
            'bill' => new BillResource($bill),

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        return Inertia::render('Bills/Form', [
            'edit' => true,
            'bill' => new BillResource($bill),
            'clients' => ClientResource::collection(Client::select(['id', 'business'])->get()),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'client_id' => ['required', Rule::exists(Client::class, 'id')],
            'promotion_link' => ['required', 'string'],
            'campaign' => ['required', 'string'],
            'type' => ['required', 'string'],
            'start_at' => ['date'],
            'ends_at' => ['date'],
            'days' => ['required', 'numeric'],
            'total' => ['required', 'numeric'],
            'commission' => ['required', 'numeric'],
        ]);

        $bill = Bill::find($id);

        $bill->update($data);

        return redirect()->route('bills.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bill::destroy($id);

        return redirect()->route('bills.index');
    }
}
