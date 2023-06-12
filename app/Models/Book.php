<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'storage_id',
        'user_id',
        'book_info_id',
        'status',
        'sold',
        'remarks'
    ];
    protected $attributes = [
        'sold' => false,
    ];


    //リレーション
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function storage()
    {
        return $this->belongsTo(Storage::class);
    }

    public function storageBookLogs()
    {
        return $this->hasMany(StorageBookLog::class);
    }

    public function slip()
    {
        return $this->hasOne(Slip::class);
    }

    public function bookInfo()
    {
        return $this->belongsTo(BookInfo::class);
    }
}
