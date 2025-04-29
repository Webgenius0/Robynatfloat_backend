<?php

namespace App\Services\API\V1\Freelancer;

use App\Models\JobApplication;
use App\Repositories\API\V1\Freelancer\JobApplicationRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Log;

class JobApplicationService {
    protected JobApplicationRepositoryInterface $jobApplicationRepository;

    public function __construct(JobApplicationRepositoryInterface $jobApplicationRepository) {
        $this->jobApplicationRepository = $jobApplicationRepository;
    }

    public function getAllJobsStatusBased(){
        try{
            $response = $this->jobApplicationRepository->getAllJobsStatusBased();
            return $response;
        }catch(\Exception $e){
            Log::error('App\Services\API\V1\Freelancer\JobApplicationService:getAllJobsStatusBased ' . $e->getMessage());
            throw $e;
        }
    }

    public function getJobBySlug($slug){
        try{
            $response=$this->jobApplicationRepository->getJobBySlug($slug);
            return $response;
        }catch(\Exception $e){
            Log::error('App\Services\API\V1\Freelancer\JobApplicationService:getJobBySlug ' . $e->getMessage());
            throw $e;
        }
    }
}
