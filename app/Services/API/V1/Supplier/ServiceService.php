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
    public function galleryStore(array $request){
        try {
            return $this->serviceRepository->galleryStore($request);
        } catch (Exception $e) {
            Log::error('App\Services\API\V1\Service\ServiceService::galleryStore', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    public function getGallery(){
        try {
            return $this->serviceRepository->getGallery();
        } catch (Exception $e) {
            Log::error('App\Services\API\V1\Service\ServiceService::getGallery', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    public function updateGallery(array $request, $slug){
        try{
            return $this->serviceRepository->updateGallery($request,$slug);
        }catch(Exception $e){
            Log::error('App\Services\API\V1\Service\ServiceService::updateGallery', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    public function destroyGallery($slug){
        try {
            return $this->serviceRepository->destroyGallery($slug);
        } catch (Exception $e) {
            Log::error('App\Services\API\V1\Service\ServiceService::destroyGallery', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
