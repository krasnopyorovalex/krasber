<?php

namespace App\Domain\SeoPositionItem\Commands;

use App\Domain\SeoPositionItem\Queries\GetSeoPositionItemByIdQuery;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class DeleteSeoPositionItemCommand
 * @package App\Domain\SeoPositionItem\Commands
 */
class DeleteSeoPositionItemCommand
{

    use DispatchesJobs;

    /**
     * @var int
     */
    private $id;

    /**
     * DeleteSeoPositionItemCommand constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle(): bool
    {
        $seoPositionItem = $this->dispatch(new GetSeoPositionItemByIdQuery($this->id));

        return $seoPositionItem->delete();
    }

}
