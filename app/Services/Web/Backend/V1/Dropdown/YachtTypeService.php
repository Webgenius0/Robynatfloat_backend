<?php

namespace App\Services\Web\Backend\V1\Dropdown;

use App\Models\YachtType;
use App\Repositories\Web\Backend\V1\Dropdown\YachtTypeReopsitoryInterface;
use Exception;
use Illuminate\Support\Facades\Log;

class YachtTypeService
{
    protected YachtTypeReopsitoryInterface $yachtTypeReopsitory;

    public function __construct(YachtTypeReopsitoryInterface $yachtTypeReopsitory)
    {
        $this->yachtTypeReopsitory = $yachtTypeReopsitory;
    }


    public function index()
    {
        try {

        }catch (Exception $e) {
            Log::error('App\Services\Web\Backend\V1\Dropdown\YachtTypeService::index', ['error' => $e->getMessage()]);
            throw $e;
        }
    }


    public function create(array $credentials)
    {
        try {

        }catch (Exception $e) {
            Log::error('App\Services\Web\Backend\V1\Dropdown\YachtTypeService::create', ['error' => $e->getMessage()]);
            throw $e;
        }
    }


    public function showModelToEdit(YachtType $yachtType)
    {
        try {

        }catch (Exception $e) {
            Log::error('App\Services\Web\Backend\V1\Dropdown\YachtTypeService::showModelToEdit', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    public function update(array $credentials, YachtType $yachtType)
    {
        try {

        }catch (Exception $e) {
            Log::error('App\Services\Web\Backend\V1\Dropdown\YachtTypeService::update', ['error' => $e->getMessage()]);
            throw $e;
        }
    }


    public function delete(YachtType $yachtType)
    {
        try {

        }catch (Exception $e) {
            Log::error('App\Services\Web\Backend\V1\Dropdown\YachtTypeService::delete', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

}
