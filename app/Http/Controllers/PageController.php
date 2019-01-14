<?php

namespace App\Http\Controllers;

use App\Domain\Page\Queries\GetPageByAliasQuery;
use App\Services\CanonicalService;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * @var CanonicalService
     */
    private $canonicalService;

    /**
     * PageController constructor.
     * @param CanonicalService $canonicalService
     */
    public function __construct(CanonicalService $canonicalService)
    {
        $this->canonicalService = $canonicalService;
    }

    /**
     * @param string $alias
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function show(string $alias = 'index')
    {
        $page = $this->dispatch(new GetPageByAliasQuery($alias));

        $page = $this->canonicalService->check($page);

        return view($page->template, ['page' => $page]);
    }
}