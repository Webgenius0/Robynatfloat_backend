<?php

namespace App\Http\Controllers\Web\Backend\V1\Dropdown;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Backend\V1\Dropdown\YachtType\YachtTypeRequest;
use App\Models\YachtType;
use App\Services\Web\Backend\V1\Dropdown\YachtTypeService;
use App\Traits\V1\ApiResponse;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class YachtTypeController extends Controller
{
    use ApiResponse;
    protected YachtTypeService $yachtTypeService;

    /**
     * construct
     * @param \App\Services\Web\Backend\V1\Dropdown\YachtTypeService $yachtTypeService
     */
    public function __construct(YachtTypeService $yachtTypeService)
    {
        $this->yachtTypeService = $yachtTypeService;
    }

    /**
     * Summary of index
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function index(Request $request): JsonResponse|RedirectResponse|View
    {
        try {
            if ($request->ajax()) {
                return $this->yachtTypeService->index($request);
            }
            return view('backend.layouts.dropdown.yacht_type.index');
        } catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\Dropdown\YachtTypeController::index', ['error' => $e->getMessage()]);
            return redirect()->back()->with('t-error', 'Something went wring..!');
        }
    }

    /**
     * Summary of store
     * @param YachtTypeRequest $createRequest
     * @return JsonResponse
     */
    public function store(YachtTypeRequest $createRequest): JsonResponse
    {
        try {
            $validatedData = $createRequest->validated();
            $response = $this->yachtTypeService->store($validatedData);
            return $this->success(201, 'Created Successfully.', $response);
        } catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\Dropdown\YachtTypeController::store', ['error' => $e->getMessage()]);
            return $this->error(500, 'Server Error.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(YachtType $yachtType): JsonResponse
    {
        try {
            $response = $this->yachtTypeService->showModelToEdit($yachtType);
            return $this->success(200, 'Successfull', $response);
        } catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\Dropdown\YachtTypeController::edit', ['error' => $e->getMessage()]);
            return $this->error(500, 'Server Error.');
        }
    }

    /**
     * update yachtype
     * @param \App\Http\Requests\Web\Backend\V1\Dropdown\YachtType\YachtTypeRequest $updateRequest
     * @param \App\Models\YachtType $yachtType
     * @return JsonResponse
     */
    public function update(YachtTypeRequest $updateRequest, YachtType $yachtType): JsonResponse
    {
        try {
            $validatedData = $updateRequest->validated();
            $this->yachtTypeService->update($validatedData, $yachtType);
            return $this->success(202, 'Updated Successfully');
        } catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\Dropdown\YachtTypeController::update', ['error' => $e->getMessage()]);
            return $this->error(500, 'Server Error.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(YachtType $yachtType)
    {
        try {
        } catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\Dropdown\YachtTypeController::destroy', ['error' => $e->getMessage()]);
            return redirect()->back()->with('t-error', 'Something went wring..!');
        }
    }
}
