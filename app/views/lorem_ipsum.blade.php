@extends('layouts.main')

@section('body')
  {{ Form::open(array('action' => 'LoremIpsumController@postCreate', 'class' => 'form-horizontal')) }}
    <div class="form-group {{ $errors->has('number_of_paragraphs') ? 'has-error' : '' }}">
      {{ Form::label('number_of_paragraphs', 'Number of paragraphs', array('class' => 'col-md-2 col-sm-2 control-label')) }}
      <div class="col-md-4 col-sm-4">
        {{ Form::number('number_of_paragraphs', Input::get('number_of_paragraphs', 5), array('class' => 'form-control', 'min' => 1, 'max' => 100)) }}
        <span class="help-block">Number between 1 and 100</span>
        {{ $errors->first('number_of_paragraphs', '<span class="help-block">:message</span>') }}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-offset-2 col-md-6 col-sm-offset-2 col-sm-6">
        {{ Form::submit('Generate', array('class' => 'btn btn-primary')) }}
      </div>
    </div>
  {{ Form::close() }}

  <div>
    @if (isset($paragraphs))
      @foreach ($paragraphs as $paragraph)
        <p>{{ $paragraph }}</p>
      @endforeach
    @endif
  </div>
@stop