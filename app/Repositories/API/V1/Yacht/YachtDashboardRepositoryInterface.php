<?php

namespace App\Repositories\API\V1\Yacht;

interface YachtDashboardRepositoryInterface
{
    /**
     * Get the active job list.
     *
     * @return mixed
     */
    public function getActiveJob();

    /**

     */
    public function pendingApplication();

    public function getJobApplication();

}
