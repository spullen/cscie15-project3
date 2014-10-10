<?php

class UserGeneratorController extends BaseController {

  public function getCreate() {
    return View::make('user_generator');
  }

  public function postCreate() {
    $pg = new PasswordGenerator(array('number_of_words' => 4));
    return View::make('user_generator');
  }
}
