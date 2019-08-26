<?php

namespace App\Http\Controllers\Admin;

use App\Domain\SeoPosition\Commands\CreateSeoPositionCommand;
use App\Domain\SeoPosition\Commands\DeleteSeoPositionCommand;
use App\Domain\SeoPosition\Commands\UpdateSeoPositionCommand;
use App\Domain\SeoPosition\Queries\GetAllSeoPositionsQuery;
use App\Domain\SeoPosition\Queries\GetSeoPositionByIdQuery;
use App\Domain\SeoPosition\Queries\UpdatePositionSeoPositionQuery;
use App\Http\Controllers\Controller;
use Domain\SeoPosition\Requests\CreateSeoPositionRequest;
use Domain\SeoPosition\Requests\UpdateSeoPositionRequest;
use Domain\SeoPosition\Requests\UpdatePositionSeoPositionRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

/**
 * Class SeoPositionController
 * @package App\Http\Controllers\Admin
 */
class SeoPositionController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        $seoPositions = $this->dispatch(new GetAllseoPositionsQuery);

        return view('admin.seo_positions.index', [
            'seoPositions' => $seoPositions
        ]);
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        return view('admin.seo_positions.create');
    }

    /**
     * @param CreateSeoPositionRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(CreateSeoPositionRequest $request)
    {
        $this->dispatch(new CreateSeoPositionCommand($request));

        return redirect(route('admin.seo_positions.index'));
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $seoPosition = $this->dispatch(new GetSeoPositionByIdQuery($id));

        return view('admin.seo_positions.edit', [
            'seoPosition' => $seoPosition
        ]);
    }

    /**
     * @param $id
     * @param UpdateSeoPositionRequest $request
     * @return RedirectResponse|Redirector
     */
    public function update($id, UpdateSeoPositionRequest $request)
    {
        $this->dispatch(new UpdateSeoPositionCommand($id, $request));

        return redirect(route('admin.seo_positions.index'));
    }

    /**
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        $this->dispatch(new DeleteSeoPositionCommand($id));

        return redirect(route('admin.seo_positions.index'));
    }

    /**
     * @param UpdatePositionSeoPositionRequest $request
     * @return array
     */
    public function positions(UpdatePositionSeoPositionRequest $request): array
    {
        $this->dispatch(new UpdatePositionSeoPositionQuery($request->post('data')));

        return ['message' => 'Позиции обновлены'];
    }
}
