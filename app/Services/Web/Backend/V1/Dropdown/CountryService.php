<?php

namespace App\Services\Web\Backend\V1\Dropdown;

use App\Models\Country;
use App\Repositories\Web\Backend\V1\Dropdown\CountryRepositoryInterface;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class CountryService
{
    protected CountryRepositoryInterface $countryRepository;

    /**
     * construct
     * @param \App\Repositories\Web\Backend\V1\Dropdown\CountryRepositoryInterface $countryRepository
     */
    public function __construct(CountryRepositoryInterface $countryRepository)
    {
     $this->countryRepository = $countryRepository;

    }

    /**
     * yajra table for country
     * @param mixed $request
     * @return JsonResponse
     */

     public function index($request): JsonResponse
     {
         try {
             $countrys = $this->countryRepository->listOfCountry();
             /**
              * applying search operation
              */
             if ($request->has('search') && $request->search) {
                 $searchTerm = $request->search;
                 $countrys->where(function ($countrys) use ($searchTerm) {
                     $countrys->where('name', 'like', '%' . $searchTerm . '%');
                 });
             }
             return DataTables::of($countrys)
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
             Log::error('App\Services\Web\Backend\V1\Dropdown\countryService::index', ['error' => $e->getMessage()]);
             throw $e;
         }
     }


     /**
     * storing Country
     * @param array $credentials
     * @return Country
     */
    public function store(array $credentials):Country
    {
        try {
            return $this->countryRepository->createCountry($credentials);
        } catch (Exception $e) {
            Log::error('App\Services\Web\Backend\V1\Dropdown\countryService::store', ['error' => $e->getMessage()]);
            throw $e;
        }
    }


}
