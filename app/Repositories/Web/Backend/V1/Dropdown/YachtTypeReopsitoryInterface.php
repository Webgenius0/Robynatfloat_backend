<?php

namespace App\Repositories\Web\Backend\V1\Dropdown;

use App\Models\YachtType;

interface YachtTypeReopsitoryInterface
{
    public function listOfYachtType(): mixed;

    public function createYachtType(array $credential): YachtType;

    public function updateYachtType(array $credential, YachtType $yachtType);
}
