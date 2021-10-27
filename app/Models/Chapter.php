<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $table = 'chapters'; //Khai báo tên bảng

    protected $primaryKey = 'id'; //Khai báo khoá chính

    protected $fillable = [
        'chapter_title', 'slug_chapter', 'status', 'book_id', 'content',
    ]; //Những cột cần lấp đầy

    protected $attributes = [
        'description' => 'Tóm tắt sẽ được cập nhật sau.',
        'view' => 0,
    ];

    public function book()
    {
        return $this->belongsTo('App\Models\Book', 'book_id');
    }
}
