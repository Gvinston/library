<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Gender
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Customer> $customers
 * @property-read int|null $customers_count
 * @method static \Database\Factories\GenderFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Gender newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gender newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gender query()
 * @method static \Illuminate\Database\Eloquent\Builder|Gender whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gender whereName($value)
 * @mixin \Eloquent
 */
class Gender extends Model
{
    use HasFactory;

    protected $table = 'genders';

    public $timestamps = false;

    public function customers(): HasMany
    {
        return $this->HasMany(Customer::class, 'gender_id', 'id');
    }

}
