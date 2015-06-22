<div class='form-group'>
	{!! Form::label('forum_id', 'Forum')!!}
	{!! Form::select('forum_id',array('default' => 'Please Select') + $forums,$topic->forum->id,['class'=>'form-control'])!!}
	@if($errors->has('forum_id'))
		<div class='alert alert-danger'>{{$errors->first('forum_id')}}</div>
	@endif
</div>

<div class='form-group'>
	{!! Form::label('title', 'Title')!!}
	{!! Form::text('title', old('title'), ['class'=>'form-control'])!!}
	@if($errors->has('title'))
		<div class='alert alert-danger'>{{$errors->first('title')}}</div>
	@endif
</div>

<div class='form-group'>
	{!! Form::label('description', 'description')!!}
	{!! Form::text('description', old('description'), ['class'=>'form-control'])!!}
	@if($errors->has('description'))
		<div class='alert alert-danger'>{{$errors->first('description')}}</div>
	@endif
</div>

<div class='form-group'>
	{!! Form::label('important', 'Important?')!!}
	{!! Form::select('important',['0'=>'No','1'=>'Yes'],null,['class'=>'form-control'])!!}
	@if($errors->has('important'))
		<div class='alert alert-danger'>{{$errors->first('important')}}</div>
	@endif
</div>


<div class='form-group'>
	{!! Form::submit('Process',['class'=>'btn btn-default']) !!}
</div>
