<?php

namespace App\Http\Resources\Select2;

use Illuminate\Http\Resources\Json\JsonResource;

class KategoriPaginateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return array_merge(parent::toArray($request), [
            'id'    => $this->id,
            'text'  => $this->nama_kategori,
        ]);
    }
}
