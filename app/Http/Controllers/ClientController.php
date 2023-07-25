<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Resources\ClientResource;
use Inertia\Inertia;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Client::latest();

        if (request()->has("name")) {
            $name = request("name");

            $client = $client->where("business", 'like', '%' . $name . '%');
        }

        $client = $client->simplePaginate(10);

        return Inertia::render('Clients/Index', [
            'clients' => ClientResource::collection($client),
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Clients/Form', [
            'edit' => false,
            'client' => new ClientResource(new Client()),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'business' => ['required', 'string'],
            'owner' => ['required', 'string'],
            'phone' => ['required', 'numeric'],
            'address' => ['required', 'string', 'max:300'],
            'rif' => ['required', 'string'],
            'entry_at' => ['required', 'date'],
            'total' => ['required', 'numeric'],
            'induction' => ['required', 'numeric'],
            'balance' => ['required', 'numeric'],
        ]);

        Client::create($data);


        return redirect()->route('clients.index');
    }

    public function show($id)
    {
        $client = Client::find($id);

        return Inertia::render('Clients/Show', [
            'client' => new ClientResource($client),

        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return Inertia::render('Clients/Form', [
            'edit' => true,
            'client' => new ClientResource($client),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClientRequest  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'business' => ['required', 'string'],
            'owner' => ['required', 'string'],
            'phone' => ['required', 'numeric'],
            'address' => ['required', 'string', 'max:300'],
            'rif' => ['required', 'string'],
            'entry_at' => ['required', 'date'],
            'total' => ['required', 'numeric'],
            'induction' => ['required', 'numeric'],
            'balance' => ['required', 'numeric'],
        ]);

        $client = Client::find($id);

        $client->update($data);

        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::destroy($id);

        return redirect()->route('client.index');
    }
}
