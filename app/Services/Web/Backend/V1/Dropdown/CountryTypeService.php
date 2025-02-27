<?php

namespace App\Services\Web\Backend\V1\Dropdown;

use App\Repositories\Web\Backend\V1\Dropdown\CountryTypeRepositoryInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class CountryTypeService
{
    protected CountryTypeRepositoryInterface $countryTypeRepository;

    /**
     * construct
     * @param \App\Repositories\Web\Backend\V1\Dropdown\CountryTypeRepositoryInterface $countryTypeRepository
     */
    public function __construct(CountryTypeRepositoryInterface $countryTypeRepository)
    {
        $this->countryTypeRepository = $countryTypeRepository;
    }

    /**
     * yajra table for country types
     * @param mixed $request
     * @return JsonResponse
     */

     public function index($request): JsonResponse
     {
         try {
             $countryTypes = $this->countryTypeRepository->listOfCountryType();
             /**
              * applying search operation
              */
             if ($request->has('search') && $request->search) {
                 $searchTerm = $request->search;
                 $countryTypes->where(function ($countryTypes) use ($searchTerm) {
                     $countryTypes->where('name', 'like', '%' . $searchTerm . '%');
                 });
             }
             return DataTables::of($countryTypes)
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
             Log::error('App\Services\Web\Backend\V1\Dropdown\YachtTypeService::index', ['error' => $e->getMessage()]);
             throw $e;
         }
     }
}
