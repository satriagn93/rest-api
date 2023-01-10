<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentBookDetailModel extends Model
{
    protected $table = 'rent_book_details';
    protected $guarded = ['id'];

    function rent_book_header()
    {
        return $this->belongsTo(RentBookModel::class, 'rent_book_id', 'id');
    }
}
