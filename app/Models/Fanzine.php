<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fanzine extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'img',
        'price',
        'publisher',
        'contributor',
        'publishing_date',
        'form'
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
