<?php

namespace App\Repositories\Web\Backend\V1\Dropdown;

use App\Helpers\Helper;
use App\Models\YachtType;
use Exception;
use Illuminate\Support\Facades\Log;

class YachtTypeReopsitory implements YachtTypeReopsitoryInterface
{
    /**
     *  list Of YachtType
     * @return YachtType
     */
    public function listOfYachtType(): mixed
    {
        try {
            return YachtType::select(['id', 'name', 'slug']);
        } catch (Exception $e) {
            Log::error('App\Repositories\Web\Backend\V1\Dropdown\YachtTypeReopsitory::listOfYachtType', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    /**
     * create YachtType
     * @param array $credential
     * @return YachtType
     */
    public function createYachtType(array $credential): YachtType
    {
        try {
            return YachtType::create([
                'name' => $credential['name'],
                'slug' => Helper::generateUniqueSlug($credential['name'], 'yacht_types'),
            ]);
        } catch (Exception $e) {
            Log::error('App\Repositories\Web\Backend\V1\Dropdown\YachtTypeReopsitory::createYachtType', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    /**
     * update Yacht Type
     * @param array $credential
     * @param \App\Models\YachtType $yachtType
     * @return void
     */
    public function updateYachtType(array $credential, YachtType $yachtType) {
        try {
            if ($credential['name'] != $yachtType->name) {
                $yachtType->slug = Helper::generateUniqueSlug($credential['name'], 'yacht_types');
            }
            $yachtType->name = $credential['name'];

            $yachtType->save();

        } catch (Exception $e) {
            Log::error('App\Repositories\Web\Backend\V1\Dropdown\YachtTypeReopsitory::updateYachtType', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
