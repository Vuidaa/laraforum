@if(Session::has('global'))
<div class="alert alert-{{Session::get('global.class')}} alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<strong>{{Session::get('global.message')}}</strong>
</div>
@endif