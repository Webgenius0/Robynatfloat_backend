<?php

namespace App\Repositories\API\V1\Supplier;

use App\Models\YachtJob;
use Illuminate\Support\Facades\Log;

class SupplierMyJobRepository implements SupplierMyJobRepositoryInterface
{
   public function getSuggestedJob(){
    try{
        $suggestedJob= YachtJob::all();
    return $suggestedJob;
    }catch(\Exception $e){
        Log::error('App\Repositories\API\V1\Supplier\SupplierMyJobRepository:getSuggestedJob', ['error' => $e->getMessage()]);
        throw $e;
    }
}

public function getSuggestedJobBySlug($slug){
    try{
        $suggestedJob= YachtJob::where('slug', $slug)->first();
    return $suggestedJob;
    }catch(\Exception $e){
        Log::error('App\Repositories\API\V1\Supplier\SupplierMyJobRepository:getSuggestedJobBySlug', ['error' => $e->getMessage()]);
        throw $e;
    }
}
}
