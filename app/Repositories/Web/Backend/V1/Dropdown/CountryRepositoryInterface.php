<?php

namespace App\Repositories\Web\Backend\V1\Dropdown;

use App\Models\Country;

interface CountryRepositoryInterface
{
    /**
     *  list Of country types
     * @return Country
     */
    public function listOfCountry(): mixed;

    /**
     * create Country
     * @param array $credential
     * @return Country
     */
    public function createCountry(array $credential): Country;

    public function updateCountry(array $credential, Country $country);
}
