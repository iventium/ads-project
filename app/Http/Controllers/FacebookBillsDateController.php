<?php

namespace App\Http\Controllers;

use App\Http\Resources\FacebookBillsDateResource;
use App\Models\FacebookBillsDate;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FacebookBillsDateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = FacebookBillsDate::latest();

        if (request()->has("name")) {
            $name = request("name");

            $date = $date->where("business", 'like', '%' . $name . '%');
        }

        $date = $date->simplePaginate(10);

        return Inertia::render('FB/Dates/Index', [
            'fbDates' => FacebookBillsDateResource::collection($date),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('FB/Dates/Form', [
            'edit' => false,
            'fbDate' => new FacebookBillsDateResource(new FacebookBillsDate()),
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
            'start_at' => ['required', 'date'],
            'ends_at' => ['required', 'date'],
            'total_amount' => ['required', 'numeric'],
        ]);

        FacebookBillsDate::create($data);

        return redirect()->route('fbDates.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FacebookBillsDate  $facebookBillsDate
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $date = FacebookBillsDate::find($id);

        return Inertia::render('FB/Dates/Show', [
            'date' => new FacebookBillsDateResource($date),

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FacebookBillsDate  $facebookBillsDate
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facebookBillsDate = facebookBillsDate::find($id);

        return Inertia::render('FB/Dates/Form', [
            'edit' => true,
            'fbDate' => new FacebookBillsDateResource($facebookBillsDate),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FacebookBillsDate  $facebookBillsDate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'start_at' => ['required', 'date'],
            'ends_at' => ['required', 'date'],
            'total_amount' => ['required', 'numeric'],
        ]);

        $fbDate  = FacebookBillsDate::find($id);
        $fbDate->update($data);

        return redirect()->route('fbDates.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FacebookBillsDate  $facebookBillsDate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        facebookBillsDate::destroy($id);

        return redirect()->route('fbDates.index');
    }
}
