<?php

namespace App\Services;

use App\Image;
use Intervention\Image\ImageManager;

/**
 * Class ImageResizerService
 * @package App\Services
 */
final class ImageResizerService
{
    /**
     * @var int
     */
    private $width = 340;
    /**
     * @var int
     */
    private $height = 230;

    /**
     * @param Image $image
     * @return string
     */
    public function getImage(Image $image): string
    {
        $name = $this->makeName($image->path);

        if (! file_exists($this->storagePath($name))) {
            $this->generateThumb($image, $name);
        }

        return $this->publicPath($name);
    }

    /**
     * @param int $width
     */
    public function setWidth(int $width): void
    {
        $this->width = $width;
    }

    /**
     * @param int $height
     */
    public function setHeight(int $height): void
    {
        $this->height = $height;
    }

    /**
     * @param Image $image
     * @param string $name
     * @return string
     */
    private function generateThumb(Image $image, string $name): string
    {
        return (new ImageManager())->make(public_path($image->path))->resize($this->width, $this->height, function ($constraint) {
            $constraint->aspectRatio();
        })->save($this->storagePath($name));
    }

    /**
     * @param string $path
     * @return mixed
     */
    private function makeName(string $path)
    {
        $chunks = explode('/', $path);
        list($name, $ext) = explode('.', end($chunks));

        return $name . '_' . $this->width . '_' . $this->height . '.' . $ext;
    }

    /**
     * @param string $name
     * @return string
     */
    private function storagePath(string $name): string
    {
        return storage_path('app/public/images/resize/' . $name);
    }

    /**
     * @param string $name
     * @return string
     */
    private function publicPath(string $name): string
    {
        return 'storage/images/resize/' . $name;
    }
}
