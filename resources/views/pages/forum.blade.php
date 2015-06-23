@extends('app')
@section('content')
<div class='row'>
	<h1 class='animated bounceInLeft'>{{$forum->title}}<br>
	<small>{{$forum->description}}</small></h1>
	@include('pages.includes.breadcrumbs')
	@include('pages.includes.global')
	@if(!Auth::check())
	@include('pages.includes.login_note')
	@else
	<ul class="list-inline pull-right">
		<li>
			{!! Form::open(['url'=>['topic/create',$forum->slug],'method'=>'GET']) !!}
			<button type='submit' class='btn btn-primary btn-sm'>
			<span class='glyphicon glyphicon-plus' aria-hidden="true"></span> Create topic</button>
			{!! Form::close() !!}
		</li>
	</ul>
	<div class="clearfix"></div>
	@endif
	<table class="table table-bordered">
		<tbody>
			<tr class='forum-heading'>
				<td>Topic name</td>
				<td class='center'>Author</td>
				<td class='center'>Replies</td>
				<td class='center'>Last message</td>
			</tr>
			@foreach($topics as $topic)
			<tr>
				<td>
					@if($topic->important == 1)
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					@endif
					<a class='forum-topic-title' href='{{ url('/', ['section'=>$section,'forum'=>$forum->slug,'topic'=>$topic->slug]) }}'>{{$topic->title}}</a>
					<br>
					<small class='forum-topic-description'>{{str_limit($topic->description, $limit = 50, $end = '...')}}</small>
				</td>
				<td class='center'><a href='{{ url('profile', $topic->user->slug) }}'>{{$topic->user->username}}</a></td>
				<td class='center'>{{$topic->postsCount}}</td>
				<td class='center'>{{$topic->updated_at}}</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{!! $topics->render() !!}
</div>
@stop
