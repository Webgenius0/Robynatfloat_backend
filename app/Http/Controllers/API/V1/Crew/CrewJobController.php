<?php

namespace App\Http\Controllers\API\V1\Crew;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\ApplyJobRequest;
use App\Http\Resources\API\V1\ApplyJobResource;
use App\Models\YachtJob;
use App\Services\API\V1\ApplyJobService;
use App\Services\API\V1\Crew\CrewJobService;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CrewJobController extends Controller
{
    protected CrewJobService $crewJobService;
    protected ApplyJobService $applyJobService;

    public function __construct(CrewJobService $crewJobService, ApplyJobService $applyJobService)
    {
        $this->crewJobService = $crewJobService;
        $this->applyJobService = $applyJobService;
    }

    public function getAllJobsStatusBased(){

        try{
            $response=$this->crewJobService->getAllJobsStatusBased();
            return $this->success(200, 'Jobs', $response);
        }catch(\Exception $e){
            Log::error('App\Http\Controllers\API\V1\Crew\CrewJobController:getAllJobsStatusBased ' . $e->getMessage());
            throw $e;
        }
    }

    public function getJobBySlug($slug){
        try{
            $response=$this->crewJobService->getJobBySlug($slug);
            return $this->success(200, 'Job', $response);
        }catch(\Exception $e){
            Log::error('App\Http\Controllers\API\V1\Crew\CrewJobController:getJobBySlug ' . $e->getMessage());
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
            Log::error('App\Http\Controllers\API\V1\Supplier\SupplierMyJobController:getAppliedJobs', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    public function getAppliedJobBySlug($slug){
        try {
            $appliedJob = $this->applyJobService->getAppliedJobBySlug($slug);
            return $this->success(200, 'Job list retrieved successfully', $appliedJob);
        } catch (\Exception $e) {
            Log::error('App\Http\Controllers\API\V1\Supplier\SupplierMyJobController:getAppliedJobBySlug', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

}
