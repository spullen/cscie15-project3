@extends('layouts.main')

@section('body')
<div class="row"><div class="col-md-12 col-sm-12 col-xs-12">
  <p>
    TODO: about this site
  </p>
  <p>
    <div><a href="{{ action('LoremIpsumController@getCreate') }}">Lorem Ipsum Generator</a></div>
    <div><a href="{{ action('UserGeneratorController@getCreate') }}">User Generator</a></div>
  </p>
</div></div>
@stop