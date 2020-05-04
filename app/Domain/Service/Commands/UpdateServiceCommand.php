<?php

namespace App\Domain\Service\Commands;

use App\Domain\Image\Commands\DeleteImageCommand;
use App\Domain\Image\Commands\UploadImageCommand;
use App\Domain\Service\Queries\GetServiceByIdQuery;
use App\Events\RedirectDetected;
use App\Http\Requests\Request;
use App\Service;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UpdateServiceCommand
 * @package App\Domain\Service\Commands
 */
class UpdateServiceCommand
{

    use DispatchesJobs;

    private $request;
    private $id;

    /**
     * UpdateServiceCommand constructor.
     * @param int $id
     * @param Request $request
     */
    public function __construct(int $id, Request $request)
    {
        $this->id = $id;
        $this->request = $request;
    }

    /**
     * @return bool
     */
    public function handle(): bool
    {
        $service = $this->dispatch(new GetServiceByIdQuery($this->id));
        $urlNew = $this->request->post('alias');

        if ($service->getOriginal('alias') != $urlNew) {
            event(new RedirectDetected($service->getOriginal('alias'), $urlNew, 'service.show'));
        }

        if ($this->request->has('image')) {
            if ($service->image) {
                $this->dispatch(new DeleteImageCommand($service->image));
            }
            $this->dispatch(new UploadImageCommand($this->request, $service->id, Service::class));
        }

        $service->relatedServices()->sync($this->request->post('services'));
        $service->relatedFaqs()->sync($this->request->post('faqs'));
        $service->relatedPortfolios()->sync($this->request->post('portfolios'));

        return $service->update($this->request->all());
    }

}