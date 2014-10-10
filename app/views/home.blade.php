@extends('layouts.main')

@section('body')
  <p>
    TODO: about this site
  </p>
  <p>
    <div><a href="{{ action('LoremIpsumController@getCreate') }}">Lorem Ipsum Generator</a></div>
    <div><a href="{{ action('UserGeneratorController@getCreate') }}">User Generator</a></div>
  </p>
@stop