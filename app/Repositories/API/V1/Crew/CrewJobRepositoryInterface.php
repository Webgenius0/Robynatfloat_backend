<?php

namespace App\Repositories\API\V1\Crew;

interface CrewJobRepositoryInterface
{
    public function getAllJobsStatusBased();
    public function getJobBySlug($slug);
}
