<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacebookBill extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function dates()
    {
        return $this->belongsTo('App\Models\FacebookBillsDate', 'date_id')->withDefault();
    }

    public function clients()
    {
        return $this->belongsTo('App\Models\Client', 'client_id')->withDefault();
    }
}
