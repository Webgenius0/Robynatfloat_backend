<?php

namespace App\Repositories\Web\Backend\V1\User;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;

class AdminRepository implements AdminRepositoryInterface
{
    /**
     * admin list order by dec based on Created_at
     */
    public function latestAdminList():mixed
    {
        try {
            return User::select(['first_name', 'last_name', 'handle', 'email', 'status', 'role_id'])->whereRoleId(1);
        }catch(Exception $e){
            Log::error('App\Repositories\Web\Backend\V1\User\AdminRepository::AdminListOrderByDesc', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
