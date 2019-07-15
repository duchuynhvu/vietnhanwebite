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

// Auth::routes();
// Authentication Routes...
Route::get('admin', 'Auth\LoginController@showLoginForm')->name('admin');
Route::post('admin', 'Auth\LoginController@login');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::group(['middleware' => ['auth', 'lang']], function () {
    Route::get('/admin/lang/{local}', 'HomeController@setLocale');

    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/logout', function () {
        return redirect('/admin');
    });
    Route::get('/dashboard', 'HomeController@index');

    // Slider Image Resource Controller
    Route::resource('slider', 'SliderImageController', ['except' => ['show']]);
    Route::put('/slider/switch/{id}', 'SliderImageController@switchPublish');
    Route::post('/slider/delete', 'SliderImageController@delSome');

    // Video Resource Controller
    Route::resource('videos', 'VideoController', ['except' => ['show']]);
    Route::post('/videos/delete', 'VideoController@delSome');

    // News Resource Controller
    Route::resource('admin/news', 'NewsController', ['except' => ['show']]);
    Route::post('/admin/news/delete', 'NewsController@delSome');
    Route::put('/admin/news/switch/{id}', 'NewsController@switchPublish');
    Route::get('/admin/news-seo', 'NewsController@seo');
    Route::get('/admin/news-seo/{id}/edit', 'NewsController@seoEdit');
    Route::put('/admin/news-seo/{id}', 'NewsController@seoUpdate');

    // News Cateogry Resource Controller
    Route::resource('news-categories', 'NewsCategoryController', ['except' => ['show']]);
    Route::post('/news-categories/delete', 'NewsCategoryController@delSome');

    // Feedback Resource Controller
    Route::resource('feedbacks', 'FeedbackController', ['except' => ['show']]);
    Route::post('/feedbacks/delete', 'FeedbackController@delSome');

    // Client Link Resource Controller
    Route::resource('links', 'ClientLinkController', ['except' => ['show']]);
    Route::post('/links/delete', 'ClientLinkController@delSome');

    // Benefit Resource Controller
    Route::resource('admin/benefits', 'BenefitController', ['except' => ['show']]);
    Route::post('/admin/benefits/delete', 'BenefitController@delSome');
    Route::put('/admin/benefits/feature/switch/{id}', 'BenefitController@featureSwitch');

    // Information Resource Controller
    Route::get('/information', 'InformationController@edit');
    Route::put('/information/update', 'InformationController@update');

    // About Content Controller
    Route::get('/content', 'AboutController@edit');
    Route::put('/content/update', 'AboutController@update');

    // Regent Resource Controller
    Route::resource('regents', 'RegentController', ['except' => ['show']]);
    Route::post('/regents/delete', 'RegentController@delSome');

    Route::get('/introduce', 'IntroduceController@introduce');
    Route::put('/introduce/update', 'IntroduceController@update');

    // Serivce Resource Controller
    Route::resource('services', 'ServiceController', ['except' => ['show']]);
    Route::post('/services/delete', 'ServiceController@delSome');

    // Package Resource Controller
    Route::resource('packages', 'PackageController', ['except' => ['show']]);
    Route::post('/packages/delete', 'PackageController@delSome');

    // Contact Request Resource Controller
    Route::resource('admin/contact-requests', 'ContactRequestController', ['except' => ['create', 'edit', 'destroy']]);
    Route::post('/admin/contact-requests/delete', 'ContactRequestController@delSome');
    Route::get('/admin/contact-requests-jsGrid', 'ContactRequestController@jsGrid');
    // Home Accordion Resource Controller
    Route::resource('admin/home-accordions', 'HomeAccordionController', ['except' => ['show']]);
    Route::post('/admin/home-accordions/delete', 'HomeAccordionController@delSome');

    // User Resource Controller
    Route::group(['middleware' => ['role']], function () {
        Route::resource('admin/users', 'UserController', ['except' => ['show']]);
        Route::get('/admin/page-info', 'PageInfomationController@show');
        Route::get('/admin/page-info/{code}/edit', 'PageInfomationController@edit');
        Route::put('/admin/page-info/{code}', 'PageInfomationController@update');
        Route::get('/admin/smtp', 'InformationController@smtp');
        Route::put('/admin/smtp/update', 'InformationController@smtpUpdate');
    });

    Route::put('/admin/users/change-password/{id}', 'UserController@changePassword');

    Route::get('/admin/profile', 'UserController@profile');

    Route::put('/admin/profile/update', 'UserController@profileUpdate');

});

Route::get('/lang/{local}', 'PageController@setLocale');

Route::group(['middleware' => ['lang']], function () {
    Route::get('/', 'PageController@index');

    Route::get('/news/category/{id}/{slug}', 'PageController@news');

    Route::get('/about-us', 'PageController@aboutUs');

    Route::get('/contact', 'PageController@contact');

    Route::post('/contact', 'PageController@contactPost');

    Route::get('/projects', 'PageController@projects');

    Route::get('/features', 'PageController@features');

    Route::get('/pricing', 'PageController@pricing');

    Route::get('/news/{id}/{slug}', 'PageController@newsDetail');

    Route::get('/partner', 'PageController@partner');

    Route::get('/search', 'PageController@search');

    Route::post('/login', function () {
    });

    Route::post('/register', function () {
    });

    Route::get('/benefit/{id}/{slug}', 'PageController@benefitDetail');
});