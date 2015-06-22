@extends('app')
@section('content')
<h1>New Topic</h1>
{!! Form::open(['url'=>'topic/create','method'=>'POST']) !!}
@include('pages.topic.fields.fields')
{!! Form::close() !!}
@stop