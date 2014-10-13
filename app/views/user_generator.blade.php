@extends('layouts.main')

@section('body')
  {{ Form::open(array('action' => 'UserGeneratorController@postCreate', 'class' => 'form-horizontal')) }}
    <div class="form-group {{ $errors->has('number_of_users') ? 'has-error' : '' }}">
      {{ Form::label('number_of_users', 'Number of users', array('class' => 'col-md-2 col-sm-2 control-label')) }}
      <div class="col-md-4 col-sm-4">
        {{ Form::number('number_of_users', Input::get('number_of_users', 5), array('class' => 'form-control')) }}
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

  <div>
    @if (isset($users))
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
        </p>
      @endforeach
    @endif
  </div>
@stop