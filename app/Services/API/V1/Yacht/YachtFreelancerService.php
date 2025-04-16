<?php

namespace App\Services\API\V1\Yacht;

use App\Repositories\API\V1\Yacht\YachtFreelancerRepositoryInterface;
use Illuminate\Support\Facades\Log;

class YachtFreelancerService
{

    protected YachtFreelancerRepositoryInterface $yachtFreelancerRepository;
    public function __construct(YachtFreelancerRepositoryInterface $yachtFreelancerRepository)
    {
        $this->yachtFreelancerRepository = $yachtFreelancerRepository;
    }
    public function getAllFreelancer(){
    try{
        return $this->yachtFreelancerRepository->getAllFreelancer();
        }catch(\Exception $e){
    Log::error('YachtFreelancerService::getAllFreelancer', ['error' => $e->getMessage()]);
    throw $e;
    }
    }
    public function getFreelancerById(int $id){
        try{
            return $this->yachtFreelancerRepository->getFreelancerById($id);
        }catch(\Exception $e){
            Log::error('YachtFreelancerService::getFreelancerById', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
