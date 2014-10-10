@extends('layouts.main')

@section('body')
  {{ Form::open(array('action' => 'LoremIpsumController@postCreate', 'class' => 'form-inline')) }}
    <div class="form-group">
      {{ Form::label('number_of_paragraphs', 'Number of paragraphs', array('class' => 'control-label')) }}
      {{ Form::number('number_of_paragraphs', isset($numberOfParagraphs) ? $numberOfParagraphs : 5, array('class' => 'form-control')) }}
      {{ Form::submit('Generate', array('class' => 'btn btn-primary')) }}
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