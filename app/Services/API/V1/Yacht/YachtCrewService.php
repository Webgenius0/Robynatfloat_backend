<?php

namespace App\Services\API\V1\Yacht;

use App\Repositories\API\V1\Yacht\YachtCrewRepositoryInterface;
use Illuminate\Support\Facades\Log;

class YachtCrewService
{
    // Your service logic goes here

    protected YachtCrewRepositoryInterface $yachtCrewRepository;
    public function __construct(YachtCrewRepositoryInterface $yachtCrewRepository)
    {
        $this->yachtCrewRepository = $yachtCrewRepository;
    }

    public function getAllCrew()
    {

        try {
            $crews = $this->yachtCrewRepository->getAllCrew();
            return $crews;
        } catch (\Exception $e) {
            // Handle the exception
            Log::error('App\Services\API\V1\Yacht\YachtCrewService:getAllCrew', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    public function getCrewById($id)
    {
        try {
            $crew = $this->yachtCrewRepository->getCrewById($id);
            return $crew;
        } catch (\Exception $e) {
            // Handle the exception
            Log::error('App\Services\API\V1\Yacht\YachtCrewService:getCrewById', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
