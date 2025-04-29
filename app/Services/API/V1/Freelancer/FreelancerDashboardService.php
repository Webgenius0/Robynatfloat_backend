<?php

namespace App\Services\API\V1\Freelancer;

use App\Repositories\API\V1\Freelancer\FreelancerDashboardRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Log;

class FreelancerDashboardService
{
    protected FreelancerDashboardRepositoryInterface $freelancerDashboardRepository;

    public function __construct(FreelancerDashboardRepositoryInterface $freelancerDashboardRepository)
    {
        $this->freelancerDashboardRepository = $freelancerDashboardRepository;
    }
    public function totalApplication(){
        try{
            $response = $this->freelancerDashboardRepository->totalApplication();
            return $response;
        }catch(Exception $e){
            Log::error('app/Services/API/V1/Freelancer/FreelancerDashboardService.php:totalApplication ' . $e->getMessage());
            throw $e;
        }
    }
}
