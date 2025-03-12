<?php

namespace App\Services\Web\Backend\V1\Dropdown;

use App\Models\State;
use App\Repositories\Web\Backend\V1\Dropdown\StateRepositoryInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class StateService
{
    // Your service logic goes here
    protected StateRepositoryInterface $stateRepository;

    public function __construct(StateRepositoryInterface $stateRepository)
    {
        $this->stateRepository = $stateRepository;
    }
    /**
     * yajra table for State
     * @param mixed $request
     * @return JsonResponse
     */

    public function index($request): JsonResponse
    {
        try {
            // Ensure `listOfState()` returns a query builder, not a collection
            $query = $this->stateRepository->listOfState();

            if (!$query instanceof \Illuminate\Database\Eloquent\Builder) {
                throw new \Exception("listOfState() must return a query builder, not a collection.");
            }

            // Load 'country' relation before getting data
            $query = $query->with('country');

            // Apply search filter if present
            if ($request->has('search') && $request->search) {
                $searchTerm = $request->search;
                $query->where('name', 'like', '%' . $searchTerm . '%')
                    ->orWhereHas('country', function ($q) use ($searchTerm) {
                        $q->where('name', 'like', '%' . $searchTerm . '%');
                    });
            }

            $states = $query->get(); // Get the final filtered data

            return DataTables::of($states)
                ->addColumn('country_name', fn($data) => $data->country->name ?? 'N/A')
                ->addColumn('name', function ($data) {
                    return '<td class="ps-1">
                                 <div class="d-flex align-items-center">
                                     <h5 class="mb-0">
                                         <a class="text-inherit">' . e($data->name) . '</a>
                                     </h5>
                                 </div>
                             </td>';
                })
                ->addColumn('action', function ($data) {
                    return '<td class="ps-1">
                                 <div class="d-flex align-items-center">
                                     <button type="button" class="btn btn-secondary-soft mb-2" onclick="editModal(\'' . e($data->slug) . '\')">Edit</button>
                                     <button type="button" class="btn btn-danger-soft mb-2" onclick="deleteAlert(\'' . e($data->slug) . '\')">Delete</button>
                                 </div>
                             </td>';
                })
                ->rawColumns(['name', 'action'])
                ->make(true);
        } catch (\Exception $e) {
            Log::error('StateService::index - Error fetching states', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Something went wrong!'], 500);
        }
    }

    public function storeState(array $credentials): State
    {
        try {
            return $this->stateRepository->storeState($credentials);
        } catch (Exception $e) {
            Log::error('App\Services\Web\Backend\V1\Dropdown\StateService::storeState', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    public function showModelToEdit(State $state): array
    {
        try {
            $countries = $this->stateRepository->getallcountry();
            return ['html' => view('backend.layouts.dropdown.state.components.update', compact('state', 'countries'))->render()];
        } catch (Exception $e) {
            Log::error('App\Services\Web\Backend\V1\Dropdown\StateService::showModelToEdit', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    public function updateState(array $credentials, State $state): State
    {
        try {
            return $this->stateRepository->updateState($credentials, $state);
        } catch (Exception $e) {
            Log::error('App\Services\Web\Backend\V1\Dropdown\StateService::updateState', ['error' => $e->getMessage()]);
            throw $e;
        }
    }



    public function getallcountry()
    {
        try {
            return $this->stateRepository->getallcountry();
        } catch (Exception $e) {
            Log::error('App\Services\Web\Backend\V1\Dropdown\StateService::getallcountry', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
