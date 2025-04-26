<?php

namespace App\Repositories\API\V1\Yacht;

use App\Models\JobApplication;
use Illuminate\Support\Facades\Log;

class YachtManageApplicationRepository implements YachtManageApplicationRepositoryInterface
{
    public function getJobApplication()
    {
        // dd('getJobApplication');
        try {
            $getAllJobApplication = JobApplication::with('user', 'profile', 'role')->get();
            return $getAllJobApplication;
        }catch (\Exception $e) {
            Log::error('app/Repositories/API/V1/Yacht/YachtManageApplicationRepository.php:getJobApplication ' . $e->getMessage());
            throw $e;
        }
    }
    public function getJobApplicationBySlug($slug)
    {
        try {
            $getJobApplicationBySlug = JobApplication::with('user', 'profile', 'role')->where('slug', $slug)->first();
            return $getJobApplicationBySlug;
        }catch (\Exception $e) {
            Log::error('app/Repositories/API/V1/Yacht/YachtManageApplicationRepository.php:getJobApplicationBySlug ' . $e->getMessage());
            throw $e;
        }
    }
}
