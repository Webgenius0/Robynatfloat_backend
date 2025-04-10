<?php

namespace App\Http\Resources\API\V1\Freelancer;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FreelancerJobResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array {
        return [
            'id'               => $this->id,
            'job_title'        => $this->job_title,
            'slug'             => $this->slug,
            'job_category'     => $this->job_category,
            'location'         => $this->location,
            'start_date'       => $this->start_date,
            'end_date'         => $this->end_date,
            'rate_amount_from' => $this->rate_amount_from,
            'rate_amount_to'   => $this->rate_amount_to,
            'posted'           => $this->created_at ? $this->created_at->diffForHumans() : null,
        ];
    }
}
