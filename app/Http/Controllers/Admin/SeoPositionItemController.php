<?php

namespace App\Http\Controllers\Admin;

use App\Domain\SeoPositionItem\Queries\GetAllSeoPositionItemsQuery;
use App\Domain\SeoPositionItem\Queries\GetSeoPositionItemByIdQuery;
use App\Domain\SeoPositionItem\Commands\CreateSeoPositionItemCommand;
use App\Domain\SeoPositionItem\Commands\DeleteSeoPositionItemCommand;
use App\Domain\SeoPositionItem\Commands\UpdateSeoPositionItemCommand;
use App\Http\Controllers\Controller;
use App\SeoPosition;
use Domain\SeoPositionItem\Requests\CreateSeoPositionItemRequest;
use Domain\SeoPositionItem\Requests\UpdateSeoPositionItemRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

/**
 * Class SeoPositionItemController
 * @package App\Http\Controllers\Admin
 */
class SeoPositionItemController extends Controller
{
    /**
     * @param SeoPosition $seoPosition
     * @return Factory|View
     */
    public function index(SeoPosition $seoPosition)
    {
        $seoPositionItems = $this->dispatch(new GetAllSeoPositionItemsQuery($seoPosition));

        return view('admin.seo_position_items.index', [
            'seoPositionItems' => $seoPositionItems,
            'seoPosition' => $seoPosition
        ]);
    }

    /**
     * @param SeoPosition $seoPosition
     * @return Factory|View
     */
    public function create(SeoPosition $seoPosition)
    {
        return view('admin.seo_position_items.create', [
            'seoPosition' => $seoPosition
        ]);
    }

    /**
     * @param CreateSeoPositionItemRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(CreateSeoPositionItemRequest $request)
    {
        $this->dispatch(new CreateSeoPositionItemCommand($request));

        return redirect(route('admin.seo_position_items.index', ['seoPosition' => $request->get('seo_position_id')]));
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $seoPositionItem = $this->dispatch(new GetSeoPositionItemByIdQuery($id));

        return view('admin.seo_position_items.edit', [
            'seoPositionItem' => $seoPositionItem
        ]);
    }

    /**
     * @param $id
     * @param UpdateSeoPositionItemRequest $request
     * @return RedirectResponse|Redirector
     */
    public function update($id, UpdateSeoPositionItemRequest $request)
    {
        $this->dispatch(new UpdateSeoPositionItemCommand($id, $request));
        $seoPositionItem = $this->dispatch(new GetSeoPositionItemByIdQuery($id));

        return redirect(route('admin.seo_position_items.index', ['seoPositionItem' => $seoPositionItem->seoPosition->id]));
    }

    /**
     * @param $id
     * @return array|RedirectResponse
     */
    public function destroy($id)
    {
        $this->dispatch(new DeleteSeoPositionItemCommand($id));

        if (request()->ajax()) {
            return [];
        }

        return redirect()->back();
    }
}
