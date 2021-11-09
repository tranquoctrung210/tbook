<div class="container mb-3">
    <h3>TRUYỆN NHIỀU LƯỢT XEM</h3>
    <div class="owl-carousel owl-theme">
        @php
            $length = count($books) < 10 ? count($books) : 10;
        @endphp

        @for ($i = 0; $i < $length; $i++)
            <div class="item" style="position: relative;">
                <a href="{{ route('book_detail', ['slug' => $books[$i]->slug_book, 'id' => $books[$i]->id]) }}" style="all: unset;">
                    <img src=" {{ asset('uploads/books/imgs/' . $books[$i]->image) }}" height="342px" width="250px">
                    <div class="slide-captions" style="
                position: absolute;
                bottom: 0;
                background-color: black;
                color: yellowgreen;
                width: 100%;
            ">
                        <style>
                            div.item h5.slide-title-truncate {
                                display: -webkit-box !important;
                                -webkit-line-clamp: 2;
                                -webkit-box-orient: vertical;
                                white-space: normal;
                            }

                        </style>
                        <h5 class="text-truncate slide-title-truncate mb-0" style="height: 42px;">
                            {{ $books[$i]->book_name }}</h5>
                        <p class="mb-0"><i class="fas fa-eye"></i>{{ $books[$i]->view }}</p>
                </a>
            </div>
    </div>
    @endfor

</div>
</div>
