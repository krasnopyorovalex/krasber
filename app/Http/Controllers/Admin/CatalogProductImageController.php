<?php

namespace App\Http\Controllers\Admin;

use App\Domain\CatalogProduct\Queries\GetCatalogProductByIdQuery;
use App\Domain\CatalogProductImage\Commands\CreateCatalogProductImageCommand;
use App\Domain\CatalogProductImage\Commands\DeleteCatalogProductImageCommand;
use App\Domain\CatalogProductImage\Commands\UpdateCatalogProductImageCommand;
use App\Domain\CatalogProductImage\Commands\UpdatePositionsCatalogProductImageCommand;
use App\Domain\CatalogProductImage\Queries\GetCatalogProductImageByIdQuery;
use Domain\CatalogProductImage\Requests\CreateCatalogProductImageRequest;
use Domain\CatalogProductImage\Requests\UpdateCatalogProductImageRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UploadImagesService;

/**
 * Class CatalogProductImageController
 * @package App\Http\Controllers\Admin
 */
class CatalogProductImageController extends Controller
{
    /**
     * @var UploadImagesService
     */
    private $uploadGalleryImagesService;

    /**
     * GalleryImageController constructor.
     * @param UploadImagesService $uploadGalleryImagesService
     */
    public function __construct(UploadImagesService $uploadGalleryImagesService)
    {
        $this->uploadGalleryImagesService = $uploadGalleryImagesService;
    }

    /**
     * @param int $product
     * @return array
     * @throws \Throwable
     */
    public function index(int $product)
    {
        $catalogProduct = $this->dispatch(new GetCatalogProductByIdQuery($product));

        return [
            'images' => view('admin.catalog_products._images_box', [
                'catalogProduct' => $catalogProduct
            ])->render()
        ];
    }

    /**
     * @param CreateCatalogProductImageRequest $request
     * @param $product
     * @return array
     */
    public function store(CreateCatalogProductImageRequest $request, $product)
    {
        $image = $this->uploadGalleryImagesService->upload($request, 'product', $product);
        $this->dispatch(new CreateCatalogProductImageCommand($image));

        return [
            'message' => 'Данные сохранены успешно'
        ];
    }

    /**
     * @param $id
     * @return string
     * @throws \Throwable
     */
    public function edit($id)
    {
        $image = $this->dispatch(new GetCatalogProductImageByIdQuery($id));

        return view('admin.catalog_products._image_popup', [
            'image' => $image
        ])->render();
    }

    /**
     * @param $id
     * @param UpdateCatalogProductImageRequest $request
     * @return array
     * @throws \Throwable
     */
    public function update($id, UpdateCatalogProductImageRequest $request)
    {
        $this->dispatch(new UpdateCatalogProductImageCommand($id, $request));
        $image = $this->dispatch(new GetCatalogProductImageByIdQuery($id));

        return [
            'images' => view('admin.catalog_products._images_box', [
                'catalogProduct' => $image->product
            ])->render(),
            'message' => 'Данные сохранены успешно'
        ];
    }

    /**
     * @param $id
     * @return array
     */
    public function destroy($id)
    {
        $this->dispatch(new DeleteCatalogProductImageCommand($id));

        return [
            'message' => 'Изображение удалено успешно'
        ];
    }

    /**
     * @param Request $request
     * @return array
     */
    public function updatePositions(Request $request)
    {
        $this->dispatch(new UpdatePositionsCatalogProductImageCommand($request));

        return [
            'message' => 'Порядок изображений сохранён успешно'
        ];
    }
}
