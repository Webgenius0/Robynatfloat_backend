<?php

namespace App\Repositories\API\V1\Freelancer;

use App\Models\JobApplication;
use Exception;
use Illuminate\Support\Facades\Log;

class JobApplicationRepository implements JobApplicationRepositoryInterface {
    public function store(array $data): JobApplication {
        try {
            return JobApplication::create($data);
        } catch (Exception $e) {
            Log::error('JobApplicationRepository::store', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
