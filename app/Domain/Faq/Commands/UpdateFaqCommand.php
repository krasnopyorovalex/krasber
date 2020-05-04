<?php

namespace App\Domain\Faq\Commands;

use App\Domain\Faq\Queries\GetFaqByIdQuery;
use App\Http\Requests\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UpdateFaqCommand
 * @package App\Domain\Page\Commands
 */
class UpdateFaqCommand
{

    use DispatchesJobs;

    private $request;
    private $id;

    /**
     * UpdateFaqCommand constructor.
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
        $faq = $this->dispatch(new GetFaqByIdQuery($this->id));

        return $faq->update($this->request->all());
    }

}