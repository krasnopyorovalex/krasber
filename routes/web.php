<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::pattern('alias', '[\da-z-]+');

Auth::routes();

Route::post('form/order-service', 'FormHandlerController@orderService')->name('order.service.send');
Route::post('form/order-consultation', 'FormHandlerController@orderConsultation')->name('order.consultation.send');
Route::post('form/order-tariff', 'FormHandlerController@orderTariff')->name('order.tariff.send');
Route::post('form/subscribe', 'FormHandlerController@subscribe')->name('subscribe.send');
Route::get('sitemap.xml', 'SitemapController@xml')->name('sitemap.xml');

Route::group(['middleware' => ['redirector', 'shortcode']], function () {
    Route::get('{alias}', 'ServiceController@show')->name('service.show');
    Route::get('{alias?}/{page?}', 'PageController@show')->name('page.show')->where('page', '[0-9]+');
    Route::get('blog/{alias}', 'BlogController@show')->name('article.show');
    Route::get('portfolio/{alias}', 'PortfolioController@show')->name('portfolio.show');

    /**
     * @todo temporary solution for correct perform redirects. After indexing bots can be removed
     */
    Route::get('services/{alias}', function (){
        return false;
    });
    Route::get('articles/{alias}', function (){
        return false;
    });
});

Route::group(['prefix' => '_root', 'middleware' => 'auth', 'namespace' => 'Admin', 'as' => 'admin.'], function () {

    Route::get('', 'HomeController@home')->name('home');

    Route::post('upload-ckeditor', 'CkeditorController@upload')->name('upload-ckeditor');

    foreach (glob(app_path('Domain/**/routes.php')) as $item) {
        require $item;
    }
});
