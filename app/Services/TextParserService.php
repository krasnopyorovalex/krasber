<?php

namespace App\Services;

use App\Domain\Service\Queries\GetAllServicesQuery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class TextParserService
 * @package App\Services
 */
class TextParserService
{
    use DispatchesJobs;

    /**
     * @param Model $entity
     * @return string|string[]|null
     */
    public function parse(Model $entity)
    {
        return preg_replace_callback_array(
            [
                '#(<p(.*)>)?{services}(<\/p>)?#' => function () use ($entity) {
                    $services = $this->dispatch(new GetAllServicesQuery());
                    $service = $services->firstWhere('id', '=', $entity->id);

                    return view('layouts.shortcodes.sub_services', ['service' => $service]);
                },
                '#(<p(.*)>)?{faq}(<\/p>)?#' => static function () use ($entity) {
                    return view('layouts.shortcodes.faqs', ['faqs' => $entity->relatedFaqs]);
                },
                '#(<p(.*)>)?{service_portfolios}(<\/p>)?#' => static function () use ($entity) {
                    return view('layouts.shortcodes.service_portfolios', ['portfolios' => $entity->relatedPortfolios]);
                },
                '#(<p(.*)>)?{quiz}(<\/p>)?#' => static function () {
                    return view('layouts.shortcodes.quiz');
                }
            ],
            $entity->text
        );
    }

}
