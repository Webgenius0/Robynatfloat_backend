<?php

namespace App\Services\Web\Backend\V1\Dropdown;

use App\Models\YachtType;
use App\Repositories\Web\Backend\V1\Dropdown\YachtTypeReopsitoryInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class YachtTypeService
{
    protected YachtTypeReopsitoryInterface $yachtTypeReopsitory;

    /**
     * construct
     * @param \App\Repositories\Web\Backend\V1\Dropdown\YachtTypeReopsitoryInterface $yachtTypeReopsitory
     */
    public function __construct(YachtTypeReopsitoryInterface $yachtTypeReopsitory)
    {
        $this->yachtTypeReopsitory = $yachtTypeReopsitory;
    }


    /**
     * yajra table for yacht types
     * @param mixed $request
     * @return JsonResponse
     */
    public function index($request): JsonResponse
    {
        try {
            $yachtTypes = $this->yachtTypeReopsitory->listOfYachtType();
            /**
             * applying search operation
             */
            if ($request->has('search') && $request->search) {
                $searchTerm = $request->search;
                $yachtTypes->where(function ($yachtTypes) use ($searchTerm) {
                    $yachtTypes->where('name', 'like', '%' . $searchTerm . '%');
                });
            }
            return DataTables::of($yachtTypes)
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
                                        <button type="button" class="btn btn-secondary-soft mb-2" onclick="editModal(\'' . $data->slug . '\')">Secondary</button>
                                        <button type="button" class="btn btn-danger-soft mb-2">Danger</button>
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

    /**
     * storing Yacht type
     * @param array $credentials
     * @return YachtType
     */
    public function store(array $credentials): YachtType
    {
        try {
            return $this->yachtTypeReopsitory->createYachtType($credentials);
        } catch (Exception $e) {
            Log::error('App\Services\Web\Backend\V1\Dropdown\YachtTypeService::store', ['error' => $e->getMessage()]);
            throw $e;
        }
    }


    public function showModelToEdit(YachtType $yachtType)
    {
        try {
            return ['html' => view('backend.layouts.dropdown.yacht_type.components.update', compact('yachtType'))->render()];
        } catch (Exception $e) {
            Log::error('App\Services\Web\Backend\V1\Dropdown\YachtTypeService::showModelToEdit', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    public function update(array $credentials, YachtType $yachtType)
    {
        try {
        } catch (Exception $e) {
            Log::error('App\Services\Web\Backend\V1\Dropdown\YachtTypeService::update', ['error' => $e->getMessage()]);
            throw $e;
        }
    }


    public function delete(YachtType $yachtType)
    {
        try {
        } catch (Exception $e) {
            Log::error('App\Services\Web\Backend\V1\Dropdown\YachtTypeService::delete', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
