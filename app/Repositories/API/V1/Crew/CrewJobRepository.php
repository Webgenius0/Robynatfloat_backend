<?php

namespace App\Repositories\API\V1\Crew;

use App\Models\JobApplication;
use App\Models\YachtJob;
use Illuminate\Support\Facades\Log;

class CrewJobRepository implements CrewJobRepositoryInterface
{
   public function getAllJobsStatusBased(){
    try{
        $jobs = YachtJob::all();
        return $jobs;
    }catch(\Exception $e){
        Log::error('App\Repositories\API\V1\Crew\CrewJobRepository:getAllJobsStatusBased ' . $e->getMessage());
        throw $e;
    }
}

public function getJobBySlug($slug){
    try{
        $job = YachtJob::where('slug', $slug)->first();
        return $job;
    }catch(\Exception $e){
        Log::error('App\Repositories\API\V1\Crew\CrewJobRepository:getJobBySlug ' . $e->getMessage());
        throw $e;
    }
}
}
