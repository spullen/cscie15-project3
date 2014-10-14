<?php

class UserGeneratorController extends BaseController {

  public function getCreate() {
    return View::make('user_generator');
  }

  public function postCreate() {
    $users = array();
    $data = Input::only('number_of_users', 'locale', 'include_email', 'include_birthdate', 
      'include_blurb', 'include_address', 'include_uuid', 'include_password');

    $rules = array(
      'number_of_users' => array('required', 'numeric', 'between:1,100'),
      'locale' => array('required', 'in:en_US,fr_FR,de_DE,ru_RU,es_ES,it_IT')
    );

    $validator = Validator::make($data, $rules);

    $includePassword = array_key_exists('include_password', $data) && $data['include_password'];

    $pg = null;
    if($includePassword) {
      $passwordData = Input::only('number_of_words', 'separator', 'include_number', 
      'include_special_character', 'upper_case_first_letter', 'camel_case');

      $passwordRules = array(
        'number_of_words' => array('required', 'numeric', 'between:'.PasswordGenerator::minNumberOfWords.','.PasswordGenerator::maxNumberOfWords),
        'separator' => array('required', 'in:,-,_,.,#')
      );

      $passwordValidator = Validator::make($passwordData, $passwordRules);

      if($passwordValidator->passes()) {
        $pg = new PasswordGenerator($passwordData);
      } else {
        // merge validator
      }
    }
    
    if($validator->passes()) {
      $faker = Faker\Factory::create($data['locale']);

      for($i = 0; $i < $data['number_of_users']; $i++) {
        $user = array();
        $user['name'] = $faker->name;

        if(array_key_exists('include_email', $data) && $data['include_email']) {
          $user['email'] = $faker->email;
        }

        if(array_key_exists('include_birthdate', $data) && $data['include_birthdate']) {
          $user['birthdate'] = $faker->date;
        }

        if(array_key_exists('include_blurb', $data) && $data['include_blurb']) {
          $user['blurb'] = $faker->text;
        }

        if(array_key_exists('include_address', $data) && $data['include_address']) {
          $user['address'] = $faker->address;
        }

        if(array_key_exists('include_uuid', $data) && $data['include_uuid']) {
          $user['uuid'] = $faker->uuid;
        }

        if($includePassword) {
          //$user['password'] = $pg->generate();
        }

        array_push($users, $user);
      }
    }
    
    return View::make('user_generator')
      ->with('users', $users)
      ->withErrors($validator);
  }
}
