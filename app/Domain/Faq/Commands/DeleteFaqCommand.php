<?php

namespace App\Domain\Faq\Commands;

use App\Domain\Faq\Queries\GetFaqByIdQuery;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class DeleteFaqCommand
 * @package App\Domain\Faq\Commands
 */
class DeleteFaqCommand
{

    use DispatchesJobs;

    /**
     * @var int
     */
    private $id;

    /**
     * DeleteFaqCommand constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle(): bool
    {
        $faq = $this->dispatch(new GetFaqByIdQuery($this->id));

        return $faq->delete();
    }

}