<?php

namespace App\Services\Customer\Repositories;

use App\Models\Customer;

use App\Services\Customer\DTO\GetCustomersDTO;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerRepository implements CustomerRepositoryInterface
{
    private Customer $customer;

    /**
     * @param Customer $customer
     */
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    /**
     * Метод получает список отлфильтрованных пользователей книг
     *
     * @param GetCustomersDTO $getCustomersDTO
     * @return Customer[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getList(GetCustomersDTO $getCustomersDTO)
    {
        $query = $this->customer::query();
        $query->select('*');
        $query->with('books.authors');

        if (!empty($getCustomersDTO->customer_ids)) {
            $query->whereIn('id', $getCustomersDTO->customer_ids);
        }

        if (!empty($getCustomersDTO->author)) {
            $author = $getCustomersDTO->author;
            $query->whereHas('books.authors', function ($query) use ($author) {
                return $query->where('author_name', $author);
            });
        }

        if (!empty($getCustomersDTO->years)) {
            $query->selectRaw('(YEAR(CURRENT_DATE) - YEAR(`birth_date`)) - (RIGHT(CURRENT_DATE,5) < RIGHT(`birth_date`,5)) as age');
            /**
             * Почему-то having по массиву не отфильтровал, пришлось сделат так
             */

            foreach ($getCustomersDTO->years as $year) {
                $query->orHaving('age', '=', $year);
            }
        }

        return $query->get();
    }

    public function getById(int $id)
    {
        return $this->customer::with('books.authors')->find($id);
    }
}
