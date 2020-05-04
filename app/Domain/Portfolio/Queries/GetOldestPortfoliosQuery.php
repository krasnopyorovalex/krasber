<?php

declare(strict_types=1);

namespace App\Domain\Portfolio\Queries;

use App\Portfolio;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class GetAllPortfoliosQuery
 * @package App\Domain\Portfolio\Queries
 */
class GetOldestPortfoliosQuery
{
    /**
     * @var int
     */
    private $limit;

    /**
     * GetOldestPortfoliosQuery constructor.
     * @param int $limit
     */
    public function __construct(int $limit = 3)
    {
        $this->limit = $limit;
    }

    /**
     * @return Builder[]|Collection
     */
    public function handle()
    {
        return Portfolio::with(['image'])
            ->oldest('pos')
            ->limit($this->limit)
            ->get();
    }
}
