<?php

namespace App\Domain\SeoPositionItem\Queries;

use App\SeoPositionItem;

/**
 * Class GetSeoPositionItemByIdQuery
 * @package App\Domain\SeoPositionItem\Queries
 */
class GetSeoPositionItemByIdQuery
{
    /**
     * @var int
     */
    private $id;

    /**
     * GetSeoPositionItemByIdQuery constructor.
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
        return SeoPositionItem::with(['seoPosition'])->findOrFail($this->id);
    }
}
