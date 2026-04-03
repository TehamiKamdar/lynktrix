<?php

namespace App\Http\Resources\Publisher\Website;

use App\Helper\PublisherData;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
class ListingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        $class = $this->status == \App\Models\User::ACTIVE ? "badge-success" : (($this->status == \App\Models\User::PENDING) ? "badge-warning text-white" : "badge-danger");
        $status = ucwords($this->status);

        $partnerTypes = PublisherData::getMixNames($this->partner_types);
        $categories = PublisherData::getMixNames($this->categories);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'url' => $this->url,
            'link' => "<a href='$this->url' target='_blank'>$this->name</a>",
            'partner_types' => [
                'values' => $this->partner_types,
                'text' => implode(', ', $partnerTypes)
            ],
            'categories' => [
                'values' => $this->categories,
                'text' => implode(', ', $categories)
            ],
            'last_updated' => Carbon::parse($this->updated_at)->format("m/d/Y"),
            'status' => "<div class='badge $class'>$status</div>",
            'monthly_traffic' => $this->monthly_traffic,
            'monthly_page_views' => $this->monthly_page_views,
            'updated_at' => Carbon::parse($this->updated_at)->format("m/d/Y")
        ];
    }
}
