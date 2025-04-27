<?php

namespace App\Services\API\V1\Supplier;

use App\Repositories\API\V1\Supplier\SupplierMyJobRepositoryInterface;
use Illuminate\Support\Facades\Log;

class SupplierMyJobService
{
   protected SupplierMyJobRepositoryInterface $supplierMyJobRepository;

   public function __construct(SupplierMyJobRepositoryInterface $supplierMyJobRepository)
   {
       $this->supplierMyJobRepository = $supplierMyJobRepository;
   }

   public function getSuggestedJob(){
    try {
        return $this->supplierMyJobRepository->getSuggestedJob();
    } catch (\Exception $e) {
        Log::error('App\Services\API\V1\Supplier\SupplierMyJobService:getSuggestedJob', ['error' => $e->getMessage()]);
        throw $e;
    }
   }

   public function getSuggestedJobBySlug($slug){
    try {
        return $this->supplierMyJobRepository->getSuggestedJobBySlug($slug);
    } catch (\Exception $e) {
        Log::error('App\Services\API\V1\Supplier\SupplierMyJobService:getSuggestedJobBySlug', ['error' => $e->getMessage()]);
        throw $e;
    }
   }
}
