<?php

namespace App\Domain\Page\Queries;

use App\Page;

/**
 * Class GetAllPagesQuery
 * @package App\Domain\Page\Queries
 */
class GetAllPagesQuery
{

    /**
     * @var bool
     */
    private $isPublished;

    /**
     * GetAllPagesQuery constructor.
     * @param bool $isPublished
     */
    public function __construct(bool $isPublished = false)
    {
        $this->isPublished = $isPublished;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {

        if ($this->isPublished) {
            return Page::publish()->get();
        }

        return Page::all();
    }
}
