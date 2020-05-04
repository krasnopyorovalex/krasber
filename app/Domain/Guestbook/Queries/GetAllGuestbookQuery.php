<?php

namespace App\Domain\Guestbook\Queries;

use App\Guestbook;

/**
 * Class GetAllGuestbookQuery
 * @package App\Domain\Guestbook\Queries
 */
class GetAllGuestbookQuery
{
    /**
     * Execute the job.
     */
    public function handle()
    {
        return Guestbook::all();
    }
}