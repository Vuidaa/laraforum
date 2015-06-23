@extends('app')
@section('content')
<h1 class='animated lightSpeedIn'>Welcome to Lara-Forum !<br><small>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</small></h1>
@include('pages.includes.breadcrumbs')
@include('pages.includes.global')
@foreach($sections as $section)
<h2><a class='table-heading' href='{{ url('/',$section->slug) }}'>{{$section->title}}</a></h2>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Forum</th><th class='center'>Number of topics</th><th class='center'>Number of posts</th>
		</tr>
	</thead>
	<tbody>
		@foreach($section->forums as $forum)
		<tr>
			<td>
				<h4>
				<a href='{{ url('/', ['section'=>$section->slug,'forum'=>$forum->slug]) }}'>{{$forum->title}}</a>
				</h4><small>{{$forum->description}}</small>
			</td>
			<td class='center'>
				<b>{{$forum->topics->count()}}</b> - Topics<br>
			</td>
			<td class='center'>
				<b>{{$forum->posts()->count()}}</b> - Posts<br>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endforeach
<div class="panel panel-default">
	<div class="panel-body">
		<center><strong>Author - <a href="https://github.com/Vuidaa">Vuidaa</a></strong></center>
	</div>
</div>
@stop