<?php

namespace App\Http\ViewComposers;

use App\Domain\Service\Queries\GetAllPublishedServicesQuery;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class ServiceComposer
 * @package App\Http\ViewComposers
 */
class ServiceComposer
{
    use DispatchesJobs;

    /**
     * @param View $view
     */
    public function compose(View $view): void
    {
        $services = $this->dispatch(new GetAllPublishedServicesQuery());

        $view->with('services', $services);
    }
}
