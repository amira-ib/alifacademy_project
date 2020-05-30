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

Route::get('/', function () {
    return view('layouts.welcome');
});

/*students */
Route::get('/student','StudentController@index')->name('student.index');
Route::get('/student/create','StudentController@create')->name('student.create');
Route::get('/student/{student_id}','StudentController@show')->name('student.show');

Route::post('/student/store','StudentController@store')->name('student.store');

Route::get('/student/{student_id}/edit','StudentController@edit')->name('student.edit');
Route::match(['put','patch'],'/student/{student_id}','StudentController@update')->name('student.update');

Route::delete('/student/{student_id}','StudentController@destroy')->name('student.destroy');

Route::post('/student/{student_id}/addskill','StudentController@addskill')->name('student.addskill');

Route::delete('/student/{student_id}/{skill_id}','StudentController@destroy_skill')->name('student.destroy_skill');

Route::get('/student/score/edit/{studentskill_id}','StudentController@edit_skill_score')->name('student.edit_skill_score');

Route::match(['put','patch'],'/student/edit/{studentskill_id}','StudentController@update_skill_score')->name('student.update_skill_score');


/*groups*/
Route::get('/group','GroupController@index')->name('group.index');
Route::get('/group/create','GroupController@create')->name('group.create');

Route::get('/group/{group_id}','GroupController@show')->name('group.show');
Route::post('/group/store','GroupController@store')->name('group.store');

Route::get('/group/{group_id}/edit','GroupController@edit')->name('group.edit');
Route::match(['put','patch'],'/group/{group_id}','GroupController@update')->name('group.update');

Route::delete('/group/{group_id}','GroupController@destroy')->name('group.destroy');
Route::post('/group/{group_id}/addstudent','GroupController@addstudent')->name('group.addstudent');
Route::delete('/group/{group_id}/{student_id}','GroupController@destroyStudent')->name('group.destroyStudent');

/*skills*/
Route::get('/skill/create','SkillController@create')->name('skill.create');
Route::post('/skill/store','SkillController@store')->name('skill.store');
Route::get('/skill/{skill_id}','SkillController@show')->name('skill.show');
Route::get('/skill','SkillController@index')->name('skill.index');
Route::get('/skill/{group_id}/edit','SkillController@edit')->name('skill.edit');
Route::match(['put','patch'],'/skill/{skill_id}','SkillController@update')->name('skill.update');

Route::delete('/skill/{skill_id}','SkillController@destroy')->name('skill.destroy');


/*projects*/
Route::get('/project','ProjectController@index')->name('project.index');
Route::get('/project/create','ProjectController@create')->name('project.create');
Route::post('/project/store','ProjectController@store')->name('project.store');

Route::get('/project/{project_id}','ProjectController@show')->name('project.show');
Route::get('/project/{project_id}/edit','ProjectController@edit')->name('project.edit');
Route::match(['put','patch'],'/project/{project_id}','ProjectController@update')->name('project.update');

Route::delete('/project/{project_id}','ProjectController@destroy')->name('project.destroy');

Route::post('/project/{project_id}/addskill', 'ProjectController@addskill')->name('project.addskill');
Route::delete('/project/{project_id}/{skill_id}','ProjectController@destroySkill')->name('project.destroySkill');

Route::post('/project/{project_id}/addstudent','ProjectController@addstudent')->name('project.addstudent');
Route::delete('/project/{project_id}/delete/{student_id}','ProjectController@destroyStudent')->name('project.destroyStudent');
