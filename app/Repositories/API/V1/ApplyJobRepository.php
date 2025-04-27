<?php

namespace App\Repositories\API\V1;

use App\Models\JobApplication;
use Exception;
use Illuminate\Support\Facades\Log;

class ApplyJobRepository implements ApplyJobRepositoryInterface
{

    public function applyToJob(array $data) {
        try {
            // dd($data);
            return JobApplication::create($data);
            dd($data);
        } catch (Exception $e) {
            Log::error('ApplyJobRepository::applyToJob', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    public function getAppliedJobs(){
        try {
            $jobApplication = JobApplication::where('user_id', auth()->user()->id)->with('job')->latest()->get();
            return $jobApplication;
        } catch (Exception $e) {
            Log::error('ApplyJobRepository::getAppliedJobs', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    public function getAppliedJobBySlug($slug){
        try {
            $jobApplication = JobApplication::where('user_id', auth()->user()->id)->where('slug', $slug)->with('job')->first();
            return $jobApplication;
        } catch (Exception $e) {
            Log::error('ApplyJobRepository::getAppliedJobBySlug', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
