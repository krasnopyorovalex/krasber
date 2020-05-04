<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class PortfolioCategoriesServiceProvider
 * @package App\Providers
 */
class PortfolioServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('view')->composer(['page.portfolio', 'page.index'], 'App\Http\ViewComposers\PortfolioComposer');
    }
}
