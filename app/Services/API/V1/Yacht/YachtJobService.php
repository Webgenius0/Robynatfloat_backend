<?php

namespace App\Services\API\V1\Yacht;

use App\Models\YachtJob;
use App\Repositories\API\V1\Yacht\YachtJobRepositoryInterface;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class YachtJobService {
    protected YachtJobRepositoryInterface $yachtJobRepository;

    public function __construct(YachtJobRepositoryInterface $yachtJobRepository) {
        $this->yachtJobRepository = $yachtJobRepository;
    }

    /**
     * Create a new YachtJob.
     *
     * @param array $credentials
     * @return YachtJob
     * @throws Exception
     */
    public function storeYachtJob(array $credentials): YachtJob {
        try {
            return $this->yachtJobRepository->storeYachtJob($credentials);
        } catch (Exception $e) {
            Log::error('YachtJobService::storeYachtJob', ['error' => $e->getMessage()]);
            throw $e;
        }
    }


    /**
     * Retrieve all yacht jobs.
     *
     * @return Collection
     */
    public function getAllJobs() {
        return $this->yachtJobRepository->getAllJobs();
    }


    /**
     * Retrieve a yacht job by ID.
     *
     * @param int $id
     * @return YachtJob|null
     */
    public function getJobById(int $id): ?YachtJob {
        return $this->yachtJobRepository->getJobById($id);
    }


    /**
     * Update a yacht job.
     *
     * @param int $id
     * @param array $data
     * @return YachtJob|null
     */
    public function updateYachtJob(int $id, array $data): ?YachtJob {
        return $this->yachtJobRepository->updateYachtJob($id, $data);
    }
}
