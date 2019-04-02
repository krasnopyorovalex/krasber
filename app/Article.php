<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Article
 *
 * @property int $id
 * @property string $name
 * @property string $title
 * @property string $description
 * @property string $text
 * @property string $preview
 * @property string $alias
 * @property string $is_published
 * @property \Illuminate\Support\Carbon $published_at
 * @property-read \App\Image $image
 * @mixin \Eloquent
 */
class Article extends Model
{
    use AutoAliasTrait;

    public $timestamps = false;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'published_at'
    ];
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }

    /**
     * @return string
     */
    public function getUrlAttribute()
    {
        return route("article.show", $this->alias);
    }
}
