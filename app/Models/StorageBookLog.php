<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageBookLog extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'book_id',
        'storage_id',
        'date',
    ];

    public function storage()
    {
        return $this->belongsTo(Storage::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
