<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'id' => $this -> id,
            'business' => $this -> business,
            'owner' => $this -> owner,
            'phone' => $this -> phone,
            'address' => $this -> address,
            'rif' => $this -> rif,
            'entry_at' => $this -> entry_at,
            'balance' => $this -> balance,
        ];
    }
}
