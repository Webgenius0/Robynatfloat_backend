<?php

namespace App\Repositories\Web\Backend\V1\Dropdown;

use App\Models\Country;

interface CountryTypeRepositoryInterface
{
    /**
     *  list Of country types
     * @return Country
     */
    public function listOfCountryType(): mixed;
}
