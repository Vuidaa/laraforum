@extends('app')
@section('content')
@include('pages.includes.breadcrumbs')
@include('pages.includes.global')
<div class="row">
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="text-left">
			<img src="{{asset('images/avatars/'.$user->avatar)}}" class="img-thumbnail" alt="avatar" >
			<h6>Upload a different photo...</h6>
			{!! Form::open(['url'=>'profile/avatar','files'=>true]) !!}
			<div class='form-group '>
				{!! Form::file('avatar') !!}<br>
				{!! Form::submit('Change',['class'=>'btn btn-default btn-sm']) !!}
			</div>
			{!! Form::close() !!}
		</div>
	</div>
	<div class='col-md-9'>
		@include('pages.includes.errors')
		<div role="tabpanel">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Profile Summary</a></li>
				<li role="presentation"><a href="#details" aria-controls="details" role="tab" data-toggle="tab">Edit</a></li>
				<li role="presentation"><a href="#password" aria-controls="password" role="tab" data-toggle="tab">Password</a></li>
				<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">
					@if($new)
					<span class="label label-primary">new</span>
					@endif
				Messages</a>
			</li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="home">
				@include('pages.profile.tabs.summary')
			</div>
			<div role="tabpanel" class="tab-pane" id="details">
				@include('pages.profile.tabs.edit')
			</div>
			<div role="tabpanel" class="tab-pane" id="password">
				@include('pages.profile.tabs.password')
			</div>
			<div role="tabpanel" class="tab-pane" id="messages">
				@include('pages.profile.tabs.messages')
			</div>
		</div>
	</div>
</div>
</div>
@stop