<?php

namespace App\Domain\SeoPosition\Commands;

use App\Domain\Image\Commands\UploadImageCommand;
use App\Http\Requests\Request;
use App\SeoPosition;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class CreateSeoPositionCommand
 * @package App\Domain\SeoPosition\Commands
 */
class CreateSeoPositionCommand
{
    use DispatchesJobs;

    private $request;

    /**
     * CreateSeoPositionCommand constructor.
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
        $SeoPosition = new SeoPosition();
        $SeoPosition->fill($this->request->all());
        $SeoPosition->save();

        if ($this->request->has('image')) {
            return $this->dispatch(new UploadImageCommand($this->request, $SeoPosition->id, SeoPosition::class));
        }

        return true;
    }

}
