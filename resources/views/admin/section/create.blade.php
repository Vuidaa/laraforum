@extends('admin.app-admin')

@section('content')
	<h3> Create new Section </h3>
	{!! Form::open(['url'=>'admin/section','method'=>'POST']) !!}
		@include('admin.section.fields.fields')
	{!! Form::close() !!}
@stop