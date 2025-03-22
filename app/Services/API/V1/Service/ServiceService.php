<?php

namespace App\Services\API\V1\Service;

use App\Models\Service;
use App\Repositories\API\V1\Service\ServiceRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Log;

class ServiceService
{
    protected ServiceRepositoryInterface $serviceRepository;

    public function __construct(ServiceRepositoryInterface $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }
    public function serviceStore(array $credentials): Service
    {
        try {
            return $this->serviceRepository->serviceStore($credentials);
        } catch (Exception $e) {
            Log::error('App\Services\API\V1\Service\ServiceService::serviceStore', ['error' => $e->getMessage()]);
            throw $e;
        }

    }
}
