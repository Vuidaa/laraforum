@extends('admin.app-admin')

@section('content')
	<h3> Create new forum </h3>
	{!! Form::open(['url'=>'admin/forum','method'=>'POST']) !!}
		@include('admin.forum.fields.fields')
	{!! Form::close() !!}
@stop