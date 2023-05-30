<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slip extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'book_id',
        'lowest_price',
        'purchase_date',
        'purchase_price',
        'selling_date',
        'selling_price'
    ];

    public function book()
    {
        return $this->hasOne(Book::class);
    }
}
