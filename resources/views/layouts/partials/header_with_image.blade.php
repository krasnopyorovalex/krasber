<section class="header">
    <div class="bg__box"></div>
    <div class="container">
        <div class="row">
            <div class="body col-10 green">
                <div class="row">
                    <div class="col-7">
                        <div class="text">
                            <h1>{{ $page->name }}</h1>
                            <p>{!! $page->slogan !!}</p>
                        </div>
                    </div>
                    <div class="col-5 hidden__xs">
                        <figure>
                            <img src="{{ asset($page->image->path) }}" alt="{{ $page->image->alt }}" title="{{ $page->image->title }}">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-10">
                <ul itemscope="" itemtype="http://schema.org/BreadcrumbList">
                    <li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                        <a href="{{ route('page.show') }}">Главная</a>
                        <meta itemprop="position" content="1">
                    </li>
                    <li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                        {{ $page->name }}
                        <meta itemprop="position" content="2">
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>