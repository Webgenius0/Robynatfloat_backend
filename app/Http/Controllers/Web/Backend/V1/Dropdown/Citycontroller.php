<?php

namespace App\Http\Controllers\Web\Backend\V1\Dropdown;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Backend\V1\Dropdown\Country\CityRequest;
use App\Models\City;
use App\Services\Web\Backend\V1\Dropdown\CityService;
use App\Traits\V1\ApiResponse;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Citycontroller extends Controller
{

    use ApiResponse;
    protected CityService $cityService;

    /**
     * construct
     * @param \App\Services\Web\Backend\V1\Dropdown\cityService $cityService
     */


    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
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
                return $this->cityService->index($request);
            }
            $countries = $this->cityService->countrys();
            if (empty($countries)) {
                return $this->error(404, 'No Countries Found.');
            }
            $states= $this->cityService->states();
            if (empty($states)) {
                return $this->error(404, 'No States Found.');
            }

            return view('backend.layouts.dropdown.city.index', compact('countries', 'states'));
        } catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\Dropdown\CityController::index', ['error' => $e->getMessage()]);
            return redirect()->back()->with('t-error', 'Something went wring..!');
        }
    }


    /**
     * Summary of store
     * @param CityRequest $cityRequest
     * @return JsonResponse
     */
    public function store(CityRequest $cityRequest): JsonResponse
    {
        try {
            $validatedData = $cityRequest->validated();
            // dd($validatedData);
            $response = $this->cityService->store($validatedData);
            return $this->success(201, 'Created Successfully.', $response);
        } catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\Dropdown\CityController::store', ['error' => $e->getMessage()]);
            return $this->error(500, 'Server Error.');
        }
    }

    /**
     * Summary of delete
     * @param int $slug
     * @return JsonResponse
     */

     public function destroy(City $city): JsonResponse
    {
        try {
            $city->delete();
            return $this->success(202, 'Updated Successfully');
        } catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\Dropdown\CountryController::destroy', ['error' => $e->getMessage()]);
            return $this->error(500, 'Server Error.');
        }
    }
     }



