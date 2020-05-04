<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Information\Commands\CreateInformationCommand;
use App\Domain\Information\Commands\DeleteInformationCommand;
use App\Domain\Information\Commands\UpdateInformationCommand;
use App\Domain\Information\Queries\GetAllInformationsQuery;
use App\Domain\Information\Queries\GetInformationByIdQuery;
use App\Http\Controllers\Controller;
use Domain\Information\Requests\CreateInformationRequest;
use Domain\Information\Requests\UpdateInformationRequest;

/**
 * Class InformationController
 * @package App\Http\Controllers\Admin
 */
class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = $this->dispatch(new GetAllInformationsQuery());

        return view('admin.informations.index', [
            'articles' => $articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.informations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateInformationRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateInformationRequest $request)
    {
        $this->dispatch(new CreateInformationCommand($request));

        return redirect(route('admin.informations.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $information = $this->dispatch(new GetInformationByIdQuery($id));

        return view('admin.informations.edit', [
            'information' => $information
        ]);
    }

    /**
     * @param $id
     * @param UpdateInformationRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, UpdateInformationRequest $request)
    {
        $this->dispatch(new UpdateInformationCommand($id, $request));

        return redirect(route('admin.informations.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->dispatch(new DeleteInformationCommand($id));

        return redirect(route('admin.informations.index'));
    }
}
