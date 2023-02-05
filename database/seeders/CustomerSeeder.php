<?php

namespace Database\Seeders;


use App\Models\Author;
use App\Models\Book;
use App\Models\Customer;
use App\Models\Gender;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $male = Gender::factory()
            ->count(1)
            ->state(['name' => 'Мужчина'])
            ->create();

        $feMale = Gender::factory()
            ->count(1)
            ->state(['name' => 'Женщина'])
            ->create();

        Customer::factory()->state(['gender_id' => 1])->has(
            Book::factory()->has(
                Author::factory()->count(1)
            )
                ->count(3)
        )
            ->count(100)
            ->create();

        Customer::factory()->state(['gender_id' => 2])->has(
            Book::factory()->has(
                Author::factory()->count(1)
            )
                ->count(3)
        )
            ->count(100)
            ->create();

    }
}
