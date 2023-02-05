<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Customer
 *
 * @property int $id
 * @property string|null $customer_name
 * @property int $gender_id
 * @property string $birth_date
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Book> $books
 * @property-read int|null $books_count
 * @property-read \App\Models\Gender|null $gender
 * @method static \Database\Factories\CustomerFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCustomerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereGenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereId($value)
 * @mixin \Eloquent
 */
class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';


    public $timestamps = false;


    public function gender(): HasOne
    {
        return $this->hasOne(Gender::class, 'id', 'gender_id');
    }

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'book_customer', 'customer_id', 'book_id');
    }
}
