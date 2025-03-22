<?php

namespace App\Http\Controllers\API\V1\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Service\ServiceRequest;
use App\Models\Service;
use App\Services\API\V1\Service\ServiceService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ServiceController extends Controller
{
    protected ServiceService $serviceService;
    public function __construct(ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }

    public function serviceStore(ServiceRequest $serviceRequest):JsonResponse{

        try{
            $validatedData = $serviceRequest->validated();
            // dd($validatedData);
            $this->serviceService->serviceStore($validatedData);
            return $this->success(201, 'Created Successfully.');
        } catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\Blog\BlogController::store', ['error' => $e->getMessage()]);
            return $this->error(500, 'Server Error.');
        }

    }
}
