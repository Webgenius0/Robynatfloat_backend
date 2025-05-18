<?php

namespace App\Repositories\API\V1\Freelancer;

use App\Helpers\Helper;
use App\Models\Certificate;
use App\Models\Language;
use App\Models\Skill;
use App\Models\User;
use App\Repositories\API\V1\Freelancer\ProfileRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProfileRepository implements ProfileRepositoryInterface {
    /**
     * Update the profile data in the database (no JSON response here).
     *
     * @param User $user
     * @param array $data
     * @return User|null
     * @throws Exception
     */
    public function updateProfile(User $user, array $data): ?User {
        DB::beginTransaction();

        try {
            // Update user fields
            $userData = array_intersect_key($data, array_flip([
                'first_name', 'last_name', 'email', 'location', 'phone_number','yacht_type'
            ]));

            if (request()->hasFile('avatar')) {
                $userData['avatar'] = Helper::uploadFile(request()->file('avatar'), 'avatars');
            }
            $user->update($userData);

            // Update profile
            $profileData = array_intersect_key($data, array_flip([
                'bio', 'cv_url', 'facebook', 'instagram', 'youtube', 'linkedin','yacht_length', 'yacht_year_build', 'yacht_location',

            ]));
            if (request()->hasFile('cv_url')) {
                $profileData['cv_url'] = Helper::uploadFile(request()->file('cv_url'), 'documents');
            }
            $user->profile ? $user->profile->update($profileData) : $user->profile()->create($profileData);

             // Handle yacht images
       // Handle yacht images (ensure profile exists)
if ($user->profile && request()->hasFile('yacht_images')) {
    foreach (request()->file('yacht_images') as $image) {
        $url = Helper::uploadFile($image, 'yachts');
        $user->profile->images()->create(['url' => $url]);
    }
}
// dd($user->profile->images);
            // Update experiences
            if (isset($data['experiences']) && is_array($data['experiences'])) {
                foreach ($data['experiences'] as $exp) {
                    if (!empty($exp['id'])) {
                        $existing = $user->experience()->find($exp['id']);
                        if ($existing) {
                            $existing->update($exp);
                        }
                    } else {
                        if (isset($exp['position'], $exp['company'], $exp['from'], $exp['to'], $exp['about'])) {
                            $user->experience()->create($exp);
                        }
                    }
                }
            }

            // Certificates
            if (isset($data['certifications']) && is_array($data['certifications'])) {
                $certIds = [];
                foreach ($data['certifications'] as $cert) {
                    if (is_numeric($cert)) {
                        $certIds[] = $cert;
                    } else {
                        $existing = Certificate::where('name', $cert)->first();
                        if (!$existing) {
                            $existing = Certificate::create([
                                'name' => $cert,
                                'slug' => Helper::generateUniqueSlug($cert, 'certificates'),
                            ]);
                        }
                        $certIds[] = $existing->id;
                    }
                }
                $user->certificates()->sync($certIds);
            }

            // Skills
            if (isset($data['skills']) && is_array($data['skills'])) {
                $skillIds = [];
                foreach ($data['skills'] as $skillInput) {
                    if (is_numeric($skillInput)) {
                        $skillIds[] = $skillInput;
                    } else {
                        $skill = Skill::where('name', $skillInput)->first();
                        if (!$skill) {
                            $skill = Skill::create([
                                'name' => $skillInput,
                                'slug' => Helper::generateUniqueSlug($skillInput, 'skills'),
                            ]);
                        }
                        $skillIds[] = $skill->id;
                    }
                }
                $user->skills()->sync($skillIds);
            }

            // Languages
            if (isset($data['languages']) && is_array($data['languages'])) {
                $languageIds = [];
                foreach ($data['languages'] as $lang) {
                    if (is_numeric($lang)) {
                        $languageIds[] = $lang;
                    } else {
                        $existing = Language::where('name', $lang)->first();
                        if (!$existing) {
                            $existing = Language::create([
                                'name' => $lang,
                                'slug' => Helper::generateUniqueSlug($lang, 'languages'),
                            ]);
                        }
                        $languageIds[] = $existing->id;
                    }
                }
                $user->languages()->sync($languageIds);
            } else {
                // If no languages submitted, optionally clear them
                $user->languages()->sync([]);
            }

            DB::commit();

            // Return the updated user model
            return $user->load('profile', 'experience', 'certificates', 'skills', 'languages');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('ProfileRepository::updateProfile', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
