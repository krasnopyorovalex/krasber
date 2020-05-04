<?php

namespace App\Domain\Service\Commands;

use App\Domain\Image\Commands\UploadImageCommand;
use App\Http\Requests\Request;
use App\Service;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class CreateServiceCommand
 * @package App\Domain\Service\Commands
 */
class CreateServiceCommand
{
    use DispatchesJobs;

    private $request;

    /**
     * CreateServiceCommand constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return bool
     */
    public function handle(): bool
    {
        $service = new Service();
        $service->fill($this->request->all());
        $service->save();

        $service->relatedServices()->attach($this->request->post('services'));
        $service->relatedPortfolios()->attach($this->request->post('portfolios'));

        if($this->request->has('image')) {
            return $this->dispatch(new UploadImageCommand($this->request, $service->id, Service::class));
        }

        return true;
    }

}