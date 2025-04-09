<?php

namespace App\Services\API\V1\Freelancer;

use App\Models\JobApplication;
use App\Repositories\API\V1\Freelancer\JobApplicationRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Log;

class JobApplicationService {
    protected JobApplicationRepositoryInterface $repo;

    public function __construct(JobApplicationRepositoryInterface $repo) {
        $this->repo = $repo;
    }

    public function store(array $data): JobApplication {
        try {
            return $this->repo->store($data);
        } catch (Exception $e) {
            Log::error('JobApplicationService::store', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
