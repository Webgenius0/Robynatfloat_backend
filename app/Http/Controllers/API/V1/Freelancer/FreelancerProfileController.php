<?php

namespace App\Http\Controllers\API\V1\Freelancer;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Freelancer\UpdateProfileRequest;
use App\Http\Resources\Api\V1\Freelancer\UserResource;
use App\Services\API\V1\Freelancer\ProfileService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FreelancerProfileController extends Controller {
    protected ProfileService $profileService;

    public function __construct(ProfileService $profileService) {
        $this->profileService = $profileService;
    }

    /**
     * Get the details of the authenticated user.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function profile(Request $request): JsonResponse {
        try {
            $user = $request->user();

            if (!$user) {
                return Helper::error(404, 'User not found.');
            }

            return Helper::success(200, 'User details retrieved successfully', new UserResource($user));
        } catch (Exception $e) {
            Log::error('UserController::profile', ['error' => $e->getMessage()]);
            return Helper::error(500, 'Server error.');
        }
    }

    /**
     * Update the profile of the authenticated user.
     *
     * @param UpdateProfileRequest $request
     * @return JsonResponse
     */
    public function updateProfile(UpdateProfileRequest $request): JsonResponse {
        DB::beginTransaction();
        try {
            $user        = $request->user();
            $updatedUser = $this->profileService->updateProfile($user, $request->all());

            if (!$updatedUser) {
                DB::rollBack();
                return Helper::error(500, 'Could not update profile.');
            }

            DB::commit();
            return Helper::success(200, 'Profile updated successfully', new UserResource($updatedUser));
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('UserProfileController::updateProfile', ['error' => $e->getMessage()]);
            return Helper::error(500, 'Server error.');
        }
    }
}
