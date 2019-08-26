<?php

namespace App\Domain\SeoPositionItem\Commands;

use App\Domain\SeoPositionItem\Queries\GetSeoPositionItemByIdQuery;
use App\Http\Requests\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UpdateSeoPositionItemCommand
 * @package App\Domain\SeoPositionItem\Commands
 */
class UpdateSeoPositionItemCommand
{

    use DispatchesJobs;

    private $request;
    private $id;

    /**
     * UpdateSeoPositionItemCommand constructor.
     * @param int $id
     * @param Request $request
     */
    public function __construct(int $id, Request $request)
    {
        $this->id = $id;
        $this->request = $request;
    }

    /**
     * @return bool
     */
    public function handle(): bool
    {
        $seoPositionItem = $this->dispatch(new GetSeoPositionItemByIdQuery($this->id));

        return $seoPositionItem->update($this->request->all());
    }
}
