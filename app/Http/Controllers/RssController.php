<?php

namespace App\Http\Controllers;

use App\Domain\Service\Queries\GetAllServicesQuery;

class RssController extends Controller
{
    public function show()
    {
        $services = $this->dispatch(new GetAllServicesQuery());

        return response()
            ->view('rss.index', [
                'services' => $services
            ], 200)
            ->header('Content-Type', 'application/rss+xml');
    }
}
