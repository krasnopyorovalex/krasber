<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Banner\Commands\CreateBannerCommand;
use App\Domain\Banner\Commands\DeleteBannerCommand;
use App\Domain\Banner\Commands\UpdateBannerCommand;
use App\Domain\Banner\Queries\GetAllBannersQuery;
use App\Domain\Banner\Queries\GetBannerByIdQuery;
use App\Http\Controllers\Controller;
use Domain\Banner\Requests\CreateBannerRequest;
use Domain\Banner\Requests\UpdateBannerRequest;

/**
 * Class BannerController
 * @package App\Http\Controllers\Admin
 */
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = $this->dispatch(new GetAllBannersQuery());

        return view('admin.banners.index', [
            'banners' => $banners
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateBannerRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateBannerRequest $request)
    {
        $this->dispatch(new CreateBannerCommand($request));

        return redirect(route('admin.banners.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = $this->dispatch(new GetBannerByIdQuery($id));

        return view('admin.banners.edit', [
            'banner' => $banner
        ]);
    }

    /**
     * @param $id
     * @param UpdateBannerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, UpdateBannerRequest $request)
    {
        $this->dispatch(new UpdateBannerCommand($id, $request));

        return redirect(route('admin.banners.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->dispatch(new DeleteBannerCommand($id));

        return redirect(route('admin.banners.index'));
    }
}