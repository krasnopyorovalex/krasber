<?php

namespace App\Domain\SeoPosition\Commands;

use App\Domain\Image\Commands\DeleteImageCommand;
use App\Domain\SeoPosition\Queries\GetSeoPositionByIdQuery;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class DeleteSeoPositionCommand
 * @package App\Domain\SeoPosition\Commands
 */
class DeleteSeoPositionCommand
{

    use DispatchesJobs;

    /**
     * @var int
     */
    private $id;

    /**
     * DeleteSeoPositionCommand constructor.
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
        $SeoPosition = $this->dispatch(new GetSeoPositionByIdQuery($this->id));

        if ($SeoPosition->image) {
            $this->dispatch(new DeleteImageCommand($SeoPosition->image));
        }

        return $SeoPosition->delete();
    }

}
