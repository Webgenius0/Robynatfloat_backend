<?php

namespace App\Repositories\API\V1\Freelancer;

use App\Models\JobApplication;

interface JobApplicationRepositoryInterface {
    public function store(array $data): JobApplication;
}
