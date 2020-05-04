<?php

namespace App\Domain\Portfolio\Commands;

use App\Domain\Portfolio\Queries\GetPortfolioByIdQuery;
use App\Domain\Image\Commands\DeleteImageCommand;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class DeletePortfolioCommand
 * @package App\Domain\Portfolio\Commands
 */
class DeletePortfolioCommand
{

    use DispatchesJobs;

    /**
     * @var int
     */
    private $id;

    /**
     * DeletePortfolioCommand constructor.
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
        $Portfolio = $this->dispatch(new GetPortfolioByIdQuery($this->id));

        if($Portfolio->image) {
            $this->dispatch(new DeleteImageCommand($Portfolio->image));
        }

        return $Portfolio->delete();
    }

}