<?php

namespace App\Services\Customer\Repositories;

use App\Models\Customer;

use App\Services\Customer\DTO\GetCustomersDTO;
use Illuminate\Support\Facades\Auth;

interface CustomerRepositoryInterface
{
    /**
     * @param GetCustomersDTO $getCustomersDTO
     * @return mixed
     */
    public function getList(GetCustomersDTO $getCustomersDTO);

    /**
     * @param int $id
     * @return mixed
     */
    public function getById(int $id);
}
