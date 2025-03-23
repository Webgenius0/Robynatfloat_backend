<?php

namespace App\Repositories\API\V1\Yacht;

use App\Models\YachtJob;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class YachtJobRepository implements YachtJobRepositoryInterface {
    /**
     * Store a new YachtJob record.
     *
     * @param array $credentials
     * @return YachtJob
     * @throws Exception
     */
    public function storeYachtJob(array $credentials): YachtJob {
        try {
            return YachtJob::create($credentials);
        } catch (Exception $e) {
            Log::error('YachtJobRepository::storeYachtJob', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    /**
     * Retrieve all yacht jobs.
     *
     * @return Collection
     */
    public function getAllJobs(): Collection {
        return YachtJob::all();
    }

    /**
     * Retrieve a yacht job by its ID.
     *
     * @param int $id
     * @return YachtJob|null
     */
    public function getJobById(int $id): ?YachtJob {
        return YachtJob::where('id', $id)->first();
    }

    /**
     * Update a yacht job record.
     *
     * @param int $id
     * @param array $data
     * @return YachtJob|null
     */
    public function updateYachtJob(int $id, array $data): ?YachtJob {
        $job = YachtJob::find($id);
        if ($job) {
            $job->update($data);
            $job = $job->fresh();
        }
        return $job;
    }
}
