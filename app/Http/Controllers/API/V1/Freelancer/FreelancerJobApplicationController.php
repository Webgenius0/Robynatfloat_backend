<?php

namespace App\Http\Controllers\API\V1\Freelancer;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\ApplyJobRequest;
use App\Http\Requests\API\V1\Freelancer\StoreJobApplicationRequest;
use App\Http\Resources\API\V1\ApplyJobResource;
use App\Http\Resources\API\V1\Freelancer\FreelancerJobResource;
use App\Http\Resources\API\V1\Freelancer\JobApplicationResource;
use App\Models\YachtJob;
use App\Services\API\V1\ApplyJobService;
use App\Services\API\V1\Freelancer\JobApplicationService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class FreelancerJobApplicationController extends Controller {
    protected JobApplicationService $jobApplicationService;
    protected ApplyJobService $applyJobService;

    public function __construct(JobApplicationService $jobApplicationService, ApplyJobService $applyJobService) {
        $this->jobApplicationService = $jobApplicationService;
        $this->applyJobService = $applyJobService;
    }

    public function getAllJobsStatusBased(){

        try{
            $response=$this->jobApplicationService->getAllJobsStatusBased();
            return $this->success(200, 'Jobs', $response);
        }catch(\Exception $e){
            Log::error('App\Http\Controllers\API\V1\Freelancer\FreelancerJobApplicationController:getAllJobsStatusBased ' . $e->getMessage());
            throw $e;
        }
    }

    public function getJobBySlug($slug){
        try{
            $response=$this->jobApplicationService->getJobBySlug($slug);
            return $this->success(200, 'Job', $response);
        }catch(\Exception $e){
            Log::error('App\Http\Controllers\API\V1\Freelancer\FreelancerJobApplicationController:getJobBySlug ' . $e->getMessage());
            throw $e;
        }
    }

    public function applyToJob(ApplyJobRequest $request, YachtJob $job): JsonResponse {
        // dd($job);
        try {
            $data = $request->validated();
            // dd($data);

            // Use Helper::uploadFile to store the CV in 'cvs' directory on the public disk
            $cvPath               = Helper::uploadFile($request->file('cv'), 'cvs');
            $data['cv']           = $cvPath;
            $data['yacht_job_id'] = $job->id;
            $data['user_id']      = $request->user()->id;

            // Generate unique slug for application
            $data['slug'] = Str::slug($data['name'] . '-' . now()->timestamp . '-' . Str::random(6));
// dd($data);
            $application = $this->applyJobService->applyToJob($data);

            return Helper::success(201, 'Application submitted successfully', new ApplyJobResource($application));
        } catch (Exception $e) {
            Log::error('FreelancerJobApplicationController::store', [
                'error' => $e->getMessage(),
            ]);
            return Helper::error(500, 'Server error.');
        }
    }

    public function getAppliedJobs(){
        try {
            // dd('getAppliedJobs');
            $appliedJobs = $this->applyJobService->getAppliedJobs();
            return $this->success(200, 'Job list retrieved successfully', $appliedJobs);
        } catch (\Exception $e) {
            Log::error('App\Http\Controllers\API\V1\Freelancer\FreelancerJobApplicationController:getAppliedJobs', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    public function getAppliedJobBySlug($slug){
        try {
            $appliedJob = $this->applyJobService->getAppliedJobBySlug($slug);
            return $this->success(200, 'Job list retrieved successfully', $appliedJob);
        } catch (\Exception $e) {
            Log::error('App\Http\Controllers\API\V1\Freelancer\FreelancerJobApplicationController:getAppliedJobBySlug', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

}
