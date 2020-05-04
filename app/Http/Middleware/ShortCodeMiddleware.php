<?php

namespace App\Http\Middleware;

use App\Domain\Article\Queries\GetAllArticlesQuery;
use App\Domain\Page\Queries\GetAllPagesQuery;
use App\Domain\Portfolio\Queries\GetAllPortfoliosQuery;
use App\Domain\Service\Queries\GetAllServicesQuery;
use Closure;
use Illuminate\Http\Response;
use Illuminate\Foundation\Bus\DispatchesJobs;

class ShortCodeMiddleware
{
    use DispatchesJobs;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /** @var $response Response */
        $response = $next($request);

        if ( ! method_exists($response, 'content')) {
            return $response;
        }

        $content = preg_replace_callback_array(
            [
                '#(<p(.*)>)?{form}(<\/p>)?#' => static function () {
                    return view('layouts.shortcodes.form_order');
                },
                '#(<p(.*)>)?{tariffs}(<\/p>)?#' => static function () {
                    return view('layouts.shortcodes.tariffs');
                },
                '#(<p(.*)>)?{sitemap}(<\/p>)?#' => function () {
                    $pages = $this->dispatch(new GetAllPagesQuery(true));
                    $services = $this->dispatch(new GetAllServicesQuery());
                    $articles = $this->dispatch(new GetAllArticlesQuery(true));
                    $portfolios = $this->dispatch(new GetAllPortfoliosQuery());

                    return view('layouts.shortcodes.sitemap', [
                        'pages' => $pages,
                        'services' => $services,
                        'articles' => $articles,
                        'portfolios' => $portfolios
                    ]);
                }
            ],
            $response->content()
        );

        $response->setContent($content);

        return $response;
    }
}
