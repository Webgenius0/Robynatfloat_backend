<?php

namespace App\Repositories\Web\Backend\V1\Dropdown;

use App\Models\YachtType;

interface YachtTypeReopsitoryInterface
{
    /**
     *  list Of YachtType
     * @return YachtType
     */
    public function listOfYachtType(): mixed;

    /**
     * create YachtType
     * @param array $credential
     * @return YachtType
     */
    public function createYachtType(array $credential): YachtType;

    /**
     * update Yacht Type
     * @param array $credential
     * @param \App\Models\YachtType $yachtType
     * @return void
     */
    public function updateYachtType(array $credential, YachtType $yachtType);
}
