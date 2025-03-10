<?php

namespace App\Repositories\Web\Backend\V1\Dropdown;

use App\Models\City;

interface CityRepositoryInterface
{
    /**
     *  list Of country types
     * @return City
     */
    public function listOfCity(): mixed;


     /**
     * create city
     * @param array $credential
     * @return City
     */
    public function createCity(array $credential): City;
    public function countrys();
    public function states();
}
