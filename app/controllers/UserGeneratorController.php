<?php

class UserGeneratorController extends BaseController {

  public function getCreate() {
    return View::make('user_generator');
  }

  public function postCreate() {
    $faker = Faker\Factory::create();

    $pg = new PasswordGenerator(array('number_of_words' => 4));

    $numberOfUsers = Input::get('number_of_words');

    $users = array();
    for($i = 0; $i < $numberOfUsers; $i++) {

    }

    return View::make('user_generator')
      ->with('users', $users);
  }
}
