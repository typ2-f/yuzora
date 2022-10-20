<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strage extends Model
{
    use HasFactory;
        public function bookStatusLogs()
    {
        return $this->hasMany(BookStatusLog::class);
    }
        public function bookDetails()
    {
        return $this->hasMany(BookStatusLog::class);
    }
}
