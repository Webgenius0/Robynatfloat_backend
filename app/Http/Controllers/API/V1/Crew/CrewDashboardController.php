<?php

namespace App\Http\Controllers\API\V1\Crew;

use App\Http\Controllers\Controller;
use App\Services\API\V1\Crew\CrewDashboardService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CrewDashboardController extends Controller
{
   protected CrewDashboardService $crewDashboardService;

   public function __construct(CrewDashboardService $crewDashboardService)
   {
      $this->crewDashboardService = $crewDashboardService;
   }

   public function totalApplication(){
    try{
        $response = $this->crewDashboardService->totalApplication();
        return $this->success(200, 'Total Application', $response);
    }catch(\Exception $e){
        Log::error('app/Http/Controllers/API/V1/Crew/CrewDashboardController.php:totalApplication ' . $e->getMessage());
        throw $e;
    }
   }
}
