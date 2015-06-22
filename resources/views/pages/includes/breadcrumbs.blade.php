<ul class="breadcrumb">
	<li><a href='/'>Home</a></li>
	@foreach($bread as $title=>$slug)
		<li><a href='{{url($slug)}}'>{{$title}}</a></li>
	@endforeach
</ul>