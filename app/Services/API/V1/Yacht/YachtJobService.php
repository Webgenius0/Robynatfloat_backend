<?php

namespace App\Services\API\V1\Yacht;

use App\Helpers\Helper;
use App\Models\Skill;
use App\Models\YachtJob;
use App\Repositories\API\V1\Yacht\YachtJobRepositoryInterface;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

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
        DB::beginTransaction();

        try {
            $skills = $credentials['skills'] ?? [];
            unset($credentials['skills']);

            $job = $this->yachtJobRepository->storeYachtJob($credentials);

            if (!empty($skills)) {
                $skillIds = $this->getOrCreateSkillIds($skills);
                $job->skills()->sync($skillIds);
            }

            DB::commit();
            return $job;
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('YachtJobService::storeYachtJob', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    /**
     * Helper method to find or create skills and return their IDs.
     */
    protected function getOrCreateSkillIds(array $skillNames): array {
        return collect($skillNames)->map(function ($name) {
            $slug = Str::slug($name);
            return Skill::firstOrCreate(['slug' => $slug], ['name' => $name])->id;
        })->toArray();
    }

    /**
     * Retrieve all yacht jobs.
     *
     * @return Collection
     */
    public function getAllJobsStatusBased(array $withStatus): Collection {
        return $this->yachtJobRepository->getAllJobsStatusBased($withStatus);
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

    public function statusChange($slug, array $data) {
        try {
            return $this->yachtJobRepository->statusChange($slug, $data);

        } catch (Exception $e) {
            Log::error('YachtJobController::getJobBySlug', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
