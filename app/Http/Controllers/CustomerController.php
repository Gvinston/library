<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Customer;
use App\Models\Gender;
use App\Services\Customer\CustomerService;
use App\Services\Customer\DTO\GetCustomersDTO;
use Artw\Api\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Spatie\DataTransferObject\DataTransferObjectError;

class CustomerController
{

    private CustomerService $customerService;
    private Request $request;

    /**
     * @param CustomerService $customerService
     * @param Request $request
     */
    public function __construct(CustomerService $customerService, Request $request)
    {
        $this->customerService = $customerService;
        $this->request = $request;
    }


    public function getCustomers()
    {
        $getCustomersDTO = GetCustomersDTO::fromRequest($this->request);
        $customers = $this->customerService->getCustomers($getCustomersDTO);

        return view('customer.list', $customers);
    }

    public function show(int $id)
    {
        $customer = $this->customerService->getCustomerById($id);

        return view('customer.detail', $customer);
    }
}
