<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BillResource extends JsonResource
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
            'promotion_link' => $this->promotion_link,
            'campaign' => $this->campaign,
            'type' => $this->type,
            'start_at' => $this->start_at,
            'ends_at' => $this->ends_at,
            'days' => $this->days,
            'investment_per_day' => $this->investment_per_day,
            'invoiced' => $this->invoiced,
            'commission' => $this->commission,
            'total' => $this->total,
            'nota' => $this->nota,
            'client_id' => $this->when($this->client_id, $this->client_id),
            'clients' => new BillClientResource($this->whenLoaded('clients')),
        ];
    }
}
