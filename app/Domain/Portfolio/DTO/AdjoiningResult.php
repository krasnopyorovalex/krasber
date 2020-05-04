<?php

namespace App\Domain\Portfolio\DTO;

use App\Portfolio;
use Illuminate\Database\Eloquent\Collection;

class AdjoiningResult
{

    /**
     * @var Collection
     */
    private $collection;

    /**
     * AdjoiningResult constructor.
     * @param Collection $collection
     */
    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    /**
     * @param Portfolio $portfolio
     * @return mixed
     */
    public function nextOrFirst(Portfolio $portfolio)
    {
        return $this->collection->first(function ($value, $key) use ($portfolio) {
            return $value->pos > $portfolio->pos;
        }) ?: $this->collection->first();
    }

    /**
     * @param Portfolio $portfolio
     * @return mixed
     */
    public function prevOrLast(Portfolio $portfolio)
    {
        return $this->collection->last(function ($value, $key) use ($portfolio) {
            return $value->pos < $portfolio->pos;
        }) ?: $this->collection->last();
    }
}