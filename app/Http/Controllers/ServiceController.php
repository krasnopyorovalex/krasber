<?php

namespace App\Http\Controllers;

use App\Domain\Service\Queries\GetServiceByAliasQuery;
use App\Service;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Exception;

/**
 * Class ServiceController
 * @package App\Http\Controllers
 */
class ServiceController extends PageController
{
    /**
     * @param string $alias
     * @return Factory|View
     */
    public function show(string $alias = 'index')
    {
        try {
            /** @var $service Service*/
            $service = $this->dispatch(new GetServiceByAliasQuery($alias));
            $service->text = $this->parserService->parse($service);
        } catch (Exception $exception) {
            return parent::show($alias);
        }

        return view('service.index', ['service' => $service]);
    }
}
