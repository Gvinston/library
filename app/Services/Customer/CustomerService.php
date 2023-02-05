<?php

namespace App\Services\Customer;


use App\Services\Customer\DTO\GetCustomersDTO;
use App\Services\Customer\Formatter\CustomerFormatterInterface;
use App\Services\Customer\Repositories\CustomerRepositoryInterface;


class CustomerService
{
    private CustomerRepositoryInterface $customerRepository;
    private CustomerFormatterInterface $customerFormatter;

    /**
     * @param CustomerRepositoryInterface $customerRepository
     * @param CustomerFormatterInterface $customerFormatter
     */
    public function __construct(
        CustomerRepositoryInterface $customerRepository,
        CustomerFormatterInterface $customerFormatter
    ) {
        $this->customerRepository = $customerRepository;
        $this->customerFormatter = $customerFormatter;
    }

    /**
     * Метод отдает отформатированные данные в виде массива,
     * чтобы у шаблонов не было завяски моделях ларавел
     *
     * @param GetCustomersDTO $getCustomersDTO
     * @return array
     */
    public function getCustomers(GetCustomersDTO $getCustomersDTO): array
    {
        $customers = $this->customerRepository->getList($getCustomersDTO);

        return $this->customerFormatter->formatForGetCustomers($customers);
    }

    /**
     * @param int $id
     * @return array
     */
    public function getCustomerById(int $id): array
    {
        $customer = $this->customerRepository->getById($id);

        return $this->customerFormatter->formatForDetailPage($customer);
    }
}
