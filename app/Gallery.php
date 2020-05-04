<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Gallery
 *
 * @property int $id
 * @property string $name
 * @property string $is_published
 * @property int $pos
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\GalleryImage[] $images
 */
class Gallery extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['name', 'is_published'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany('App\GalleryImage')->orderBy('pos');
    }
}
