@extends('layouts.main')

@section('body')
  <p>
    TODO: about this site
  </p>
  <p>
    <div><a href="{{ url('/lorem-ipsum') }}">Lorem Ipsum Generator</a></div>
    <div><a href="{{ url('/user-generator') }}">User Generator</a></div>
  </p>
@stop