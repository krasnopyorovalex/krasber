<?php

namespace App\Domain\Portfolio\Queries;

use App\Portfolio;

/**
 * Class GetAllPortfoliosQuery
 * @package App\Domain\Portfolio\Queries
 */
class GetAllPortfoliosQuery
{
    /**
     * @var bool
     */
    private $isPublished;

    /**
     * GetAllPortfoliosQuery constructor.
     * @param bool $isPublished
     */
    public function __construct($isPublished = false)
    {
        $this->isPublished = $isPublished;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $portfolios = new Portfolio();

        if ($this->isPublished) {
            $portfolios->where('is_published', '1');
        }

        return $portfolios->with(['image'])->orderBy('pos', 'asc')->get();
    }
}