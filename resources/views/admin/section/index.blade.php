@extends('admin.app-admin')

@section('content')
	<h1>Section</h1>
	<p> List of core sections available at site. </p>
	@if(Session::has('global'))
		<div class='alert alert-{{Session::get('global.class')}}'>{{Session::get('global.message')}} </div>
	@endif
	<ul class='list-inline'>
		<li><a href=" {{url('admin/section/create')}}">+Create</a></li>
	</ul>
	<table id="table_id" class="display cell-border">
		<thead>
			<tr>
				<th>#ID</th><th>Title</th><th>Slug</th><th>Forums</th><th>Created</th><th>Edit</th><th>Delete</th>
			</tr>
		</thead>
		<tbody>
			@foreach($sections as $section)
				<tr>
					<td>{{$section->id}}</td>
					<td>{{str_limit($section->title, $limit = 30, $end = '...')}}</td>
					<td>{{$section->slug}}</td>
					<td>{{$section->forums->count()}}</td>
					<td>{{$section->created_at}}</td>
					<td> <a class='btn btn-info' href="{{ url("admin/section/$section->id/edit") }}">Edit</a></td>
					<td>
						{!! Form::open(['url'=>['admin/section',$section->id],'method'=>'DELETE']) !!}
							{!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop