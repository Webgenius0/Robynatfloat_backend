<?php

namespace App\Http\Controllers\API\V1\Yacht;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Yacht\StoreYachtJobRequest;
use App\Http\Requests\API\V1\Yacht\UpdateYachtJobRequest;
use App\Http\Resources\API\V1\Yacht\YachtJobResource;
use App\Models\Skill;
use App\Models\YachtJob;
use App\Services\API\V1\Yacht\YachtJobService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

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
            $data['slug']    = Helper::generateUniqueSlug($data['job_title'], 'yacht_jobs');

            $yachtJob = $this->yachtJobService->storeYachtJob($data);

            $yachtJob->load('skills');

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
    // public function index(Request $statusChange): JsonResponse {
    //     try {
    //         $jobs = $this->yachtJobService->getAllJobs($statusChange);
    //         return Helper::success(200, 'Yacht jobs retrieved successfully', YachtJobResource::collection($jobs));
    //     } catch (Exception $e) {
    //         Log::error('YachtJobController::index', ['error' => $e->getMessage()]);
    //         return Helper::error(500, 'Server error.');
    //     }
    // }

    public function getAllJobsStatusBased(Request $request): JsonResponse
    {
        try {
            $statusChange = [
                'status' => $request->query('status') 
            ];

            $jobs = $this->yachtJobService->getAllJobs($statusChange);

            return Helper::success(200, 'Yacht jobs retrieved successfully', YachtJobResource::collection($jobs));
        } catch (Exception $e) {
            Log::error('YachtJobController::getAllJobsStatusBased', ['error' => $e->getMessage()]);
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
            $data            = $request->validated();
            $data['user_id'] = $request->user()->id;

            $updatedJob = $this->yachtJobService->updateYachtJob($job->id, $data);
            if (!$updatedJob) {
                return Helper::error(404, 'Yacht job not found.');
            }

            if (!empty($data['skills'])) {
                $skillIds = collect($data['skills'])->map(function (string $skillName) {
                    $name = trim($skillName);
                    $slug = Str::slug($name);
                    return Skill::firstOrCreate(
                        ['slug' => $slug],
                        ['name' => $name]
                    )->id;
                })->all();

                $updatedJob->skills()->sync($skillIds);
            }

            $updatedJob->load('skills');

            return Helper::success(200, 'Yacht job updated successfully', new YachtJobResource($updatedJob));
        } catch (Exception $e) {
            Log::error('YachtJobController::update', ['error' => $e->getMessage()]);
            return Helper::error(500, 'Server error.');
        }
    }

    /**
     * Delete a yacht job using model binding (lookup by slug).
     *
     * @param YachtJob $job
     * @return JsonResponse
     */
    public function destroy(YachtJob $slug): JsonResponse {
        try {
            $slug->delete();
            return Helper::success(200, 'Yacht job deleted successfully');
        } catch (Exception $e) {
            Log::error('YachtJobController::destroy', ['error' => $e->getMessage()]);
            return Helper::error(500, 'Server error.');
        }
    }


}
