<?php

namespace App\Repositories\Web\Backend\V1\User;

interface AdminRepositoryInterface
{
    /**
     * admin list order by dec based on Created_at
     */
    public function latestAdminList(): mixed;

    public function adminStatusUpdate($id): mixed;
}
