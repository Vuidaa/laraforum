@extends('admin.app-admin')

@section('content')
	<h1> Edit forum </h1>
	{!! Form::model($forum,['url'=>['admin/forum','id'=>$forum->id],'method'=>'PATCH']) !!}
		@include('admin.forum.fields.fields')
	{!! Form::close() !!}
@stop