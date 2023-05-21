<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsbnBook extends Model
{
    use HasFactory;
    protected $fillable = [
        'isbn',
        'title',
        'img',
        'price',
        'publisher',
        'contributor',
        'publishing_date',
        'form'
    ];
}
