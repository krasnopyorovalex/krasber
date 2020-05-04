<?php

namespace App\Http\ViewComposers;

use App\Domain\Portfolio\Queries\GetAllPortfoliosQuery;
use App\Portfolio;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class PortfolioCategoriesComposer
 * @package App\Http\ViewComposers
 */
class PortfolioComposer
{

    use DispatchesJobs;

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $portfolioObject = new Portfolio();
        $portfolios = $this->dispatch(new GetAllPortfoliosQuery());

        $view->with('portfolioCategories', $portfolioObject->getCategories());
        $view->with('portfolios', $portfolios);
    }
}