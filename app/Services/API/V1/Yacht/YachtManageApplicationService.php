<?php

namespace App\Services\API\V1\Yacht;

use App\Repositories\API\V1\Yacht\YachtManageApplicationRepositoryInterface;
use Illuminate\Support\Facades\Log;

class YachtManageApplicationService
{
    protected YachtManageApplicationRepositoryInterface $yachtManageApplicationRepository;

    public function __construct(YachtManageApplicationRepositoryInterface $yachtManageApplicationRepository)
    {
        $this->yachtManageApplicationRepository = $yachtManageApplicationRepository;
    }

    public function getJobApplication()
    {
        try {
            return $this->yachtManageApplicationRepository->getJobApplication();
        } catch (\Exception $e) {
            Log::error('app/Services/API/V1/Yacht/YachtManageApplicationService.php:getJobApplication ' . $e->getMessage());
            throw $e;
        }
    }
    public function getJobApplicationBySlug($slug)
    {
        try {
            return $this->yachtManageApplicationRepository->getJobApplicationBySlug($slug);
        } catch (\Exception $e) {
            Log::error('app/Services/API/V1/Yacht/YachtManageApplicationService.php:getJobApplicationBySlug ' . $e->getMessage());
            throw $e;
        }
    }
}
