<?php

namespace App\Services\Customer\Formatter;

use App\Models\Book;
use App\Models\Customer;

class CustomerFormatter implements CustomerFormatterInterface
{
    public function formatForGetCustomers($customersCollection): array
    {
        $resFormatted = [
            'customers' => []
        ];

        /**
         * @var  Customer $customer
         *
         */
        foreach ($customersCollection as $customer) {
            $resFormatted['customers'][] = [
                'id' => $customer->id,
                'name' => $customer->customer_name,
                'gender' => $customer->gender->name,
                'url' =>  route('customerDetail', $customer->id),
            ];
        }

        return $resFormatted;
    }

    public function formatForDetailPage($customer): array
    {
        $books = [];
        $customerFormatted = [
            'customer' => [
                'name' => $customer->customer_name,
                'gender' => $customer->gender->name,
                'books' => []
            ]
        ];

        if ($customer->books->count() > 0) {
            /**
             * @var  Book $book
             *
             */
            foreach ($customer->books as $book) {
                $authors = array_map(fn($item) => $item['author_name'], $book->authors->toArray());
                $books[] = [
                    'name' => $book->book_title,
                    'authors' => implode(', ', $authors)
                ];
            }
        }

        $customerFormatted['customer']['books'] = $books;

        return $customerFormatted;
    }
}
