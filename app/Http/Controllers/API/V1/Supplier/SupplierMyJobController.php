<?php

namespace App\Http\Controllers\API\V1\Supplier;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\ApplyJobRequest;
use App\Http\Requests\API\V1\Supplier\SupplierMyJobApplyRequest;
use App\Http\Resources\API\V1\ApplyJobResource;
use App\Models\YachtJob;
use App\Services\API\V1\ApplyJobService;
use App\Services\API\V1\Supplier\SupplierMyJobService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class SupplierMyJobController extends Controller
{
    protected SupplierMyJobService $supplierMyJobService;
    protected ApplyJobService $applyJobService;

    public function __construct(SupplierMyJobService $supplierMyJobService , ApplyJobService $applyJobService)
    {
        $this->supplierMyJobService = $supplierMyJobService;
        $this->applyJobService = $applyJobService;
    }

    public function getSuggestedJob(){
        try {
            $suggestedJob = $this->supplierMyJobService->getSuggestedJob();
            return $this->success(200, 'Job list retrieved successfully', $suggestedJob);
        } catch (\Exception $e) {
            Log::error('App\Http\Controllers\API\V1\Supplier\SupplierMyJobController:getSuggestedJob', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    public function getSuggestedJobBySlug($slug){
        try {
            $suggestedJob = $this->supplierMyJobService->getSuggestedJobBySlug($slug);
            return $this->success(200, 'Job list retrieved successfully', $suggestedJob);
        } catch (\Exception $e) {
            Log::error('App\Http\Controllers\API\V1\Supplier\SupplierMyJobController:getSuggestedJobBySlug', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

     /**
     * Store a new application for the given YachtJob.
     *
     * @param SupplierMyJobApplyRequest $request
     * @param YachtJob $job
     * @return JsonResponse
     */
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
