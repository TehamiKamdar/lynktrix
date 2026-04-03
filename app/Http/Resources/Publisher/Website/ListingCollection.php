<?php

namespace App\Http\Resources\Publisher\Website;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use JsonSerializable;

class ListingCollection extends ResourceCollection
{
    public $collects = ListingResource::class;

    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return array | Arrayable | JsonSerializable
     */
    public function toArray($request): array | Arrayable | JsonSerializable
    {
        return parent::toArray($request);
    }
}
