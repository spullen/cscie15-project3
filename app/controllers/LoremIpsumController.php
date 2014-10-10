<?php

class LoremIpsumController extends BaseController {

  public function getCreate() {
    return View::make('lorem_ipsum');
  }

  public function postCreate() {
    $numberOfParagraphs = Input::get('number_of_paragraphs');

    $generator = new Badcow\LoremIpsum\Generator();
    $paragraphs = $generator->getParagraphs($numberOfParagraphs);

    return View::make('lorem_ipsum')
      ->with('paragraphs', $paragraphs);
  }
}
