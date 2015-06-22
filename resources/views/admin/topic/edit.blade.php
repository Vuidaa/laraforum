@extends('admin.app-admin')

@section('content')
	<h1> Edit topic </h1>
	{!! Form::model($topic,['url'=>['admin/topic','id'=>$topic->id],'method'=>'PATCH']) !!}
		@include('admin.topic.fields.fields')
	{!! Form::close() !!}
@stop