<?php

namespace App\Domain\Faq\Queries;

use App\Faq;

/**
 * Class GetFaqByIdQuery
 * @package App\Domain\Faq\Queries
 */
class GetFaqByIdQuery
{
    /**
     * @var int
     */
    private $id;

    /**
     * GetFaqByIdQuery constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return Faq::findOrFail($this->id);
    }
}