<?php

namespace App\Services\API\V1\Crew;

use App\Repositories\API\V1\Crew\CrewJobRepositoryInterface;
use Illuminate\Support\Facades\Log;

class CrewJobService
{
    protected CrewJobRepositoryInterface $crewJobRepository;

    public function __construct(CrewJobRepositoryInterface $crewJobRepository)
    {
        $this->crewJobRepository = $crewJobRepository;
    }

    public function getAllJobsStatusBased(){
        try{
            $response = $this->crewJobRepository->getAllJobsStatusBased();
            return $response;
        }catch(\Exception $e){
            Log::error('App\Services\API\V1\Crew\CrewJobService:getAllJobsStatusBased ' . $e->getMessage());
            throw $e;
        }
    }

    public function getJobBySlug($slug){
        try{
            $response=$this->crewJobRepository->getJobBySlug($slug);
            return $response;
        }catch(\Exception $e){
            Log::error('App\Services\API\V1\Crew\CrewJobService:getJobBySlug ' . $e->getMessage());
            throw $e;
        }
    }
}
