<?php

namespace App\Services\API\V1\Yacht;

use App\Repositories\API\V1\Yacht\YachtDashboardRepositoryInterface;
use App\Repositories\API\V1\Yacht\YachtSupplierOrderRepositoryInterface;
use Illuminate\Support\Facades\Log;

class YachtDashboardService
{
  protected YachtDashboardRepositoryInterface $yachtDashboardRepository;

    public function __construct(YachtDashboardRepositoryInterface $yachtDashboardRepository)
    {
        $this->yachtDashboardRepository = $yachtDashboardRepository;
    }
    public function getActiveJob(){
        try {
            return $this->yachtDashboardRepository->getActiveJob();
        } catch (\Exception $e) {
           Log::error('app/Services/API/V1/Yacht/YachtDashboardService.php:getActiveJob ' . $e->getMessage());
            throw $e;
        }
    }
    public function pendingApplication(){
        try {
            return $this->yachtDashboardRepository->pendingApplication();
        } catch (\Exception $e) {
           Log::error('app/Services/API/V1/Yacht/YachtDashboardService.php:pendingApplication ' . $e->getMessage());
            throw $e;
        }
    }
    public function getJobApplication(){
        try {
            return $this->yachtDashboardRepository->getJobApplication();
        } catch (\Exception $e) {
           Log::error('app/Services/API/V1/Yacht/YachtDashboardService.php:getJobApplication ' . $e->getMessage());
            throw $e;
        }
    }
}
