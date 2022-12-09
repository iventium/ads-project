<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function clients(){
        return $this->belongsTo('App\Models\Client', 'client_id') -> withDefault();
    }
}
