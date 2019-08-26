<?php

namespace App\Domain\SeoPositionItem\Queries;

use App\SeoPosition;
use App\SeoPositionItem;

/**
 * Class GetAllSeoPositionItemsQuery
 * @package App\Domain\SeoPositionItem\Queries
 */
class GetAllSeoPositionItemsQuery
{
    private $seoPosition;

    /**
     * GetAllSeoPositionItemsQuery constructor.
     * @param SeoPosition $seoPosition
     */
    public function __construct(SeoPosition $seoPosition)
    {
        $this->seoPosition = $seoPosition;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return SeoPositionItem::whereSeoPositionId($this->seoPosition->id)
            ->with(['seoPosition'])
            ->orderBy('pos', 'asc')
            ->get();
    }
}
