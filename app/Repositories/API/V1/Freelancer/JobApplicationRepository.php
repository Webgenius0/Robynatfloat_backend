<?php

namespace App\Repositories\API\V1\Freelancer;

use App\Models\JobApplication;
use App\Models\YachtJob;
use Exception;
use Illuminate\Support\Facades\Log;

class JobApplicationRepository implements JobApplicationRepositoryInterface {

        public function getAllJobsStatusBased(){
         try{
             $jobs = YachtJob::all();
             return $jobs;
         }catch(\Exception $e){
             Log::error('App\Repositories\API\V1\Freelancer\jobApplicationRepository:getAllJobsStatusBased ' . $e->getMessage());
             throw $e;
         }
     }

     public function getJobBySlug($slug){
         try{
             $job = YachtJob::where('slug', $slug)->first();
             return $job;
         }catch(\Exception $e){
             Log::error('App\Repositories\API\V1\Freelancer\jobApplicationRepository:getJobBySlug ' . $e->getMessage());
             throw $e;
         }
     }
}
