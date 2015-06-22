@extends('admin.app-admin')
@section('content')
<h1>Forum</h1>
@if(Session::has('global'))
<div class='alert alert-{{Session::get('global.class')}}'>{{Session::get('global.message')}} </div>
@endif
<ul class='list-inline'>
	<li><a href=" {{url('admin/forum/create')}}">+Create</a></li>
</ul>
<table id="table_id" class="display cell-border">
	<thead>
		<tr>
			<th>#ID</th><th>Title</th><th>Slug</th><th>Description</th><th>No of topics</th><th>Section</th><th>Created</th><th>Edit</th><th>Delete</th>
		</tr>
	</thead>
	<tbody>
		@foreach($forums as $forum)
		<tr>
			<td>{{$forum->id}}</td>
			<td>{{str_limit($forum->title, $limit = 30, $end = '...')}}</td>
			<td>{{str_limit($forum->slug, $limit = 30, $end = '...')}}</td>
			<td>{{str_limit($forum->description, $limit = 30, $end = '...')}}</td>
			<td>{{$forum->topics->count()}}</td>
			<td><a href="{{ url('admin/section', $forum->section->id) }}">{{$forum->section->title}}</a></td>
			<td>{{$forum->created_at}}</td>
			<td> <a class='btn btn-info' href="{{ url("admin/forum/$forum->id/edit") }}">Edit</a></td>
			<td>
				{!! Form::open(['url'=>['admin/forum',$forum->id],'method'=>'DELETE']) !!}
				{!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
				{!! Form::close() !!}
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@stop