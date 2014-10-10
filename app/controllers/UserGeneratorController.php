<?php

class UserGeneratorController extends BaseController {

  public function getCreate() {
    return View::make('user_generator');
  }

  public function postCreate() {
    $faker = Faker\Factory::create(Input::get('locale'));

    //$pg = new PasswordGenerator(array('number_of_words' => 4));

    $numberOfUsers = Input::get('number_of_users');

    $users = array();
    for($i = 0; $i < $numberOfUsers; $i++) {
      $user = array();
      $user['name'] = $faker->name;

      if(Input::get('include_email')) {
        $user['email'] = $faker->email;
      }

      if(Input::get('include_birthdate')) {
        $user['birthdate'] = $faker->date;
      }

      if(Input::get('include_blurb')) {
        $user['blurb'] = $faker->text;
      }

      if(Input::get('include_address')) {
        $user['address'] = $faker->address;
      }

      if(Input::get('include_uuid')) {
        $user['uuid'] = $faker->uuid;
      }

      array_push($users, $user);
    }

    return View::make('user_generator')
      ->with('users', $users);
  }
}
