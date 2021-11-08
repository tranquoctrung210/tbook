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
        'book_name', 'slug_book', 'description', 'status', 'image',
        // , 'category_id'
    ]; //Những cột cần lấp đầy

    protected $attributes = [
        'author' => 'Updating',
        'view' => 0
    ]; 

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'books_categories');
    }

    public function chapters()
    {
        return $this->hasMany('App\Models\Chapter');
    }
}
