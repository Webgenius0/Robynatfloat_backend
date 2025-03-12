<?php

namespace App\Repositories\Web\Backend\V1\Dropdown;

use App\Models\State;

interface StateRepositoryInterface
{
    // Define the methods your repository should implement

    public function listOfState(): mixed;
    public function storeState(array $credentials): mixed;
    public function updateState(array $credentials, State $state);
    public function getallcountry(): mixed;
}
