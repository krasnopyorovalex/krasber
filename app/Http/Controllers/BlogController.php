<?php

namespace App\Http\Controllers;

use App\Domain\Article\Queries\GetArticleByAliasQuery;
use App\Domain\Article\Queries\GetAdjoiningArticleQuery;
use App\Domain\Portfolio\Queries\GetOldestPortfoliosQuery;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

/**
 * Class BlogController
 * @package App\Http\Controllers
 */
class BlogController extends Controller
{
    /**
     * @param string $alias
     * @return Factory|View
     */
    public function show(string $alias)
    {
        $article = $this->dispatch(new GetArticleByAliasQuery($alias));
        $adjoiningArticles = $this->dispatch(new GetAdjoiningArticleQuery());

        $latestPortfolios = $this->dispatch(new GetOldestPortfoliosQuery());

        return view('article.index', [
            'article' => $article,
            'next' => $adjoiningArticles->nextOrFirst($article),
            'prev' => $adjoiningArticles->prevOrLast($article),
            'latestPortfolios' => $latestPortfolios
        ]);
    }
}
