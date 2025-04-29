<?php

namespace App\Repositories\API\V1\Freelancer;

use App\Models\JobApplication;
use Illuminate\Support\Facades\Log;

class FreelancerDashboardRepository implements FreelancerDashboardRepositoryInterface
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
            Log::error('App\Repositories\API\V1\Freelancer\FreelancerDashboardRepository:totalApplication', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
