<?php

namespace App\Repositories\Web\Backend\V1\User;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;

class FreelancerRepository implements FreelancerRepositoryInterface
{
    public function listFreelancer():mixed
    {
        try {
            return User::select('id','last_name','first_name','handle','email','status','role_id')->whereRoleId(5);
        }

        catch (Exception $e) {
            Log::error('App\Repositories\Web\Backend\V1\User\FreelancerRepository::listFreelancer', ['error' => $e->getMessage()]);
            throw $e;
        }


    }


}
