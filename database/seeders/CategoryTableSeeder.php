<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['Action', 'action', 'Thể loại này thường có nội dung về đánh nhau, bạo lực, hỗn loạn, với diễn biến nhanh', 0],
            ['Adventure', 'adventure', 'Thể loại phiêu lưu, mạo hiểm, thường là hành trình của các nhân vật', 0],
            ['Drama', 'drama', 'Thể loại mang đến cho người xem những cảm xúc khác nhau: buồn bã, căng thẳng thậm chí là bi phẫn', 0],
            ['Ecchi', 'ecchi', 'Thường có những tình huống nhạy cảm nhằm lôi cuốn người xem', 0],
            ['Manhwa', 'manhwa', 'Truyện tranh Hàn Quốc, đọc từ trái sang phải', 0],
            ['Romance', 'romance', 'Thường là những câu chuyện về tình yêu, tình cảm lãng mạn. Ớ đây chúng ta sẽ lấy ví dụ như tình yêu giữa một người con trai và con gái, bên cạnh đó đặc điểm thể loại này là kích thích trí tưởng tượng của bạn về tình yêu', 0],
            ['Harem', 'harem', 'Thể loại truyện tình cảm, lãng mạn mà trong đó, nhiều nhân vật nữ thích một nam nhân vật chính', 0],
            ['Mecha', 'mecha', 'Mecha, còn được biết đến dưới cái tên meka hay mechs, là thể loại nói tới những cỗ máy biết đi (thường là do phi công cầm lái)', 0],
            ['Fantasy', 'fantasy', 'Thể loại xuất phát từ trí tưởng tượng phong phú, từ pháp thuật đến thế giới trong mơ thậm chí là những câu chuyện thần tiên', 0],

        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'category_name' => $category[0],
                'slug_category' => $category[1],
                'description' => $category[2],
                'status' => $category[3]
            ]);
        }
    }
}
