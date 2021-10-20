<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books'; //Khai báo tên bảng

    protected $primaryKey = 'id'; //Khai báo khoá chính

    protected $fillable = [
        'book_name', 'slug_book', 'description', 'status', 'category_id', 'image',
    ]; //Những cột cần lấp đầy

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
}
