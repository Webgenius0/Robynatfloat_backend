<?php

namespace App\Http\Controllers\API\V1\Freelancer;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Freelancer\UpdateProfileRequest;
use App\Http\Resources\Api\V1\Freelancer\UserResource;
use App\Models\Certificate;
use App\Models\Language;
use App\Models\Skill;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FreelancerProfileController extends Controller {
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
        $user = $request->user();

        DB::beginTransaction();
        try {
            // Update fields in the users table
            $userData = $request->only(['first_name', 'last_name', 'email', 'location', 'phone_number']);

            // Process avatar if provided
            if ($request->hasFile('avatar')) {
                $userData['avatar'] = Helper::uploadFile($request->file('avatar'), 'avatars');
            }
            $user->update($userData);

            // Update profile (one-to-one relationship)
            $profileData = $request->only(['bio', 'cv_url', 'facebook', 'instagram', 'youtube', 'linkedin']);
            if ($user->profile) {
                $user->profile->update($profileData);
            } else {
                $user->profile()->create($profileData);
            }

            // Update experiences
            if ($request->has('experiences')) {
                foreach ($request->input('experiences') as $experienceData) {
                    // Ensure all required fields are provided before creating an entry.
                    if (
                        isset($experienceData['position'], $experienceData['company'],
                            $experienceData['from'], $experienceData['to'], $experienceData['about'])
                    ) {
                        $user->experience()->create([
                            'position' => $experienceData['position'],
                            'company'  => $experienceData['company'],
                            'from'     => $experienceData['from'],
                            'to'       => $experienceData['to'],
                            'about'    => $experienceData['about'],
                        ]);
                    }
                }
            }

            // Update many-to-many relationships
            // Update certificates
            if ($request->has('certifications')) {
                $submittedCertificates = $request->input('certifications'); // This can be a mix of IDs and/or names
                $certificateIds        = [];

                foreach ($submittedCertificates as $certificateInput) {
                    if (is_numeric($certificateInput)) {
                        // If it's numeric, assume it's an existing certificate ID.
                        $certificateIds[] = $certificateInput;
                    } else {
                        // Otherwise, treat it as a certificate name.
                        $certificate = Certificate::where('name', $certificateInput)->first();
                        if (!$certificate) {
                            // Create a new certificate using the provided name and generate a unique slug.
                            $certificate = Certificate::create([
                                'name' => $certificateInput,
                                'slug' => Helper::generateUniqueSlug($certificateInput, 'certificates'),
                            ]);
                        }
                        $certificateIds[] = $certificate->id;
                    }
                }

                // Update the many-to-many relationship (pivot table 'certificate_users').
                $user->certificates()->sync($certificateIds);
            }

            // Update skills
            if ($request->has('skills')) {
                $submittedSkills = $request->input('skills'); // May contain a mix of IDs and/or names.
                $skillIds        = [];

                foreach ($submittedSkills as $skillInput) {
                    if (is_numeric($skillInput)) {
                        // If numeric, assume it's an existing skill ID.
                        $skillIds[] = $skillInput;
                    } else {
                        // Otherwise, treat the input as a skill name.
                        $skill = Skill::where('name', $skillInput)->first();
                        if (!$skill) {
                            // Create a new skill if it doesn't exist.
                            $skill = Skill::create([
                                'name' => $skillInput,
                                'slug' => Helper::generateUniqueSlug($skillInput, 'skills'),
                            ]);
                        }
                        $skillIds[] = $skill->id;
                    }
                }

                // Sync the skill IDs to the pivot table 'skill_user'.
                $user->skills()->sync($skillIds);
            }

            // Update languages
            if ($request->has('languages')) {
                $submittedLanguages = $request->input('languages'); // May contain a mix of IDs and/or names.
                $languageIds        = [];

                foreach ($submittedLanguages as $languageInput) {
                    if (is_numeric($languageInput)) {
                        // If numeric, assume it's an existing language ID.
                        $languageIds[] = $languageInput;
                    } else {
                        // Otherwise, treat the input as a language name.
                        $language = Language::where('name', $languageInput)->first();
                        if (!$language) {
                            // Create a new language if it doesn't exist.
                            $language = Language::create([
                                'name' => $languageInput,
                                'slug' => Helper::generateUniqueSlug($languageInput, 'languages'),
                            ]);
                        }
                        $languageIds[] = $language->id;
                    }
                }

                // Sync the language IDs to the user's languages relationship.
                $user->languages()->sync($languageIds);
            }

            DB::commit();

            // Reload relations if needed
            $user->load('profile', 'experience', 'certificates', 'skills', 'languages');

            return Helper::success(200, 'Profile updated successfully', new UserResource($user));
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('UserProfileController::updateProfile', ['error' => $e->getMessage()]);
            return Helper::error(500, 'Server error.');
        }
    }
}
