<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
     // Các thuộc tính có thể gán dữ liệu hàng loạt
     protected $fillable = [
        'title',
        'description',
        'discount_amount',
        'start_date',
        'end_date',
    ];

    // Các thuộc tính không được gán dữ liệu hàng loạt
    protected $guarded = [];
}
