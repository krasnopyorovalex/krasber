<?php

namespace App\Http\Controllers\Admin;

use App\Domain\SeoBlock\Commands\CreateSeoBlockCommand;
use App\Domain\SeoBlock\Commands\DeleteSeoBlockCommand;
use App\Domain\SeoBlock\Commands\UpdateSeoBlockCommand;
use App\Domain\SeoBlock\Queries\GetAllSeoBlocksQuery;
use App\Domain\SeoBlock\Queries\GetSeoBlockByIdQuery;
use App\Http\Controllers\Controller;
use Domain\SeoBlock\Requests\CreateSeoBlockRequest;
use Domain\SeoBlock\Requests\UpdateSeoBlocksRequest;

/**
 * Class SeoBlockController
 * @package App\Http\Controllers\Admin
 */
class SeoBlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seoBlocks = $this->dispatch(new GetAllSeoBlocksQuery());

        return view('admin.seo_blocks.index', [
            'seoBlocks' => $seoBlocks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.seo_blocks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateSeoBlockRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateSeoBlockRequest $request)
    {
        $this->dispatch(new CreateSeoBlockCommand($request));

        return redirect(route('admin.seo_blocks.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seoBlock = $this->dispatch(new GetSeoBlockByIdQuery($id));

        return view('admin.seo_blocks.edit', [
            'seoBlock' => $seoBlock
        ]);
    }

    /**
     * @param $id
     * @param UpdateSeoBlocksRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, UpdateSeoBlocksRequest $request)
    {
        $this->dispatch(new UpdateSeoBlockCommand($id, $request));

        return redirect(route('admin.seo_blocks.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->dispatch(new DeleteSeoBlockCommand($id));

        return redirect(route('admin.seo_blocks.index'));
    }
}
