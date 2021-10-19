<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories'; //Khai báo tên bảng

    protected $primaryKey = 'id'; //Khai báo khoá chính

    public $timestamps = false; //Nếu có update at hoặc create ap thì true

    protected $fillable = [
        'category_name', 'description', 'status'
    ]; //Những cột cần lấp đầy
}
