<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RefillResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this -> id,
            'payment' => $this -> payment,
            'bank' => $this -> bank,
            'type' => $this -> type,
            'date' => $this -> date,
            'reference' => $this -> reference,
            'rate' => $this -> rate,
            'total' => $this -> total,
            'comments' => $this -> comments,
            'client_id' => $this -> when($this -> client_id, $this -> client_id),
            'clients' => new ClientRefillsResource($this -> whenLoaded('clients')),
        ];
    }
}
