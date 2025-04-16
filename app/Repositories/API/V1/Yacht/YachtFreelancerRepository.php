<?php

namespace App\Repositories\API\V1\Yacht;

use App\Models\User;
use Illuminate\Support\Facades\Log;

class YachtFreelancerRepository implements YachtFreelancerRepositoryInterface
{

    public function getAllFreelancer()
    {
        // Your logic to get all suppliers
        try {
            $freelancers = User::with('profile')->where('role_id', 5)->get();
            return $freelancers;
        } catch (\Exception $e) {
            // Handle the exception
            Log::error('App\Repositories\API\V1\Yacht\YachtFreelancerRepository:getAllFreelancer', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    public function getFreelancerById($id)
    {
        // Your logic to get a single supplier by ID
        try {
            $freelancer = User::with('profile')->where('role_id', 5)->findOrFail($id);
            return $freelancer;
        } catch (\Exception $e) {
            // Handle the exception
            Log::error('App\Repositories\API\V1\Yacht\YachtFreelancerRepository:getFreelancerById', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
