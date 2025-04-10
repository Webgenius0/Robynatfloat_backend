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

    /**
     * Return all applications for a given user, including the related job.
     */
    public function listMyAppliedJobs(int $userId) {
        try {
            return JobApplication::where('user_id', $userId)
                ->with('job')
                ->latest()
                ->get();
        } catch (Exception $e) {
            Log::error('JobApplicationRepository::listMyAppliedJobs', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
