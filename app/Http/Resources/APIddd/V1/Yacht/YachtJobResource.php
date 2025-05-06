<?php

namespace App\Http\Resources\API\V1\Yacht;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class YachtJobResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array {
        return [
            'id'                   => $this->id,
            'user_id'              => $this->user_id,
            'job_title'            => $this->job_title,
            'slug'                 => $this->slug,
            'job_category'         => $this->job_category,
            'location'             => $this->location,
            'employment_type'      => $this->employment_type,
            'application_deadline' => $this->application_deadline,
            'number_of_openings'   => $this->number_of_openings,
            'start_date'           => $this->start_date,
            'end_date'             => $this->end_date,
            'rate_amount_from'     => $this->rate_amount_from,
            'rate_amount_to'       => $this->rate_amount_to,
            'job_description'      => $this->job_description,
            'skills'               => $this->whenLoaded('skills', fn() => $this->skills->pluck('name')),
        ];
    }
}
