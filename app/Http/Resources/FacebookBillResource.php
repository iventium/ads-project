<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FacebookBillResource extends JsonResource
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
            'id' => $this->id,
            'campaign' => $this->campaign,
            'amount' => $this->amount,
            'commission' => $this->commission,
            'total' => $this->total,
            'date_id' => $this->when($this->date_id, $this->date_id),
            'client_id' => $this->when($this->client_id, $this->client_id),
            'dates' => new FacebookBillFacebookBillsDateResource($this->whenLoaded('dates')),
            'clients' => new ClientFacebookBill($this->whenLoaded('clients')),
        ];
    }
}
