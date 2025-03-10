<?php

namespace App\Services\Web\Backend\V1\Dropdown;

use App\Models\City;
use App\Repositories\Web\Backend\V1\Dropdown\CityRepositoryInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class CityService
{
    protected CityRepositoryInterface $cityRepository;


    /**
     * construct
     * @param \App\Repositories\Web\Backend\V1\Dropdown\cityRepositoryInterface $cityRepository
     */
    public function __construct(CityRepositoryInterface $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }


    /**
     * yajra table for city
     * @param mixed $request
     * @return JsonResponse
     */

    public function index($request): JsonResponse
    {
        try {
            $citys = $this->cityRepository->listOfCity();
            /**
             * applying search operation
             */
            if ($request->has('search') && $request->search) {
                $searchTerm = $request->search;
                $citys->where(function ($citys) use ($searchTerm) {
                    $citys->where('name', 'like', '%' . $searchTerm . '%');
                });
            }
            return DataTables::of($citys)
                ->addColumn('name', function ($data) {
                    return '<td class="ps-1">
                                 <div class="d-flex align-items-center">
                                     <a>
                                         <h5 class="mb-0">
                                             <a  class="text-inherit">' . $data->name . '</a>
                                         </h5>
                                     </div>
                                 </div>
                             </td>';
                })
                ->addColumn('action', function ($data) {
                    return '<td class="ps-1">
                                 <div class="d-flex align-items-center">
                                     <a>
                                         <button type="button" class="btn btn-secondary-soft mb-2" onclick="editModal(\'' . $data->slug . '\')">Edit</button>
                                         <button type="button" class="btn btn-danger-soft mb-2" onclick="deleteAlert(\'' . $data->slug . '\')" >Delete</button>
                                     </div>
                                 </div>
                             </td>';
                })
                ->rawColumns(['name', 'action'])
                ->make(true);
        } catch (Exception $e) {
            Log::error('App\Services\Web\Backend\V1\Dropdown\CityService::index', ['error' => $e->getMessage()]);
            throw $e;
        }
    }



    /**
     * storing city
     * @param array $credentials
     * @return City
     */
    public function store(array $credentials): City
    {
        try {
            return $this->cityRepository->createCity($credentials);
        } catch (Exception $e) {
            Log::error('App\Services\Web\Backend\V1\Dropdown\cityService::store', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    public function countrys()
    {
        try {
            return $this->cityRepository->countrys();
        } catch (Exception $e) {
            Log::error('App\Services\Web\Backend\V1\Dropdown\CityService::country', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    //get the state of the country
    public function states()
    {
        try {
            return $this->cityRepository->states();
        } catch (Exception $e) {
            Log::error('App\Services\Web\Backend\V1\Dropdown\CityService::state', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    public function showModelToEdit(City $city):array
    {
        try {
            $states = $this->cityRepository->states();
            $countries = $this->cityRepository->countrys();

            return ['html' => view('backend.layouts.dropdown.city.components.update', compact('city', 'states', 'countries'))->render()];
        } catch (Exception $e) {
            Log::error('App\Services\Web\Backend\V1\Dropdown\cityService::showModelToEdit', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    public function update(array $credentials, City $city): City
    {
        try {
            return $this->cityRepository->updateCity($credentials, $city);
        } catch (Exception $e) {
            Log::error('App\Services\Web\Backend\V1\Dropdown\CityService::update', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
