<?php

namespace App\Repositories\Web\Backend\V1\Dropdown;

use App\Models\YachtType;

class YachtTypeReopsitory implements YachtTypeReopsitoryInterface
{
    public function listOfYachtType()
    {
        return YachtType::select(['id', 'name', 'slug']);
    }

    public function createYachtType(array $credential) {}

    public function updateYachtType(array $credential, YachtType $yachtType) {}
}
