<ul class="sitemap">
    @if (count($pages))
        @foreach($pages as $page)
            <li>
                <a href="{{ $page->url }}">{{ $page->name }}</a>
                @if ($page->template == 'page.blog' && count($articles))
                    <ul>
                        @foreach($articles as $article)
                            <li>
                                <a href="{{ route('article.show', ['alias' => $article->alias]) }}">{{ $article->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
                @if ($page->template == 'page.portfolio' && count($portfolios))
                    <ul>
                        @foreach($portfolios as $portfolio)
                            <li>
                                <a href="{{ route('portfolio.show', ['alias' => $portfolio->alias]) }}">{{ $portfolio->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
        @if(count($services))
            <ul>
                @foreach($services as $service)
                    <li>
                        <a href="{{ route('service.show', ['alias' => $service->alias]) }}">{{ $service->name }}</a>
                        @if (count($service->services))
                            <ul>
                                @foreach($service->services as $subService)
                                    <li>
                                        <a href="{{ route('service.show', ['alias' => $subService->alias]) }}">{{ $subService->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif
    @endif
</ul>
