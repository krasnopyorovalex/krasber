<?php

namespace App\Http\Controllers\Admin;

use App\Domain\AboutCount\Commands\CreateAboutCountCommand;
use App\Domain\AboutCount\Commands\DeleteAboutCountCommand;
use App\Domain\AboutCount\Commands\UpdateAboutCountCommand;
use App\Domain\AboutCount\Queries\GetAboutCountByIdQuery;
use App\Domain\AboutCount\Queries\GetAllAboutCountsQuery;
use App\Http\Controllers\Controller;
use Domain\AboutCount\Requests\CreateAboutCountRequest;
use Domain\AboutCount\Requests\UpdateAboutCountRequest;

/**
 * Class AboutCountController
 * @package App\Http\Controllers\Admin
 */
class AboutCountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutCounts = $this->dispatch(new GetAllAboutCountsQuery());

        return view('admin.about_counts.index', [
            'aboutCounts' => $aboutCounts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about_counts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateAboutCountRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateAboutCountRequest $request)
    {
        $this->dispatch(new CreateAboutCountCommand($request));

        return redirect(route('admin.about_counts.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aboutCount = $this->dispatch(new GetAboutCountByIdQuery($id));

        return view('admin.about_counts.edit', [
            'aboutCount' => $aboutCount
        ]);
    }

    /**
     * @param $id
     * @param UpdateAboutCountRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, UpdateAboutCountRequest $request)
    {
        $this->dispatch(new UpdateAboutCountCommand($id, $request));

        return redirect(route('admin.about_counts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->dispatch(new DeleteAboutCountCommand($id));

        return redirect(route('admin.about_counts.index'));
    }
}
