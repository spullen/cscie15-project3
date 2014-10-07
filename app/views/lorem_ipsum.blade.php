@extends('layouts.main')

@section('body')
  {{ Form::open(array('route' => 'generate_lorem_ipsum', 'class' => 'form-inline')) }}
    <div class="form-group">
      {{ Form::label('number_of_paragraphs', 'Number of paragraphs') }}
      {{ Form::number('number_of_paragraphs', isset($numberOfParagraphs) ? $numberOfParagraphs : 5) }}
      {{ Form::submit('Generate') }}
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