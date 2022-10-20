<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookDetail extends Model
{
    use HasFactory;
    protected $fillable = ['book_id','strage_id','supplier_id'];
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function strage()
    {
        return $this->belongsTo(Strage::class);
    }
    public function bookStatusLogs()
    {
        return $this->hasMany(BookStatusLog::class);
    }
}
