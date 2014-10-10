@extends('layouts.main')

@section('body')
  {{ Form::open(array('action' => 'UserGeneratorController@postCreate', 'class' => 'form-horizontal')) }}
    <div class="form-group">
      {{ Form::label('number_of_users', 'Number of users', array('class' => 'col-md-2 col-sm-2 control-label')) }}
      <div class="col-md-2 col-sm-2">
        {{ Form::number('number_of_users', isset($numberOfUsers) ? $numberOfUsers : 5, array('class' => 'form-control')) }}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-offset-2 col-md-6 col-sm-offset-2 col-sm-6">
        <div class="checkbox">
          <label>
            {{ Form::checkbox('include_email', '1', (isset($includeEmail) && $includeEmail)) }} Include email?
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-offset-2 col-md-6 col-sm-offset-2 col-sm-6">
        <div class="checkbox">
          <label>
            {{ Form::checkbox('include_uuid', '1', (isset($includeUUID) && $includeUUID)) }} Include UUID?
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-offset-2 col-md-6 col-sm-offset-2 col-sm-6">
        <div class="checkbox">
          <label>
            {{ Form::checkbox('include_birthdate', '1', (isset($includeBirthdate) && $includeBirthdate)) }} Include birthdate?
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-offset-2 col-md-6 col-sm-offset-2 col-sm-6">
        <div class="checkbox">
          <label>
            {{ Form::checkbox('include_location', '1', (isset($includeLocation) && $includeLocation)) }} Include location?
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('locale', 'Locale', array('class' => 'col-md-2 col-sm-2 control-label')) }}
      <div class="col-md-2 col-sm-2">
        {{ Form::select('locale', array(
              'en_US' => 'United States',
              'fr_FR' => 'France',
              'de_DE' => 'Germany',
              'jp_JP' => 'Japan',
              'ru_RU' => 'Russia',
              'es_ES' => 'Spain',
              'it_IT' => 'Italy'
        ), isset($locale) ? $locale : 'en_US', array('class' => 'form-control')) }}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-offset-2 col-md-6 col-sm-offset-2 col-sm-6">
        {{ Form::submit('Generate', array('class' => 'btn btn-primary')) }}
      </div>
    </div>
  {{ Form::close() }}
@stop