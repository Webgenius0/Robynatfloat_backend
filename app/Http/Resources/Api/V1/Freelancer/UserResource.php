<?php

namespace App\Http\Resources\Api\V1\Freelancer;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array {
        return [
            'id'             => $this->id,
            'first_name'     => $this->first_name,
            'last_name'      => $this->last_name,
            'handle'         => $this->handle,
            'email'          => $this->email,
            'avatar'         => $this->avatar,
            'role'           => $this->role ? $this->role->name : null,
            'profile'        => $this->whenLoaded('profile'),
            'experiences'    => $this->whenLoaded('experience'),
            'certifications' => $this->whenLoaded('certificates'),
            'skills'         => $this->whenLoaded('skills'),
            'languages'      => $this->whenLoaded('languages'),
        ];
    }
}
