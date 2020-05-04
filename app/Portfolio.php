<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Portfolio
 * @package App
 */
class Portfolio extends Model
{
    use AutoAliasTrait;

    public $timestamps = false;

    protected $casts = [
        'tags' => 'array'
    ];

    private $categories = [
        'cat_01' => 'индивидуальный проект',
        'cat_02' => 'сайт каталог',
        'cat_03' => 'CRM-система',
        'cat_04' => 'готовый дизайн сайта',
    ];

    private $colors = [
        'default' => 'По-умолчанию(тёмный)',
        'peach' => 'Персиковый',
        'grey' => 'Серый',
        'navy__blue' => 'Тёмно-синий',
        'navy__grey' => 'Тёмно-серый',
        'blue' => 'Синий',
    ];

    /**
     * @var array
     */
    protected $fillable = ['category', 'color', 'site_url', 'tags', 'name', 'title', 'description', 'text', 'preview', 'alias', 'pos', 'form_title', 'form_sub_title'];

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
    public function getUrlAttribute(): string
    {
        return route('portfolio.show', $this->alias);
    }

    /**
     * @return array
     */
    public function getCategories(): array
    {
        return $this->categories;
    }

    /**
     * @return array
     */
    public function getColors(): array
    {
        return $this->colors;
    }
}
