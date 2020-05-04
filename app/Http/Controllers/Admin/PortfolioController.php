<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Portfolio\Commands\CreatePortfolioCommand;
use App\Domain\Portfolio\Commands\DeletePortfolioCommand;
use App\Domain\Portfolio\Commands\UpdatePortfolioCommand;
use App\Domain\Portfolio\Queries\GetAllPortfoliosQuery;
use App\Domain\Portfolio\Queries\GetPortfolioByIdQuery;
use App\Http\Controllers\Controller;
use App\Portfolio;
use Domain\Portfolio\Requests\CreatePortfolioRequest;
use Domain\Portfolio\Requests\UpdatePortfolioRequest;

/**
 * Class PortfolioController
 * @package App\Http\Controllers\Admin
 */
class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = $this->dispatch(new GetAllPortfoliosQuery());

        return view('admin.portfolios.index', [
            'portfolios' => $portfolios
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $portfolioObject = new Portfolio();

        return view('admin.portfolios.create', [
            'categories' => $portfolioObject->getCategories(),
            'colors' => $portfolioObject->getColors()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreatePortfolioRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreatePortfolioRequest $request)
    {
        $this->dispatch(new CreatePortfolioCommand($request));

        return redirect(route('admin.portfolios.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $portfolio = $this->dispatch(new GetPortfolioByIdQuery($id));

        return view('admin.portfolios.edit', [
            'portfolio' => $portfolio
        ]);
    }

    /**
     * @param $id
     * @param UpdatePortfolioRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, UpdatePortfolioRequest $request)
    {
        $this->dispatch(new UpdatePortfolioCommand($id, $request));

        return redirect(route('admin.portfolios.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->dispatch(new DeletePortfolioCommand($id));

        return redirect(route('admin.portfolios.index'));
    }
}
