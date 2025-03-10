<?php

namespace App\Repositories\Web\Backend\V1\User;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;

class UserRepository implements UserRepositoryInterface
{
    /**
     * changing the status of the user
     * @param \App\Models\User $user
     * @return void
     */
    public function changeStatus(User $user)
    {
        try {
            $user->status = !$user->status;
            $user->save();
        }catch(Exception $e){
            Log::error('App\Repositories\Web\Backend\V1\User\UserRepository::changeStatus', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
