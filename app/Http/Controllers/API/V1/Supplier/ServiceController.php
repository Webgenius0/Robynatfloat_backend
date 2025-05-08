<?php

namespace App\Http\Controllers\API\V1\Supplier;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Supplier\ServiceRequest;
use App\Models\Service;
use App\Services\API\V1\Supplier\ServiceService;
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
           $storeService= $this->serviceService->serviceStore($validatedData);
            return $this->success(201, 'Created Successfully.', $storeService);
        } catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\service\serviceController::store', ['error' => $e->getMessage()]);
            return $this->error(500, 'Server Error.');
        }

    }

    public function serviceIndex():JsonResponse{
        try {
            $response = $this->serviceService->serviceIndex();
            return $this->success(200, 'Successfull', $response);
        } catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\service\serviceController::edit', ['error' => $e->getMessage()]);
            return $this->error(500, 'Server Error.');
        }
    }
    public function serviceUpdate(ServiceRequest $serviceRequest, Service $service, $slug): JsonResponse
{
    try {
        // Validate and process the update
        $validatedData = $serviceRequest->validated();
        $updatedService = $this->serviceService->serviceUpdate($validatedData, $service, $slug);

        // Return success response
        return $this->success(200, 'Service updated successfully.', $updatedService);

    } catch (\Exception $e) {
        // Log the error and return a 404 error if the service is not found
        Log::error('Error updating service: ' . $e->getMessage());

        return response()->json([
            'error' => 'Service not found or update failed.',
            'message' => $e->getMessage(),
        ], 404);
    }
}

    public function serviceShow($slug): JsonResponse{
        try {
            $response = $this->serviceService->serviceShow($slug);
            return $this->success(200, 'show Successfull', $response);
        } catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\service\serviceController::edit', ['error' => $e->getMessage()]);
            return $this->error(500, 'Server Error.');
        }
    }

    public function serviceDelete($slug): JsonResponse{
        try {
            $response = $this->serviceService->serviceDelete($slug);
            return $this->success(200, ' Deleted Successfully', $response);
        } catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\service\serviceController::edit', ['error' => $e->getMessage()]);
            return $this->error(500, 'Server Error.');
        }
    }

    public function galleryStore(Request $request): JsonResponse{
        try {
            // dd($request);
            $validated = $request->validate([
                // 'user_id' => 'required|exists:users,id',
                'gallery_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            // dd($validated);
            $response = $this->serviceService->galleryStore($validated);
            return $this->success(200, 'Gallery Created Successfully', $response);
        } catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\service\serviceController::edit', ['error' => $e->getMessage()]);
            return $this->error(500, 'Server Error.');
        }
    }

    public function getGallery(): JsonResponse{
        try {
            $response = $this->serviceService->getGallery();
            return $this->success(200, 'Gallery Retrieved Successfully', $response);
        } catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\service\serviceController::edit', ['error' => $e->getMessage()]);
            return $this->error(500, 'Server Error.');
        }
    }

    public function updateGallery(Request $request,$slug): JsonResponse{
        try {
            $validated = $request->validate([
                'gallery_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);


            $response = $this->serviceService->updateGallery($validated,$slug);
            return $this->success(200, 'Gallery Updated Successfully', $response);
        } catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\service\serviceController::update', ['error' => $e->getMessage()]);
            return $this->error(500, 'Server Error.');
        }
    }

    public function destroyGallery($slug): JsonResponse{
        try {
            $response = $this->serviceService->destroyGallery($slug);
            return $this->success(200, 'Gallery Deleted Successfully', $response);
        } catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\service\serviceController::destroy', ['error' => $e->getMessage()]);
            return $this->error(500, 'Server Error.');
        }
    }

}
