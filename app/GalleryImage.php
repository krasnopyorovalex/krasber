<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\GalleryImage
 *
 * @property int $id
 * @property int $gallery_id
 * @property string $name
 * @property string|null $alt
 * @property string|null $title
 * @property string $basename
 * @property string $ext
 * @property string $is_published
 * @property int $pos
 * @mixin \Eloquent
 * @property-read \App\Gallery $gallery
 */
class GalleryImage extends Model
{

    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['gallery_id', 'name', 'alt', 'title', 'is_published', 'pos'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gallery()
    {
        return $this->belongsTo('App\Gallery');
    }

    /**
     * @return string
     */
    public function getThumb(): string
    {
        return asset('storage/gallery/' . $this->gallery_id . '/' . $this->basename . '_thumb.' . $this->ext);
    }
}
