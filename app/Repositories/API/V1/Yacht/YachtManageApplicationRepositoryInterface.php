<?php

namespace App\Repositories\API\V1\Yacht;

interface YachtManageApplicationRepositoryInterface
{
    /**
     * Get the job application list.
     *
     * @param array $request
     * @return mixed
     */
    public function getJobApplication();
    public function getJobApplicationBySlug($slug);
    /**
     * Get the job application by slug.
     *
     * @param string $slug
     * @return mixed
     */
}
