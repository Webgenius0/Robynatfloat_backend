<?php

namespace App\Repositories\Web\Backend\V1\User;

use App\Models\User;

interface UserRepositoryInterface
{
    /**
     * changing the status of the user
     * @param \App\Models\User $user
     * @return void
     */
    public function changeStatus(User $user);
}
