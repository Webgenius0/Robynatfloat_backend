<?php

namespace App\Repositories\API\V1;

interface ApplyJobRepositoryInterface
{
    public function applyToJob(array $data);
    public function getAppliedJobs();
    public function getAppliedJobBySlug($slug);

}

