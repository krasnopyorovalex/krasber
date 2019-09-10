<?php

namespace App\Domain\Service\Queries;

use App\Service;

/**
 * Class GetAllPublishedServicesQuery
 * @package App\Domain\Service\Queries
 */
class GetAllPublishedServicesQuery
{
    private static $services;

    /**
     * Execute the job.
     */
    public function handle()
    {
        if ( ! self::$services) {
            $query = Service::where('parent_id', null)->with(['services' => static function($query){
                return $query->where('is_published', '1')->orderBy('pos');
            }])->orderBy('pos');

            self::$services = $query->where('is_published', '1')->get();
        }

        return self::$services;
    }
}
