<?php

class UserGeneratorController extends BaseController {

  public function getCreate() {
    return View::make('user_generator');
  }

  public function postCreate() {
    $users = array();
    $data = Input::all();

    $rules = array(
      'number_of_users' => array('required', 'numeric', 'between:1,100'),
      'locale' => array('required', 'in:en_US,fr_FR,de_DE,ru_RU,es_ES,it_IT')
    );

    $includePassword = Input::get('include_password', false);

    if($includePassword) {
      $passwordRules = array(
        'number_of_words' => array('required', 'numeric', 'between:'.PasswordGenerator::minNumberOfWords.','.PasswordGenerator::maxNumberOfWords),
        'separator' => array('in:-,_,.,#')
      );

      $rules = array_merge($rules, $passwordRules);
    }

    $validator = Validator::make($data, $rules);

    $pg = null;   
    if($validator->passes()) {
      $faker = Faker\Factory::create($data['locale']);

      if($includePassword) {
        $pg = new PasswordGenerator($data);
      }

      for($i = 0; $i < $data['number_of_users']; $i++) {
        $user = array();
        $user['name'] = $faker->name;

        if(Input::get('include_email', false)) {
          $user['email'] = $faker->email;
        }

        if(Input::get('include_birthdate', false)) {
          $user['birthdate'] = $faker->date;
        }

        if(Input::get('include_blurb', false)) {
          $user['blurb'] = $faker->text;
        }

        if(Input::get('include_address', false)) {
          $user['address'] = $faker->address;
        }

        if(Input::get('include_uuid', false)) {
          $user['uuid'] = $faker->uuid;
        }

        if($includePassword) {
          $user['password'] = $pg->generate();
        }

        array_push($users, $user);
      }
    }
    
    return View::make('user_generator')
      ->with('users', $users)
      ->withErrors($validator);
  }
}
