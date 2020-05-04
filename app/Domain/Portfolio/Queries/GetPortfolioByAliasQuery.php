<?php

namespace App\Domain\Portfolio\Queries;

use App\Portfolio;

/**
 * Class GetPortfolioByAliasQuery
 * @package App\Domain\Portfolio\Queries
 */
class GetPortfolioByAliasQuery
{
    /**
     * @var string
     */
    private $alias;

    /**
     * GetPortfolioByAliasQuery constructor.
     * @param string $alias
     */
    public function __construct(string $alias)
    {
        $this->alias = $alias;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return Portfolio::with(['image'])->where('alias', $this->alias)->firstOrFail();
    }
}