<?php

namespace App\Repositories\API\V1\Yacht;

use App\Models\JobApplication;
use App\Models\YachtJob;
use Illuminate\Support\Facades\Log;

class YachtDashboardRepository implements YachtDashboardRepositoryInterface
{
   public function getActiveJob(){
    try {
        $activeJob= YachtJob::where('status', 'active')->count();
        return $activeJob;

    } catch (\Exception $e) {
        Log::error('app/Repositories/API/V1/Yacht/YachtDashboardRepository.php:getActiveJob ' . $e->getMessage());
        throw $e;
    }
   }
    public function pendingApplication(){
     try {
          $pendingApplication= JobApplication::where('status', 'inactive')->count();
          return $pendingApplication;

     } catch (\Exception $e) {
          Log::error('app/Repositories/API/V1/Yacht/YachtDashboardRepository.php:pendingApplication ' . $e->getMessage());
          throw $e;
     }
    }
    public function getJobApplication(){
        try {
            $jobApplication= JobApplication::with('user','profile','role')->get();
            return $jobApplication;

        } catch (\Exception $e) {
            Log::error('app/Repositories/API/V1/Yacht/YachtDashboardRepository.php:getJobApplication ' . $e->getMessage());
            throw $e;
        }
    }
}
