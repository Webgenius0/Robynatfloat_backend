<?php

namespace App\Repositories\API\V1\Freelancer;

use App\Models\JobApplication;

interface JobApplicationRepositoryInterface {
    public function getAllJobsStatusBased();
    public function getJobBySlug($slug);
}
