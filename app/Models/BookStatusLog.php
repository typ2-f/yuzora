<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookStatusLog extends Model
{
    use HasFactory;
    public function bookDetail()
    {
        return $this->belongsTo(BookDetail::class);
    }
    public function strage()
    {
        return $this->belongsTo(Strage::class);
    }
}
