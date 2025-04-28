<?php

namespace App\Repositories\API\V1\Crew;

use App\Models\JobApplication;
use Illuminate\Support\Facades\Log;

class CrewDashboardRepository implements CrewDashboardRepositoryInterface
{
    public function totalApplication(){
        try{
            $totalApplication = JobApplication::where('user_id', auth()->user()->id)->count();
            $applications = JobApplication::where('user_id', auth()->user()->id)->get();
            return [
                'totalApplication' => $totalApplication,
                'applications' => $applications
            ];
        }catch(\Exception $e){
            Log::error('App\Repositories\API\V1\Crew\CrewDashboardRepository:totalApplication', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
