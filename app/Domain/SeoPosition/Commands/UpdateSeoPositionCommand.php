<?php

namespace App\Domain\SeoPosition\Commands;

use App\Domain\Image\Commands\DeleteImageCommand;
use App\Domain\Image\Commands\UploadImageCommand;
use App\Domain\SeoPosition\Queries\GetSeoPositionByIdQuery;
use App\Http\Requests\Request;
use App\SeoPosition;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UpdateSeoPositionCommand
 * @package App\Domain\SeoPosition\Commands
 */
class UpdateSeoPositionCommand
{

    use DispatchesJobs;

    private $request;
    private $id;

    /**
     * UpdateSeoPositionCommand constructor.
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
        $SeoPosition = $this->dispatch(new GetSeoPositionByIdQuery($this->id));

        if ($this->request->has('image')) {
            if ($SeoPosition->image) {
                $this->dispatch(new DeleteImageCommand($SeoPosition->image));
            }
            $this->dispatch(new UploadImageCommand($this->request, $SeoPosition->id, SeoPosition::class));
        }

        return $SeoPosition->update($this->request->all());
    }

}
