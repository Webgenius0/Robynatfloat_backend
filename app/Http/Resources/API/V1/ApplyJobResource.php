<?php

namespace App\Http\Resources\API\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApplyJobResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array {
        return [
            'id'           => $this->id,
            'job_id'       => $this->yacht_job_id,
            'applicant_id' => $this->user_id,
            'slug'         => $this->slug,
            'name'         => $this->name,
            'phone_number' => $this->phone_number,
            'email'        => $this->email,
            'cv_url'       => $this->cv,
            'status'       => $this->status,
            'applied_at'   => $this->created_at->toDateTimeString(),
        ];
    }
}
