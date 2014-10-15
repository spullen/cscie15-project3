@extends('layouts.main')

@section('body')
<div class="row"><div class="col-md-12 col-sm-12 col-xs-12">
  <p>
    Developer's best friend is an application to generate data that can be used on your own application.
    You can generate Lorem Ipsum text, which can be used to fill in a website. The text is unreadable, which allows the client (or yourself) to focus on the design more than what the text says.
    You can also generate fake user information, which can be used to test your application.
  </p>
  <p>
    <div><a href="{{ action('LoremIpsumController@getCreate') }}">Lorem Ipsum Generator</a></div>
    <div><a href="{{ action('UserGeneratorController@getCreate') }}">User Generator</a></div>
  </p>
</div></div>
@stop