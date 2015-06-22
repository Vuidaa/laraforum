@extends('admin.app-admin')

@section('content')
	<h1> Edit Section </h1>
	{!! Form::model($section,['url'=>['admin/section','id'=>$section->id],'method'=>'PATCH']) !!}
		@include('admin.section.fields.fields')
	{!! Form::close() !!}
@stop