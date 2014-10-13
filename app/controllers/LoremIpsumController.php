<?php

class LoremIpsumController extends BaseController {

  public function getCreate() {
    return View::make('lorem_ipsum');
  }

  public function postCreate() {
    $paragraphs = null;

    $data = Input::all();

    $rules = array(
      'number_of_paragraphs' => array('required', 'numeric', 'between:1,100')
    );

    $validator = Validator::make($data, $rules);

    if($validator->passes()) {
      $generator = new Badcow\LoremIpsum\Generator();
      $paragraphs = $generator->getParagraphs($data['number_of_paragraphs']);
    }
    
    return View::make('lorem_ipsum')
      ->with('paragraphs', $paragraphs)
      ->withErrors($validator);
  }
}
