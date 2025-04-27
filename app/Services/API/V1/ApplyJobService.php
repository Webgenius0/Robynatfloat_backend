<?php

namespace App\Services\API\V1;

use App\Repositories\API\V1\ApplyJobRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Log;

class ApplyJobService
{
   protected ApplyJobRepositoryInterface $applyJobRepository;

   public function __construct(ApplyJobRepositoryInterface $applyJobRepository)
   {
      $this->applyJobRepository = $applyJobRepository;
   }

   public function applyToJob(array $data) {
    try {
        // dd($data);
        return $this->applyJobRepository->applyToJob($data);
    } catch (Exception $e) {
        Log::error('ApplyJobService::applyToJob', ['error' => $e->getMessage()]);
        throw $e;
    }
   }

   public function getAppliedJobs(){
    try {
        return $this->applyJobRepository->getAppliedJobs();
    } catch (Exception $e) {
        Log::error('ApplyJobService::getAppliedJobs', ['error' => $e->getMessage()]);
        throw $e;
    }
   }

   public function getAppliedJobBySlug($slug){
    try {
        return $this->applyJobRepository->getAppliedJobBySlug($slug);
    } catch (Exception $e) {
        Log::error('ApplyJobService::getAppliedJobBySlug', ['error' => $e->getMessage()]);
        throw $e;
    }
   }
}
