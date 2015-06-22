<div class='form-group'>
	{!! Form::label('title', 'Title')!!}
	{!! Form::text('title', old('title'), ['class'=>'form-control'])!!}
	@if($errors->has('title'))
		<div class='alert alert-danger'>{{$errors->first('title')}}</div>
	@endif
</div>

<div class='form-group'>
	{!! Form::submit('Process',['class'=>'btn btn-default']) !!}
</div>
