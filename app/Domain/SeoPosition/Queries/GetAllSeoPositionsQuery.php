<?php

namespace App\Domain\SeoPosition\Queries;

use App\SeoPosition;

/**
 * Class GetAllSeoPositionsQuery
 * @package App\Domain\SeoPosition\Queries
 */
class GetAllSeoPositionsQuery
{
    private static $seoPositions;

    /**
     * Execute the job.
     */
    public function handle()
    {
        if (!self::$seoPositions) {
            self::$seoPositions = SeoPosition::with(['seoPositionItems', 'image'])->orderBy('pos')->get();
        }

        return self::$seoPositions;
    }
}
