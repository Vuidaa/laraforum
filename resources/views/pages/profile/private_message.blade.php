@extends('app')
@section('content')
@include('pages.includes.global')
<h2><a href="{{ url('profile', $message->sender->slug) }}">{{$message->sender->username}}</a> wrote...</h2>
<div class="well">{{$message->message}}</div>
<a class='btn btn-default btn-sm' href="{{ url('profile', $message->recipient->slug) }}">Go back</a>
<h4>Answer</h4>
@include('pages.includes.errors')
{!! Form::open(['url'=>['message',$message->sender_id],'method'=>'POST','role'=>'form']) !!}
<div class='form-group'>
	{!! Form::textarea('message',old('message'),['class'=>'form-control','size' => '30x5']) !!}
</div>
<div class='form-group'>
	{!! Form::submit('Send',['class'=>'btn btn-default form-control']) !!}
</div>
{!! Form::close() !!}
@stop