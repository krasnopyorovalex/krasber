<?php

namespace App\Domain\Portfolio\Queries;

use App\Domain\Portfolio\DTO\AdjoiningResult;
use App\Portfolio;

/**
 * Class GetAdjoiningPortfoliosQuery
 * @package App\Domain\Portfolio\Queries
 */
class GetAdjoiningPortfoliosQuery
{
    /**
     * @return AdjoiningResult
     */
    public function handle()
    {
        return new AdjoiningResult(Portfolio::orderBy('pos','asc')->get());
    }
}