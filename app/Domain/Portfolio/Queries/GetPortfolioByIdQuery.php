<?php

namespace App\Domain\Portfolio\Queries;

use App\Portfolio;

/**
 * Class GetPortfolioByIdQuery
 * @package App\Domain\Portfolio\Queries
 */
class GetPortfolioByIdQuery
{
    /**
     * @var int
     */
    private $id;

    /**
     * GetPortfolioByIdQuery constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return Portfolio::with(['image'])->findOrFail($this->id);
    }
}