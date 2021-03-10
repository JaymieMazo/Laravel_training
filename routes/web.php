<?php
use App\Company;
use App\Department;
use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


Route::get('/' , function(){
    return view('welcome');
});




Route::get('/test' , function(){
    return  Auth:: user();
});





Route::get('company' ,'CompanyController@get_data')->middleware('auth');
Route::post('company' ,'CompanyController@insert_data')->middleware('auth');

Route::get('department' ,'DepartmentController@get_data')->middleware('auth');
Route::post('department' ,'DepartmentController@insert_data')->middleware('auth');

Route::get('section' ,'SectionController@get_data')->middleware('auth');
Route::post('section' ,'SectionController@insert_data')->middleware('auth');

Route::get('employee' ,'EmployeeController@get_data')->middleware('auth');
Route::post('employee' ,'EmployeeController@insert_data')->middleware('auth');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');