<?php

namespace App\Services\API\V1\Crew;

use App\Repositories\API\V1\Crew\CrewDashboardRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Log;

class CrewDashboardService
{
  protected CrewDashboardRepositoryInterface $crewDashboardRepository;

  public function __construct(CrewDashboardRepositoryInterface $crewDashboardRepository)
  {
    $this->crewDashboardRepository = $crewDashboardRepository;
  }

  public function totalApplication(){
    try{
        $response = $this->crewDashboardRepository->totalApplication();
        return $response;
    }catch(Exception $e){
        Log::error('app/Services/API/V1/Crew/CrewDashboardService.php:totalApplication ' . $e->getMessage());
        throw $e;
    }
}
}
