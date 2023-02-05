<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\Book
 *
 * @property int $id
 * @property string|null $book_title
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Author> $authors
 * @property-read int|null $authors_count
 * @method static \Database\Factories\BookFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Book newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Book newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Book query()
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereBookTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereId($value)
 * @mixin \Eloquent
 */
class Book extends Model
{
    use HasFactory;

    protected $table = 'books';


    public $timestamps = false;

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class, 'book_author', 'book_id', 'author_id');
    }
}
