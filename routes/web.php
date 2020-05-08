<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/',  'QuizController@index');
Route::get('topics', 'TopicController@index');
Route::get('topics/{topic}', 'TopicController@show');
Route::get('questions/{question}', 'QuestionController@show')->name('questions.show');
Route::post('questions/myanswer', 'QuestionController@storeAnswer')->name('questions.storeAnswer');

Route::resource('quizzes', 'QuizController');
Route::get('quizzes/{quiz}/show_topic', 'QuizController@editTopic')->name('quizzes.showTopic');
Route::post('quizzes/{quiz}/update_topic', 'QuizController@updateTopic')->name('quizzes.updateTopic');
// Route::get('quizzes', 'QuizController@index');
// Route::get('quizzes/{quiz}', 'QuizController@show')->name('quizzes.show');
// Route::get('quizzes/create', 'QuizController@create');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
