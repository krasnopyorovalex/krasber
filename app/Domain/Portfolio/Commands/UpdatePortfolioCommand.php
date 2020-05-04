<?php

namespace App\Domain\Portfolio\Commands;

use App\Portfolio;
use App\Domain\Portfolio\Queries\GetPortfolioByIdQuery;
use App\Domain\Image\Commands\DeleteImageCommand;
use App\Domain\Image\Commands\UploadImageCommand;
use App\Events\RedirectDetected;
use App\Http\Requests\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UpdatePortfolioCommand
 * @package App\Domain\Page\Commands
 */
class UpdatePortfolioCommand
{

    use DispatchesJobs;

    private $request;
    private $id;

    /**
     * UpdatePortfolioCommand constructor.
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
        $portfolio = $this->dispatch(new GetPortfolioByIdQuery($this->id));
        $urlNew = $this->request->post('alias');

        if ($portfolio->getOriginal('alias') != $urlNew) {
            event(new RedirectDetected($portfolio->getOriginal('alias'), $urlNew, 'portfolio.show'));
        }

        if ($this->request->has('image')) {
            if ($portfolio->image) {
                $this->dispatch(new DeleteImageCommand($portfolio->image));
            }
            $this->dispatch(new UploadImageCommand($this->request, $portfolio->id, Portfolio::class));
        }

        return $portfolio->update($this->request->all());
    }

}