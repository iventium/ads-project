<?php

namespace App\Http\Controllers;

use App\Http\Resources\BillResource;
use App\Http\Resources\ClientResource;
use App\Http\Resources\FacebookBillResource;
use App\Http\Resources\RefillResource;
use App\Models\Client;
use App\Models\FacebookBill;
use App\Models\Refill;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $client = Client::get('balance');
        $fbBills = '';
        $refill = '';

        if (request()->has("filterDate")) {
            $month = request("filterDate");

            $fbBills = FacebookBill::whereMonth('created_at', $month)->get();
            $refill = Refill::whereMonth('created_at', $month)->get('total');

            return Inertia::render('Dashboard', [
                'clients' => ClientResource::collection($client),
                'fbBills' => FacebookBillResource::collection($fbBills),
                'refills' => RefillResource::collection($refill),
            ]);
        }


        $fbBills = FacebookBill::get();
        $refill = Refill::get('total');


        return Inertia::render('Dashboard', [
            'clients' => ClientResource::collection($client),
            'fbBills' => FacebookBillResource::collection($fbBills),
            'refills' => RefillResource::collection($refill),
        ]);
    }
}
