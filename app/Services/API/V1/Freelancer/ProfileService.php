<?php

namespace App\Services\API\V1\Freelancer;

use App\Models\User;
use App\Repositories\API\V1\Freelancer\ProfileRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Log;

class ProfileService {
    protected ProfileRepositoryInterface $profileRepository;

    public function __construct(ProfileRepositoryInterface $profileRepository) {
        $this->profileRepository = $profileRepository;
    }

    public function updateProfile(User $user, array $data): ?User {
        try {
            // dd($data);
            return $this->profileRepository->updateProfile($user, $data);
        } catch (Exception $e) {
            Log::error('ProfileService::updateProfile', ['error' => $e->getMessage()]);
            return null;
        }
    }
}
