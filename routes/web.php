<?php

// auth
Auth::routes();

// language
Route::post('language/',array(
    'before' => 'csrf',
    'as' => 'language-chooser',
    'uses' => 'LanguageController@changeLanguage'
));


Route::get('/', 'HomeController@index')->name('home');



Route::middleware('auth')->group(function (){
    Route::resource('Product','Store\ProductController');
    Route::get('DestroyImg/{img}','Store\ProductController@destroyImg')->name('product.destroyImg');
    Route::resource('Provider','Persons\ProviderController');
    Route::resource('Client','Persons\ClientController');
    Route::resource('Position','Persons\PositionController');
    Route::prefix('Calendar')->group(function(){
        Route::prefix('User')->group(function(){
            Route::get('/','Calendars\UserCalendarController@index');
            Route::get('/getEvents','Calendars\UserCalendarController@getEvents');
            Route::post('/addEvent','Calendars\UserCalendarController@addEvent');
            Route::patch('/updateEvent','Calendars\UserCalendarController@updateEvent');
            Route::delete('/deleteEvent','Calendars\UserCalendarController@deleteEvent');
        });
        Route::prefix('Company')->group(function(){
            Route::get('/','Calendars\CompanyCalendarController@index');
            Route::get('/getEvents','Calendars\CompanyCalendarController@getEvents');
            Route::post('/addEvent','Calendars\CompanyCalendarController@addEvent');
            Route::patch('/updateEvent','Calendars\CompanyCalendarController@updateEvent');
            Route::delete('/deleteEvent','Calendars\CompanyCalendarController@deleteEvent');
        });
    });
    Route::prefix('Communication')->group(function(){
        Route::get('/','Communication\ChatController@index');
    });
});


Route::prefix('{company}')->middleware('auth')->group(function (){
    Route::get('/','Company\CompanyController@show')->name('company.profile');
});
