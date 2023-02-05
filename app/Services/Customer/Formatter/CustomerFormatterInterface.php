<?php

namespace App\Services\Customer\Formatter;

interface CustomerFormatterInterface
{
    public function formatForGetCustomers($customersCollection): array;

    public function formatForDetailPage($customer): array;
}
