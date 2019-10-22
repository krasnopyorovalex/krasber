<?php

namespace App\Domain\Article\DTO;

use App\Article;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class AdjoiningResult
 * @package App\Domain\Article\DTO
 */
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
     * @param Article $article
     * @return mixed
     */
    public function nextOrFirst(Article $article)
    {
        return $this->collection->first(static function ($value) use ($article) {
            return $value->published_at < $article->published_at;
        }) ?: $this->collection->first();
    }

    /**
     * @param Article $article
     * @return mixed
     */
    public function prevOrLast(Article $article)
    {
        return $this->collection->last(static function ($value) use ($article) {
            return $value->published_at > $article->published_at;
        }) ?: $this->collection->last();
    }
}
