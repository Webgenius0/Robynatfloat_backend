<?php

namespace App\Http\Controllers\Web\Backend\V1\Dropdown;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Backend\V1\Dropdown\Country\CountryRequest;
use App\Services\Web\Backend\V1\Dropdown\CountryService;
use App\Traits\V1\ApiResponse;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CountryController extends Controller
{
    use ApiResponse;
    protected CountryService $countryService;

    /**
     * construct
     * @param \App\Services\Web\Backend\V1\Dropdown\CountryService $countryTypeService
     */


    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
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
                return $this->countryService->index($request);
            }
            return view('backend.layouts.dropdown.country.index');
        } catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\Dropdown\CountryTypeController::index', ['error' => $e->getMessage()]);
            return redirect()->back()->with('t-error', 'Something went wring..!');
        }
    }

    /**
     * Summary of store
     * @param CountryRequest $createRequest
     * @return JsonResponse
     */
    public function store(CountryRequest $CountryRequest): JsonResponse
    {
        try {
            $validatedData = $CountryRequest->validated();
            $response = $this->countryService->store($validatedData);
            return $this->success(201, 'Created Successfully.', $response);
        } catch (Exception $e) {
            Log::error('App\Http\Controllers\Web\Backend\V1\Dropdown\CountryController::store', ['error' => $e->getMessage()]);
            return $this->error(500, 'Server Error.');
        }
    }
}
