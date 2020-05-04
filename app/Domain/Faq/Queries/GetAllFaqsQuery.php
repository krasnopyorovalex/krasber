<?php

namespace App\Domain\Faq\Queries;

use App\Faq;

/**
 * Class GetAllFaqsQuery
 * @package App\Domain\Faq\Queries
 */
class GetAllFaqsQuery
{
    /**
     * Execute the job.
     */
    public function handle()
    {
        return Faq::all();
    }
}