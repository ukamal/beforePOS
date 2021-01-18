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

// Route::get('/', function () {
//     return view('welcome');
// });

//For email sent
Route::get('/send-mail',function(){
    $details = [
        'title' =>'Mail from FullStackDeveloper',
        'body' =>'This is form testing email using smtp'
    ];
    \Mail::to('php7version@gmail.com')->send(new \App\Mail\TestMail($details));
    echo "Email has been sent";
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/','Frontend\FrontendController@index');
Route::get('/about-us','Frontend\FrontendController@aboutUs')->name('about-us');
Route::get('/contact-us','Frontend\FrontendController@contactUs')->name('contact-us');
Route::get('/news-details{id}','Frontend\FrontendController@newsDetails')->name('news-detaile');
Route::get('/mission','Frontend\FrontendController@mission')->name('mission');
Route::get('/vision','Frontend\FrontendController@vision')->name('vision');
Route::get('/news-event','Frontend\FrontendController@newsEvent')->name('news-event');
Route::post('/store','Frontend\FrontendController@store')->name('store');

Route::group(['middleware'=>'auth'],function(){
    Route::prefix('users')->group(function(){
    	Route::get('/add','Backend\UserController@addUser')->name('add-user');
    	Route::post('/store','Backend\UserController@storeUser')->name('store-user');
    	Route::get('/view','Backend\UserController@viewUser')->name('view-user');
    	Route::get('/edit{id}','Backend\UserController@editUser')->name('edit-user');
    	Route::post('/update{id}','Backend\UserController@updateUser')->name('update-user');
    	Route::get('/delete{id}','Backend\UserController@deleteUser')->name('delete-user');
    });

    Route::prefix('profiles')->group(function(){
        Route::get('/view','Backend\ProfileController@index')->name('profiles-view');
    	Route::get('/edit','Backend\ProfileController@edit')->name('edit-profile');
    	Route::post('/store','Backend\ProfileController@update')->name('profiles-update');
    	Route::get('/password/view','Backend\ProfileController@passwordView')->name('password-view');
    	Route::post('/password/update','Backend\ProfileController@passwordUpdate')->name('password-update');
    });

    Route::prefix('logos')->group(function(){
        Route::get('/add','Backend\LogoController@addLogo')->name('add-logo');
        Route::post('/store','Backend\LogoController@storeLogo')->name('store-logo');
        Route::get('/view','Backend\LogoController@viewLogo')->name('view-logo');
        Route::get('/edit{id}','Backend\LogoController@editLogo')->name('edit-logo');
        Route::post('/update{id}','Backend\LogoController@updateLogo')->name('update-logo');
        Route::get('/delete{id}','Backend\LogoController@deleteLogo')->name('delete-logo');
    });

    Route::prefix('sliders')->group(function(){
        Route::get('/add','Backend\SliderController@addSlider')->name('add-slider');
        Route::post('/store','Backend\SliderController@storeSlider')->name('store-slider');
        Route::get('/view','Backend\SliderController@viewSlider')->name('view-slider');
        Route::get('/edit{id}','Backend\SliderController@editSlider')->name('edit-slider');
        Route::post('/update{id}','Backend\SliderController@updateSlider')->name('update-slider');
        Route::get('/delete{id}','Backend\SliderController@deleteSlider')->name('delete-slider');
    });

    Route::prefix('mission')->group(function(){
        Route::get('/add','Backend\MissionController@add')->name('add-mission');
        Route::post('/store','Backend\MissionController@store')->name('store-mission');
        Route::get('/view','Backend\MissionController@view')->name('view-mission');
        Route::get('/edit{id}','Backend\MissionController@edit')->name('edit-mission');
        Route::post('/update{id}','Backend\MissionController@update')->name('update-mission');
        Route::get('/delete{id}','Backend\MissionController@delete')->name('delete-mission');
    });

    Route::prefix('vision')->group(function(){
        Route::get('/add','Backend\VisionController@add')->name('add-vision');
        Route::post('/store','Backend\VisionController@store')->name('store-vision');
        Route::get('/view','Backend\VisionController@view')->name('view-vision');
        Route::get('/edit{id}','Backend\VisionController@edit')->name('edit-vision');
        Route::post('/update{id}','Backend\VisionController@update')->name('update-vision');
        Route::get('/delete{id}','Backend\VisionController@delete')->name('delete-vision');
    });

    Route::prefix('News-Event')->group(function(){
        Route::get('/add','Backend\NewsEventController@add')->name('add-newsevent');
        Route::post('/store','Backend\NewsEventController@store')->name('store-newsevent');
        Route::get('/view','Backend\NewsEventController@view')->name('view-newsevent');
        Route::get('/edit{id}','Backend\NewsEventController@edit')->name('edit-newsevent');
        Route::post('/update{id}','Backend\NewsEventController@update')->name('update-newsevent');
        Route::get('/delete{id}','Backend\NewsEventController@delete')->name('delete-newsevent');
    });

    Route::prefix('service')->group(function(){
        Route::get('/add','Backend\ServiceController@add')->name('add-service');
        Route::post('/store','Backend\ServiceController@store')->name('store-service');
        Route::get('/view','Backend\ServiceController@view')->name('view-service');
        Route::get('/edit{id}','Backend\ServiceController@edit')->name('edit-service');
        Route::post('/update{id}','Backend\ServiceController@update')->name('update-service');
        Route::get('/delete{id}','Backend\ServiceController@delete')->name('delete-service');
    });

    Route::prefix('contact')->group(function(){
        Route::get('/add','Backend\FooterController@add')->name('add-footer');
        Route::post('/store','Backend\FooterController@store')->name('store-footer');
        Route::get('/view','Backend\FooterController@view')->name('view-footer');
        Route::get('/edit{id}','Backend\FooterController@edit')->name('edit-footer');
        Route::post('/update{id}','Backend\FooterController@update')->name('update-footer');
        Route::get('/delete{id}','Backend\FooterController@delete')->name('delete-footer');
        
        Route::get('/customer','Backend\FooterController@contact')->name('view-contact');
        Route::get('/contact-delete{id}','Backend\FooterController@deleteConatct')->name('delete-contact');
    });

    Route::prefix('about')->group(function(){
        Route::get('/view','Backend\AboutController@view')->name('view-about');
        Route::get('/add','Backend\AboutController@add')->name('add-about');
        Route::post('/store','Backend\AboutController@store')->name('store-about');
        Route::get('/edit{id}','Backend\AboutController@edit')->name('edit-about');
        Route::post('/update{id}','Backend\AboutController@update')->name('update-about');
        Route::get('/delete{id}','Backend\AboutController@delete')->name('delete-about');
    });

});

