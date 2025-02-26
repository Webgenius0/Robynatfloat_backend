<?php

namespace App\Repositories\Web\Backend\V1\User;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;

class YacthRepository implements YacthRepositoryInterface
{
    public function yachtList(): mixed{
        try{
            //get the user information for yacth repository
        return User::select('id','first_name','last_name','email','status','role_id','handle')->whereRoleId(2);
        } catch(Exception $e){
            Log::error('App\Repositories\Web\Backend\V1\User\YacthRepository::listYacht', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
