<?php

namespace App\Http\Controllers;

use App\Domain\Article\Queries\GetAllArticlesQuery;
use App\Domain\Page\Queries\GetAllPagesQuery;
use App\Domain\Portfolio\Queries\GetAllPortfoliosQuery;
use App\Domain\Service\Queries\GetAllServicesQuery;
use Illuminate\Http\Response;

/**
 * Class SitemapController
 * @package App\Http\Controllers
 */
class SitemapController extends Controller
{
    /**
     * @return Response
     */
    public function xml(): Response
    {
        $pages = $this->dispatch(new GetAllPagesQuery(true));
        $services = $this->dispatch(new GetAllServicesQuery());
        $articles = $this->dispatch(new GetAllArticlesQuery(true));
        $portfolios = $this->dispatch(new GetAllPortfoliosQuery());

        return response()
            ->view('sitemap.index', [
                'pages' => $pages,
                'articles' => $articles,
                'services' => $services,
                'portfolios' => $portfolios
            ])
            ->header('Content-Type', 'text/xml');
    }
}
