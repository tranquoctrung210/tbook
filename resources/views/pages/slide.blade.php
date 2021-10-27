<div class="container">
    <h3>TRUYỆN NHIỀU LƯỢT XEM</h3>
    <div class="owl-carousel owl-theme">
        @php
            $length = count($books) < 10 ? count($books) : 10 
        @endphp
        @for ($i = 0; $i < $length; $i++)
            <div class="item">
                <img src=" {{ asset('uploads/books/imgs/'. $books[$i]->image) }}" height="342px" width="250px">
                <h5 class="text-truncate">{{ $books[$i]->book_name }}</h5>
                <p><i class="fas fa-eye"></i>{{ $books[$i]->view }}</p>
            </div>
        @endfor

    </div>
</div>
