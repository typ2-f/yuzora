<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookInformation extends Model
{
  use HasFactory;
  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
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

  //リレーション
  public function book()
  {
    return $this->hasMany(Book::class);
  }
}
