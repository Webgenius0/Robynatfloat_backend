<?php

namespace App\Http\Controllers\Web\Backend\V1\Dropdown;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Backend\V1\Dropdown\Country\StateRequest;
use App\Models\State;
use App\Services\Web\Backend\V1\Dropdown\StateService;
use App\Traits\V1\ApiResponse;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StateController extends Controller
{
    use ApiResponse;
  protected StateService $stateService;

  public function __construct(StateService $stateService)
  {
    $this->stateService = $stateService;
  }
  public function index(Request $request): JsonResponse|RedirectResponse|View
  {
      try {
          if ($request->ajax()) {
              return $this->stateService->index($request);
          }
          $countries = $this->stateService->getallcountry();
          if (empty($countries)) {
              return $this->error(404, 'No Countries Found.');
          }
          return view('backend.layouts.dropdown.state.index', compact('countries'));
      } catch (Exception $e) {
          Log::error('App\Http\Controllers\Web\Backend\V1\Dropdown\StateController::index', ['error' => $e->getMessage()]);
          return redirect()->back()->with('t-error', 'Something went wrong..!');
      }
  }

  public function store(StateRequest $stateRequest): JsonResponse {
    try {
        $validatedData = $stateRequest->validated();
        // dd($validatedData);
        $response = $this->stateService->storeState($validatedData);
        return $this->success(201, 'Created Successfully.', $response);
    } catch (Exception $e) {
        Log::error('App\Http\Controllers\Web\Backend\V1\Dropdown\CityController::store', ['error' => $e->getMessage()]);
        return $this->error(500, 'Server Error.');
    }
}
/**
     * Summary of edit
     * @param State $state
     * @return JsonResponse
     */
    public function edit(State $state): JsonResponse {
        try {
            $response = $this->stateService->showModelToEdit($state);
            return $this->success(200, 'Successful', $response);
        } catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\Dropdown\StateController::edit', ['error' => $e->getMessage()]);
            return $this->error(500, 'Server Error.');
        }
    }
     /**
     * update state
     * @param \App\Http\Requests\Web\Backend\V1\Dropdown\State\StateRequest $updateRequest
     * @param \App\Models\State $state
     * @return JsonResponse
      */
      public function update(StateRequest $updateRequest, State $state): JsonResponse {
        try {
            $validatedData = $updateRequest->validated();
            $this->stateService->updateState($validatedData, $state);
            return $this->success(200, 'Updated Successfully');
        } catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\Dropdown\StateController::update', ['error' => $e->getMessage()]);
            return $this->error(500, 'Server Error.');
        }
    }


/**
     * Summary of delete
     * @param int $slug
     * @return JsonResponse
     */

     public function destroy(State $state): JsonResponse {
        try {
            $state->delete();
            return $this->success(202, 'Delete Successfully');
        } catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\Dropdown\CountryController::destroy', ['error' => $e->getMessage()]);
            return $this->error(500, 'Server Error.');
        }
    }


}







