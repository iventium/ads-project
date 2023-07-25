<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClientResource;
use App\Http\Resources\RefillResource;
use App\Models\Client;
use App\Models\Refill;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class RefillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $refill = Refill::with(['clients:id,business']);

        if (request()->has("id")) {
            $id = request("id");

            $refill = $refill->where("client_id", '=', $id);
        }

        $refill = $refill->latest()->simplePaginate(10);


        return Inertia::render('Refills/Index', [
            'refills' => RefillResource::collection($refill),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Refills/Form', [
            'edit' => false,
            'refill' => new RefillResource(new Refill()),
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
            'client_id' => ['required', Rule::exists(Client::class, 'id')],
            'payment' => ['required', 'numeric'],
            'bank' => ['required', 'string'],
            'date' => ['required', 'date'],
            'reference' => ['required', 'string'],
            'rate' => ['numeric'],
            'total' => ['required', 'numeric'],
            'comments' => ['string', 'max:285'],
        ]);

        Refill::create($data);

        return redirect()->route('refills.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Refill  $refill
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bill = Refill::with(['clients:id,business,owner,rif,address,phone'])->find($id);

        return Inertia::render('Refills/Show', [
            'refill' => new RefillResource($bill),
            // 'clients' => ClientResource::collection(Client::select(['id', 'owner']) -> get()),

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Refill  $refill
     * @return \Illuminate\Http\Response
     */
    public function edit(Refill $refill)
    {
        return Inertia::render('Refills/Form', [
            'edit' => true,
            'refill' => new RefillResource($refill),
            'clients' => ClientResource::collection(Client::select(['id', 'business', 'balance'])->get()),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Refill  $refill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $data = $request->validate([
        //     'client_id' => ['required', Rule::exists(Client::class, 'id')],
        //     'payment' => ['required', 'numeric'],
        //     'bank' => ['required', 'string'],
        //     'date' => ['required', 'date'],
        //     'reference' => ['required', 'numeric'],
        //     'rate' => ['required', 'numeric'],
        //     'total' => ['required', 'numeric'],
        //     'comments' => ['required', 'string', 'max:285'],
        // ]);

        // $refill = Refill::find($id);
        // $refill = $refill->update($data);

        $data = $request->validate([
            'balance' => ['required', 'numeric'],
        ]);

        $updateBalance = Client::find($id);
        $updateBalance = $updateBalance->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Refill  $refill
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Refill::destroy($id);

        return redirect()->route('refills.index');
    }
}
