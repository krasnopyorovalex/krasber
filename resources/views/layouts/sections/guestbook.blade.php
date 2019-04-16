<section class="guestbook">
    <div class="container">
        <div class="row">
            <div class="col-10">
                <div class="as__h1">Отзывы клиентов</div>

                <div class="owl-carousel owl-theme">

                    @foreach ($guestbook as $guestbookItem)
                    <div class="item">
                        <div class="guestbook__image">
                            <img src="{{ $guestbookItem->image->path }}" alt="{{ $guestbookItem->image->alt }}" title="{{ $guestbookItem->image->title }}">
                        </div>
                        <div class="guestbook__body">
                            <div class="text">
                                {!! $guestbookItem->text !!}
                            </div>
                            <div class="company">
                                {{ $guestbookItem->name }}
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>

    </div>
</section>
