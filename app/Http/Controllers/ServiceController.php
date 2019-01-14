<?php

namespace App\Http\Controllers;

use App\Domain\Service\Queries\GetServiceByAliasQuery;
use App\Service;
use App\Services\CanonicalService;
use App\Services\TextParserService;

/**
 * Class ServiceController
 * @package App\Http\Controllers
 */
class ServiceController extends PageController
{
    /**
     * @var TextParserService
     */
    private $parserService;

    /**
     * ServiceController constructor.
     * @param TextParserService $parserService
     * @param CanonicalService $canonicalService
     */
    public function __construct(TextParserService $parserService, CanonicalService $canonicalService)
    {
        $this->parserService = $parserService;
        parent::__construct($canonicalService);
    }

    /**
     * @param string $alias
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(string $alias = 'index')
    {
        try {
            /** @var $service Service*/
            $service = $this->dispatch(new GetServiceByAliasQuery($alias));
            $service->text = $this->parserService->parse($service);
        } catch (\Exception $exception) {
            return parent::show($alias);
        }

        return view('service.index', ['service' => $service]);
    }
}