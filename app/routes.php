<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('home');
});

Route::get('/lorem-ipsum', function() {
  return View::make('lorem_ipsum');
});

Route::post('/lorem-ipsum', array(
  'as' => 'generate_lorem_ipsum',
  function() {
    $numberOfParagraphs = Input::get('number_of_paragraphs');

    $generator = new Badcow\LoremIpsum\Generator();
    $paragraphs = $generator->getParagraphs($numberOfParagraphs);

    return View::make('lorem_ipsum')
      ->with('numberOfParagraphs', $numberOfParagraphs)
      ->with('paragraphs', $paragraphs);
  }
));

Route::get('/user-generator', function() {
  return View::make('user_generator');
});

Route::post('/user-generator', function() {
  return View::make('user_generator');
});
