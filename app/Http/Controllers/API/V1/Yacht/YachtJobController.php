<?php

namespace App\Http\Controllers\Api\V1\Yacht;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Yacht\StoreYachtJobRequest;
use App\Http\Requests\API\V1\Yacht\UpdateYachtJobRequest;
use App\Http\Resources\API\V1\Yacht\YachtJobResource;
use App\Models\YachtJob;
use App\Services\API\V1\Yacht\YachtJobService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class YachtJobController extends Controller {
    protected YachtJobService $yachtJobService;

    public function __construct(YachtJobService $yachtJobService) {
        $this->yachtJobService = $yachtJobService;
    }

    /**
     * Store a newly created yacht job.
     *
     * @param StoreYachtJobRequest $request
     * @return JsonResponse
     */
    public function store(StoreYachtJobRequest $request): JsonResponse {
        try {
            $data            = $request->validated();
            $data['user_id'] = $request->user()->id;

            // Generate a unique slug using the job_title
            $data['slug'] = Helper::generateUniqueSlug($data['job_title'], 'yacht_jobs');

            $yachtJob = $this->yachtJobService->storeYachtJob($data);

            return Helper::success(201, 'Yacht job created successfully', new YachtJobResource($yachtJob));
        } catch (Exception $e) {
            Log::error('YachtJobController::store', ['error' => $e->getMessage()]);
            return Helper::error(500, 'Server error.');
        }
    }

    /**
     * List all yacht jobs.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse {
        try {
            $jobs = $this->yachtJobService->getAllJobs();
            return Helper::success(200, 'Yacht jobs retrieved successfully', YachtJobResource::collection($jobs));
        } catch (Exception $e) {
            Log::error('YachtJobController::index', ['error' => $e->getMessage()]);
            return Helper::error(500, 'Server error.');
        }
    }

    /**
     * Show a specific yacht job using model binding (lookup by slug).
     *
     * @param YachtJob $job
     * @return JsonResponse
     */
    public function show(YachtJob $job): JsonResponse {
        try {
            return Helper::success(200, 'Yacht job retrieved successfully', new YachtJobResource($job));
        } catch (Exception $e) {
            Log::error('YachtJobController::show', ['error' => $e->getMessage()]);
            return Helper::error(500, 'Server error.');
        }
    }

    /**
     * Update an existing yacht job using model binding (lookup by slug).
     *
     * @param UpdateYachtJobRequest $request
     * @param YachtJob $job
     * @return JsonResponse
     */
    public function update(UpdateYachtJobRequest $request, YachtJob $job): JsonResponse {
        try {
            $data = $request->validated();
            // Optionally, enforce the authenticated user's ID if needed.
            $data['user_id'] = $request->user()->id;

            // Use the service to update the job.
            $updatedJob = $this->yachtJobService->updateYachtJob($job->id, $data);
            if (!$updatedJob) {
                return Helper::error(404, 'Yacht job not found.');
            }
            return Helper::success(200, 'Yacht job updated successfully', new YachtJobResource($updatedJob));
        } catch (Exception $e) {
            Log::error('YachtJobController::update', ['error' => $e->getMessage()]);
            return Helper::error(500, 'Server error.');
        }
    }
}
