<?php

namespace App\Http\Controllers\API\V1\Yacht;

use App\Http\Controllers\Controller;
use App\Services\API\V1\Yacht\YachtDashboardService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class YachtDashboardController extends Controller
{
    protected YachtDashboardService $yachtDashboardService;
    public function __construct(YachtDashboardService $yachtDashboardService)
    {
        $this->yachtDashboardService = $yachtDashboardService;
    }
    public function activeJob(){
        try {
            $activeJob = $this->yachtDashboardService->getActiveJob();
            return $this->success(200, 'Active Job list', $activeJob);
        } catch (\Exception $e) {
            Log::error('app/Http/Controllers/API/V1/Yacht/YachtDashboardController.php:activeJob ' . $e->getMessage());
            throw $e;
        }
    }
    public function pendingApplication(){
        try {
            $pendingApplication = $this->yachtDashboardService->pendingApplication();
            return $this->success(200, 'Pending Application list', $pendingApplication);
        } catch (\Exception $e) {
            Log::error('app/Http/Controllers/API/V1/Yacht/YachtDashboardController.php:pendingApplication ' . $e->getMessage());
            throw $e;
        }
    }
    public function getJobApplication(){
        try {
            $jobApplication = $this->yachtDashboardService->getJobApplication();
            return $this->success(200, 'Job Application list', $jobApplication);
        } catch (\Exception $e) {
            Log::error('app/Http/Controllers/API/V1/Yacht/YachtDashboardController.php:getJobApplication ' . $e->getMessage());
            throw $e;
        }
    }
}
