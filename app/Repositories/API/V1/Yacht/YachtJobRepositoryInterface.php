<?php

namespace App\Repositories\API\V1\Yacht;

use App\Models\YachtJob;
use Illuminate\Support\Collection;

interface YachtJobRepositoryInterface {
    /**
     * Store a new YachtJob record.
     *
     * @param array $credentials
     * @return YachtJob
     */
    public function storeYachtJob(array $credentials): YachtJob;


    /**
     * Retrieve all yacht jobs.
     *
     * @return Collection
     */
    public function getAllJobs(): Collection;


    /**
     * Retrieve a yacht job by its ID.
     *
     * @param int $id
     * @return YachtJob|null
     */
    public function getJobById(int $id): ?YachtJob;


    /**
     * Update a yacht job record.
     *
     * @param int $id
     * @param array $data
     * @return YachtJob|null
     */
    public function updateYachtJob(int $id, array $data): ?YachtJob;


    
    public function getAllSupplier();
}
