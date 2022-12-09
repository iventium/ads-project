<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function bill()
    {
        return $this->hasMany('App\Models\Bill');
    }

    public function refill()
    {
        return $this->hasMany('App\Models\Refill');
    }

    public function facebookbill()
    {
        return $this->hasMany('App\Models\FacebookBill');
    }
}
