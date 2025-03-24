<?php

namespace App\Repositories\API\V1\Freelancer;

use App\Models\User;

interface ProfileRepositoryInterface {
    public function updateProfile(User $user, array $data): ?User;
}
