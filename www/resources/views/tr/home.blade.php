@extends('app')
@section('content')
    <h1>{{ $company_name }}</h1>
    {!! Html::image(url('img/phpness.jpg'), 'phpness', array('class' => 'img-responsive center-block') ) !!}
@stop
@section('footer')
@stop