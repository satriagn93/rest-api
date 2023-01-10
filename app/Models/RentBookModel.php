<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentBookModel extends Model
{
    protected $table = 'rent_books';
    protected $guarded = ['id'];

    public function rent_book_detail()
    {
        return $this->hasMany(RentBookDetailModel::class, 'rent_book_id', 'id');
    }
}
