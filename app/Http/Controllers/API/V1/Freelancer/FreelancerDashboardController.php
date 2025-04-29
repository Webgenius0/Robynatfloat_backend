<?php

namespace App\Http\Controllers\API\V1\Freelancer;

use App\Http\Controllers\Controller;
use App\Services\API\V1\Freelancer\FreelancerDashboardService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FreelancerDashboardController extends Controller
{
    protected FreelancerDashboardService $freelancerDashboardService;

    public function __construct(FreelancerDashboardService $freelancerDashboardService)
    {
        $this->freelancerDashboardService = $freelancerDashboardService;
    }
    public function totalApplication(){
        try {
            $response = $this->freelancerDashboardService->totalApplication();
            return $this->success(200, 'Total Application', $response);
        } catch (Exception $e) {
            Log::error('FreelancerDashboardController::totalApplication', ['error' => $e->getMessage()]);
            return $this->error(500, 'Server error.');

        }
    }
}
