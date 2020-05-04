<?php

namespace App\Domain\Faq\Commands;

use App\Faq;
use App\Http\Requests\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class CreateFaqCommand
 * @package App\Domain\Faq\Commands
 */
class CreateFaqCommand
{
    use DispatchesJobs;

    private $request;

    /**
     * CreateFaqCommand constructor.
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
        $faq = new Faq();
        $faq->fill($this->request->all());
        return $faq->save();
    }

}