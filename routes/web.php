<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {
        // ******************* HomeController ********************* //
        Route::get('/', 'HomeController@index')->name('home');

        // ******************* Grades ********************* //
        Route::resource('grades', 'Grades\GradeController');

        // ******************* Levels ********************* //
        Route::resource('levels', 'Levels\LevelController');
        Route::post('levels/delete-all', 'Levels\LevelController@destroy_selected')->name('levels.destroy_selected');
        Route::post('levels/filters/{id?}', 'Levels\LevelController@filters')->name('levels.filters');
        Route::get('levels/list/{id}', 'Levels\LevelController@list')->name('levels.list');

        // ******************* Sections ********************* //
        Route::resource('sections', 'Sections\SectionController');

        // ******************* Students ********************* //
        Route::resource('students', 'Students\StudentController');
        Route::get('get_levels/{id}', 'Students\StudentController@get_levels')->name('levels.get_levels');
        Route::get('get_sections/{id}', 'Students\StudentController@get_sections')->name('levels.get_sections');
        Route::post('Upload_attachment', 'Students\StudentController@Upload_attachment')->name('Upload_attachment');
        Route::get('download_attachment/{studentname}/{filename}', 'Students\StudentController@download_attachment')->name('download_attachment');
        Route::post('delete_attachment', 'Students\StudentController@delete_attachment')->name('delete_attachment');

        // ******************* Students Promotions ********************* //
        Route::resource('promotions', 'Students\PromotionController');

        // ******************* Teachers ********************* //
        Route::resource('teachers', 'Teachers\TeacherController');

        // ******* Parents With Livewire ********* //
        Route::view('parents', 'livewire.show-form');
    }
);


