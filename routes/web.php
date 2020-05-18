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
// Route::get('/',  'HomeController@index');
Route::get('topics', 'TopicController@index')->name('start');
Route::get('topics/{topic}', 'TopicController@show')->name('topics.show');
Route::get('topics/play/{quiz_id}/{topic}/{current}', 'TopicController@showPlay')->name('topics.play');
Route::post('topics/play/myanswer', 'TopicController@storeAnswer')->name('topics.storeAnswer');
Route::post('topics/play/resetUserQuiz', 'TopicController@resetUserQuiz')->name('topics.resetUserQuiz');

Route::get('questions/{question}', 'QuestionController@show')->name('questions.show');
Route::post('questions/myanswer', 'QuestionController@storeAnswer')->name('questions.storeAnswer');

Route::get('/',  'QuizController@indexPublished');

Route::resource('quizzes', 'QuizController');
    
    Route::get('quizzes/{quiz}/show_topic', 'QuizController@editTopic')->name('quizzes.showTopic');
    Route::post('quizzes/{quiz}/update_topic', 'QuizController@updateTopic')->name('quizzes.updateTopic');
    Route::post('quizzes/{id}/update', 'QuizController@update')->name('quizzes.updatePost');
    
Route::group(['middleware' => ['admin']], function () {
    // Route::get('/',  'QuizController@index');
    // Route::resource('quizzes', 'QuizController');
    
    // Route::get('quizzes/{quiz}/show_topic', 'QuizController@editTopic')->name('quizzes.showTopic');
    // Route::post('quizzes/{quiz}/update_topic', 'QuizController@updateTopic')->name('quizzes.updateTopic');
    // Route::post('quizzes/{id}/update', 'QuizController@update')->name('quizzes.updatePost');
    // Route::get('quizzes', 'QuizController@index');
    // Route::get('quizzes/{quiz}', 'QuizController@show')->name('quizzes.show');
    // Route::get('quizzes/create', 'QuizController@create');
});


// Route::resource('quizzes', 'QuizController');
// Route::get('quizzes/{quiz}/show_topic', 'QuizController@editTopic')->name('quizzes.showTopic');
// Route::post('quizzes/{quiz}/update_topic', 'QuizController@updateTopic')->name('quizzes.updateTopic');
// Route::get('quizzes', 'QuizController@index');
// Route::get('quizzes/{quiz}', 'QuizController@show')->name('quizzes.show');
// Route::get('quizzes/create', 'QuizController@create');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
