<?php

namespace App\Services\API\V1\Supplier;

use App\Models\Service;
use App\Repositories\API\V1\Supplier\ServiceRepositoryInterface;
// use App\Repositories\API\V1\Service\ServiceRepositoryInterface;
// use App\Repositories\API\V1\Supplier\ServiceRepositoryInterface as SupplierServiceRepositoryInterface;
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

    public function serviceIndex(){
        try {
            return $this->serviceRepository->serviceIndex();
        } catch (Exception $e) {
            Log::error('App\Services\API\V1\Service\ServiceService::serviceIndex', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    public function serviceUpdate(array $credentials, Service $service, $slug): Service
    {
        try {
            return $this->serviceRepository->serviceUpdate($credentials, $service, $slug);
        } catch (Exception $e) {
            Log::error('App\Services\API\V1\Service\ServiceService::serviceUpdate', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    public function serviceDelete($slug){
        try {
            return $this->serviceRepository->serviceDelete($slug);
        } catch (Exception $e) {
            Log::error('App\Services\API\V1\Service\ServiceService::serviceDestroy', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    public function serviceShow($slug){
        try {
            return $this->serviceRepository->serviceShow($slug);
        } catch (Exception $e) {
            Log::error('App\Services\API\V1\Service\ServiceService::serviceShow', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
