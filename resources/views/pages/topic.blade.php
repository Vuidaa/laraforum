@extends('app')
@section('content')
<h1 class='animated bounceInRight'>{{$topic->title}}<br>
<small>{{$topic->description}}</small>
</h1>
@include('pages.includes.breadcrumbs')
@include('pages.includes.global')
@if(Auth::user() !== null && Auth::user()->id === $topic->user_id)
<ul class="list-inline pull-right">
	<li>
		<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#topicEditModal">
		<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit topic
		</button>
	</li>
	<li>
		<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#topicDeleteModal">
		<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete topic
		</button>
	</li>
</ul>
<div class="clearfix"></div>
@include('pages.topic.edit')
@include('pages.topic.delete')
@endif
@if(count($posts) > 0)
<ul class="media-list forum">
	@foreach($posts as $post)
	<!-- Forum Post -->
	<li class="media well">
		<div class="pull-left user-info">
			<img src="{{asset('images/avatars/'.$post->user->avatar)}}" class="img-thumbnail" alt="avatar">
			<strong><a class='username' href="{{ url('profile', $post->user->slug) }}">{{$post->user->username}}</a></strong>
			@if($post->user->admin === 1)
			<small style='color:red;'>Admin</small>
			@else
			<small>Member</small>
			@endif
			<small>{{$post->user->city}}</small>
			<small>Joined: <b>{{$post->user->joinedDate()}}</b></small>
		</div>
		<h6>Posted: {{$post->created_at}}</h6>
		<div class="media-body">
			<div class='post-body'>{!! BBCode::parse($post->post_body) !!}</div>
			<hr>
			<small><q>{{$post->user->signature}}</q></small>
			<hr>
		</div>
		<ul class="list-inline pull-right">
			<li>
				<button class='btn btn-default btn-sm comment-link'>
				<span class='glyphicon glyphicon-comment' aria-hidden="true"></span> Answer</button>
			</li>
		</ul>
		<div class='clearfix'></div>
	</li>
	@endforeach
</ul>
{!! $posts->render() !!}
@else
<h4>No posts found.</h4>
@endif
@if(Auth::check())
{!! Form::open(['url'=>['post/create',$topic->id],'method'=>'POST']) !!}
<div class='form-group'>
	@include('pages.includes.wysiwyg')
</div>
<div class='form-group'>
	{!! Form::submit('Post reply',['class'=>'form-control']) !!}
</div>
{!! Form::close() !!}
@else
<h4>Please <strong><a href='{{url('member/login')}}'>login</a></strong> or <strong><a href='{{url('member/register')}}'>register</a></strong> to leave a comment!</h4>
@endif
@stop