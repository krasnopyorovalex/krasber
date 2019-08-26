<?php

namespace App\Domain\SeoPositionItem\Commands;

use App\Http\Requests\Request;
use App\SeoPositionItem;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class CreateSeoPositionItemCommand
 * @package App\Domain\SeoPositionItem\Commands
 */
class CreateSeoPositionItemCommand
{
    use DispatchesJobs;

    private $request;

    /**
     * CreateSeoPositionItemCommand constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return bool
     */
    public function handle(): bool
    {
        $seoPositionItem = new SeoPositionItem();
        $seoPositionItem->fill($this->request->all());

        return $seoPositionItem->save();
    }
}
