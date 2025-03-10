<?php

namespace App\Repositories\Web\Backend\V1\Dropdown;

use App\Helpers\Helper;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Exception;
use Illuminate\Support\Facades\Log;

class CityRepository implements CityRepositoryInterface
{
  //Called city type repository
  public function listOfCity():mixed
  {
     try {
      return City::select('id','name','slug')->latest();
  } catch (Exception $e) {
      Log::error('App\Repositories\Web\Backend\V1\Dropdown\CityRepository::listOfCity', ['error' => $e->getMessage()]);
      throw $e;
  }
  }


  /**
     * create City
     * @param array $credential
     * @return City
     */
    public function createCity(array $credential): City
    {
        try {
            return City::create([
                'name' => $credential['name'],
                'country_id' => $credential['country_id'],
                'state_id' => $credential['state_id'],
                'slug' => Helper::generateUniqueSlug($credential['name'], 'cities'),
            ]);
        } catch (Exception $e) {
            Log::error('App\Repositories\Web\Backend\V1\Dropdown\CountryRepository::cityRepository', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    //get the all country
    public function countrys()
    {
        try {
            return Country::all();
        } catch (Exception $e) {
            Log::error('App\Repositories\Web\Backend\V1\Dropdown\CityRepository::country', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    //get the all state
    public function states()
    {
        try {
            return State::all();
        } catch (Exception $e) {
            Log::error('App\Repositories\Web\Backend\V1\Dropdown\CityRepository::state', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    public function updateCity(array $credential, City $city){
        try {
            //update country state and city
            $city->name = $credential['name'];
            $city->country_id = $credential['country_id'];
            $city->state_id = $credential['state_id'];
            $city->slug = Helper::generateUniqueSlug($credential['name'], 'cities');
            $city->update();
            return $city;

        } catch (Exception $e) {
            Log::error('App\Repositories\Web\Backend\V1\Dropdown\CityRepository::updateCity', ['error' => $e->getMessage()]);
            throw $e;
        }
    }



}
