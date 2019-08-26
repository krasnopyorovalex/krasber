<?php

namespace App\Domain\SeoPosition\Queries;

use App\SeoPosition;

/**
 * Class GetSeoPositionByIdQuery
 * @package App\Domain\SeoPosition\Queries
 */
class GetSeoPositionByIdQuery
{
    /**
     * @var int
     */
    private $id;

    /**
     * GetSeoPositionByIdQuery constructor.
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
        return SeoPosition::with(['image', 'seoPositionItems'])->findOrFail($this->id);
    }
}
