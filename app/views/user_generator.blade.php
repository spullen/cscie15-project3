@extends('layouts.main')

@section('body')
  <div class="row"><div class="col-md-12 col-sm-12 col-xs-12">
    <div><a href="/">Home</a></div>
    <div><a href="{{ action('LoremIpsumController@getCreate') }}">Lorem Ipsum Generator</a></div>
    <div class="spacer"></div>
  </div></div>
  <div class="row"><div class="col-md-12 col-sm-12 col-xs-12">
  {{ Form::open(array('action' => 'UserGeneratorController@postCreate', 'class' => 'form-horizontal')) }}
    <div class="form-group {{ $errors->has('number_of_users') ? 'has-error' : '' }}">
      {{ Form::label('number_of_users', 'Number of users', array('class' => 'col-md-2 col-sm-2 control-label')) }}
      <div class="col-md-4 col-sm-4">
        {{ Form::number('number_of_users', Input::get('number_of_users', 5), array('class' => 'form-control', 'min' => 1, 'max' => 100)) }}
        <span class="help-block">Number between 1 and 100</span>
        {{ $errors->first('number_of_users', '<span class="help-block">:message</span>') }}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-offset-2 col-md-6 col-sm-offset-2 col-sm-6">
        <div class="checkbox">
          <label>
            {{ Form::checkbox('include_email', '1', Input::get('include_email', false)) }} Include email?
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-offset-2 col-md-6 col-sm-offset-2 col-sm-6">
        <div class="checkbox">
          <label>
            {{ Form::checkbox('include_birthdate', '1', Input::get('include_birthdate', false)) }} Include birthdate?
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-offset-2 col-md-6 col-sm-offset-2 col-sm-6">
        <div class="checkbox">
          <label>
            {{ Form::checkbox('include_blurb', '1', Input::get('include_blurb', false)) }} Include profile blurb?
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-offset-2 col-md-6 col-sm-offset-2 col-sm-6">
        <div class="checkbox">
          <label>
            {{ Form::checkbox('include_address', '1', Input::get('include_address', false)) }} Include address?
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-offset-2 col-md-6 col-sm-offset-2 col-sm-6">
        <div class="checkbox">
          <label>
            {{ Form::checkbox('include_uuid', '1', Input::get('include_uuid', false)) }} Include UUID?
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-offset-2 col-md-6 col-sm-offset-2 col-sm-6">
        <div class="checkbox">
          <label>
            {{ Form::checkbox('include_password', '1', Input::get('include_password', false), array('id' => 'include_password')) }} Include password?
          </label>
        </div>
      </div>
    </div>
    <div id="password-fields" style="{{ Input::get('include_password') ? '' : 'display: none;' }}">
      <div class="form-group {{ $errors->has('number_of_words') ? 'has-error' : '' }}">
        {{ Form::label('number_of_words', 'Number of words', array('class' => 'col-md-2 col-sm-2 control-label')) }}
        <div class="col-md-4 col-sm-4">
          {{ Form::number('number_of_words', Input::get('number_of_words', PasswordGenerator::minNumberOfWords), 
                array('class' => 'form-control', 'min' => PasswordGenerator::minNumberOfWords, 'max' => PasswordGenerator::maxNumberOfWords)) 
          }}
          <span class="help-block">Number between {{ PasswordGenerator::minNumberOfWords }} and {{ PasswordGenerator::maxNumberOfWords }}</span>
          {{ $errors->first('number_of_words', '<span class="help-block">:message</span>') }}
        </div>
      </div>
      <div class="form-group {{ $errors->has('separator') ? 'has-error' : '' }}">
        {{ Form::label('separator', 'Separator', array('class' => 'col-md-2 col-sm-2 control-label')) }}
        <div class="col-md-3 col-sm-3">
          {{ Form::select('separator', array(
                '' => 'None',
                '-' => 'Hyphen (-)',
                '_' => 'Underscore (_)',
                '.' => 'Dot (.)',
                '#' => 'Hash (#)'
          ), Input::get('separator', ''), array('class' => 'form-control')) }}
          {{ $errors->first('separator', '<span class="help-block">:message</span>') }}
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-offset-2 col-md-6 col-sm-offset-2 col-sm-6">
          <div class="checkbox">
            <label>
              {{ Form::checkbox('include_number', '1', Input::get('include_number', false)) }} Include number?
            </label>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-offset-2 col-md-6 col-sm-offset-2 col-sm-6">
          <div class="checkbox">
            <label>
              {{ Form::checkbox('include_special_character', '1', Input::get('include_special_character', false)) }} Include special character?
            </label>
          </div>
          <span class="help-block">Special characters: !@#$%&</span>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-offset-2 col-md-6 col-sm-offset-2 col-sm-6">
          <div class="checkbox">
            <label>
              {{ Form::checkbox('upper_case_first_letter', '1', Input::get('upper_case_first_letter', false)) }} Upper case first letter?
            </label>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-offset-2 col-md-6 col-sm-offset-2 col-sm-6">
          <div class="checkbox">
            <label>
              {{ Form::checkbox('camel_case', '1', Input::get('camel_case', false)) }} Camel case?
            </label>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group {{ $errors->has('locale') ? 'has-error' : '' }}">
      {{ Form::label('locale', 'Locale', array('class' => 'col-md-2 col-sm-2 control-label')) }}
      <div class="col-md-3 col-sm-3">
        {{ Form::select('locale', array(
              'en_US' => 'United States',
              'fr_FR' => 'France',
              'de_DE' => 'Germany',
              'ru_RU' => 'Russia',
              'es_ES' => 'Spain',
              'it_IT' => 'Italy'
        ), Input::get('locale', 'en_US'), array('class' => 'form-control')) }}
        {{ $errors->first('locale', '<span class="help-block">:message</span>') }}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-offset-2 col-md-6 col-sm-offset-2 col-sm-6">
        {{ Form::submit('Generate', array('class' => 'btn btn-primary')) }}
      </div>
    </div>
  {{ Form::close() }}
  </div></div>

  @if (isset($users))
  <div class="row"><div class="col-md-12 col-sm-12 col-xs-12">
    @foreach ($users as $user)
      <p>
        <h4>{{ $user['name'] }}</h4>
        @if (Input::get('include_birthdate'))
          <p>{{ $user['birthdate'] }}</p>
        @endif

        @if (Input::get('include_email'))
          <p>{{ $user['email'] }}</p>
        @endif

        @if (Input::get('include_address'))
          <p>{{ $user['address'] }}</p>
        @endif

        @if (Input::get('include_blurb'))
          <p>{{ $user['blurb'] }}</p>
        @endif

        @if (Input::get('include_uuid'))
          <p>{{ $user['uuid'] }}</p>
        @endif

        @if (Input::get('include_password'))
          <p>{{ $user['password'] }}</p>
        @endif
      </p>
    @endforeach
  </div></div>
  @endif
  
@stop

@section('javascripts')
  @parent
  <script src="{{ asset('js/user_generator.js') }}"></script>
@stop