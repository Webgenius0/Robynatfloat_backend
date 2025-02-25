<?php

namespace App\Repositories\Web\Backend\V1\Dropdown;

use App\Models\YachtType;

interface YachtTypeReopsitoryInterface
{
    public function listOfYachtType();

    public function createYachtType(array $credential);

    public function updateYachtType(array $credential, YachtType $yachtType);
}
