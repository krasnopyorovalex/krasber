<?php

namespace App\Domain\Portfolio\Commands;

use App\Portfolio;
use App\Domain\Image\Commands\UploadImageCommand;
use App\Http\Requests\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class CreatePortfolioCommand
 * @package App\Domain\Portfolio\Commands
 */
class CreatePortfolioCommand
{
    use DispatchesJobs;

    private $request;

    /**
     * CreatePortfolioCommand constructor.
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
        $Portfolio = new Portfolio();
        $Portfolio->fill($this->request->all());
        $Portfolio->save();

        if ($this->request->has('image')) {
            return $this->dispatch(new UploadImageCommand($this->request, $Portfolio->id, Portfolio::class));
        }

        return true;
    }

}