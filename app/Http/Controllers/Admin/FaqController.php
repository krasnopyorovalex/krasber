<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Faq\Commands\CreateFaqCommand;
use App\Domain\Faq\Commands\DeleteFaqCommand;
use App\Domain\Faq\Commands\UpdateFaqCommand;
use App\Domain\Faq\Queries\GetAllFaqsQuery;
use App\Domain\Faq\Queries\GetFaqByIdQuery;
use App\Http\Controllers\Controller;
use Domain\Faq\Requests\CreateFaqRequest;
use Domain\Faq\Requests\UpdateFaqRequest;

/**
 * Class FaqController
 * @package App\Http\Controllers\Admin
 */
class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = $this->dispatch(new GetAllFaqsQuery());

        return view('admin.faqs.index', [
            'faqs' => $faqs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateFaqRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateFaqRequest $request)
    {
        $this->dispatch(new CreateFaqCommand($request));

        return redirect(route('admin.faqs.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = $this->dispatch(new GetFaqByIdQuery($id));

        return view('admin.faqs.edit', [
            'faq' => $faq
        ]);
    }

    /**
     * @param $id
     * @param UpdateFaqRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, UpdateFaqRequest $request)
    {
        $this->dispatch(new UpdateFaqCommand($id, $request));

        return redirect(route('admin.faqs.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->dispatch(new DeleteFaqCommand($id));

        return redirect(route('admin.faqs.index'));
    }
}
