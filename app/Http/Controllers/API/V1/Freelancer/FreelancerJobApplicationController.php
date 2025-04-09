<?php

namespace App\Http\Controllers\API\V1\Freelancer;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Freelancer\StoreJobApplicationRequest;
use App\Http\Resources\API\V1\Freelancer\JobApplicationResource;
use App\Models\YachtJob;
use App\Services\API\V1\Freelancer\JobApplicationService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class FreelancerJobApplicationController extends Controller {
    protected JobApplicationService $service;

    public function __construct(JobApplicationService $service) {
        $this->service = $service;
    }

    /**
     * Store a new application for the given YachtJob.
     */
    public function store(StoreJobApplicationRequest $request, YachtJob $job): JsonResponse {
        try {
            $data = $request->validated();

            // Use Helper::uploadFile to store the CV in 'cvs' directory on the public disk
            $cvPath               = Helper::uploadFile($request->file('cv'), 'cvs');
            $data['cv']           = $cvPath;
            $data['yacht_job_id'] = $job->id;
            $data['user_id']      = $request->user()->id;

            // Generate unique slug for application
            $data['slug'] = Str::slug($data['name'] . '-' . now()->timestamp . '-' . Str::random(6));

            $application = $this->service->store($data);

            return Helper::success(201, 'Application submitted successfully', new JobApplicationResource($application));
        } catch (Exception $e) {
            Log::error('FreelancerJobApplicationController::store', [
                'error' => $e->getMessage(),
            ]);
            return Helper::error(500, 'Server error.');
        }
    }
}
