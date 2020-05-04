<?php

namespace App\Http\Controllers;

use App\Domain\Portfolio\Queries\GetAdjoiningPortfoliosQuery;
use App\Domain\Portfolio\Queries\GetPortfolioByAliasQuery;

/**
 * Class PortfolioController
 * @package App\Http\Controllers
 */
class PortfolioController extends Controller
{
    /**
     * @param string $alias
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(string $alias)
    {
        $portfolio = $this->dispatch(new GetPortfolioByAliasQuery($alias));
        $adjoiningPortfolios = $this->dispatch(new GetAdjoiningPortfoliosQuery());

        return view('portfolio.index', [
            'portfolio' => $portfolio,
            'next' => $adjoiningPortfolios->nextOrFirst($portfolio),
            'prev' => $adjoiningPortfolios->prevOrLast($portfolio)
        ]);
    }
}