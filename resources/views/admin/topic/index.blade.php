@extends('admin.app-admin')

@section('content')
	<h1>Topic</h1>
	@if(Session::has('global'))
		<div class='alert alert-{{Session::get('global.class')}}'>{{Session::get('global.message')}} </div>
	@endif
	<table id="table_id" class="display cell-border">
		<thead>
			<tr>
<th>#ID</th><th>Title</th><th>Slug</th><th>Description</th><th>Forum</th><th>Author</th><th>Posts</th><th>Important?</th><th>Created</th><th>Edit</th><th>Delete</th>
			</tr>
		</thead>
		<tbody>
			@foreach($topics as $topic)
				<tr>
					<td>{{$topic->id}}</td>
					<td>{{str_limit($topic->title, $limit = 30, $end = '...')}}</td>
					<td>{{str_limit($topic->slug, $limit = 30, $end = '...')}}</td>
					<td>{{str_limit($topic->description, $limit = 30, $end = '...')}}</td>
					<td><a href='{{ url('admin/forum', $topic->forum->id) }}'>{{$topic->forum->title}}</a></td>
					<td>{{$topic->user->email}}</td>
					<td>Posts</td>
					<td>{{($topic->important == 1 ? 'Yes' : 'No')}}</td>
					<td>{{$topic->created_at}}</td>
					<td> <a class='btn btn-info' href="{{ url("admin/topic/$topic->id/edit") }}">Edit</a></td>
					<td>
						{!! Form::open(['url'=>['admin/topic',$topic->id],'method'=>'DELETE']) !!}
							{!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@stop