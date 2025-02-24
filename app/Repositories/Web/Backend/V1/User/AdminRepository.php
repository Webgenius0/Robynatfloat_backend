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
            return User::select(['id','first_name', 'last_name', 'handle', 'email', 'status', 'role_id'])->whereRoleId(1);
        }catch(Exception $e){
            Log::error('App\Repositories\Web\Backend\V1\User\AdminRepository::AdminListOrderByDesc', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    public function adminStatusUpdate($id):mixed
    {
        try {

            $admin = User::find($id);
            $newstatus = $admin->status == 1 ? 0 : 1;
            return $admin->update(['status' => $newstatus]);

        }catch(Exception $e){
            Log::error('App\Repositories\Web\Backend\V1\User\AdminRepository::adminStatusUpdate', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
