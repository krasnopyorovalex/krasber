<?php

namespace App\Domain\Service\Queries;

use App\Service;

/**
 * Class GetAllServicesQuery
 * @package App\Domain\Service\Queries
 */
class GetAllServicesQuery
{
    private $excludeService;

    /**
     * GetAllServicesQuery constructor.
     * @param Service|null $excludeService
     */
    public function __construct(Service $excludeService = null)
    {
        $this->excludeService = $excludeService;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $query = Service::where('parent_id', null)->with(['services'])->orderBy('pos');

        if ($this->excludeService) {
            return $query->where('id', '<>', $this->excludeService->id)->get();
        }

        return $query->get();
    }
}