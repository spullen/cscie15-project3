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

    $validator = Validator::make($data, $rules);

    if($validator->passes()) {
      $faker = Faker\Factory::create($data['locale']);

      //$pg = new PasswordGenerator(array('number_of_words' => 4));

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

        array_push($users, $user);
      }
    }
    
    return View::make('user_generator')
      ->with('users', $users)
      ->withErrors($validator);
  }
}
