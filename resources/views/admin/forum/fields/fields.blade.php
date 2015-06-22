<div class='form-group'>
	{!! Form::label('section_id', 'Section')!!}
	{!! Form::select('section_id',array('default' => 'Please Select') + $sections,'default',['class'=>'form-control'])!!}
	@if($errors->has('section_id'))
		<div class='alert alert-danger'>{{$errors->first('section_id')}}</div>
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
	{!! Form::label('description', 'Description')!!}
	{!! Form::textarea('description', old('description'), ['class'=>'form-control'])!!}
	@if($errors->has('description'))
		<div class='alert alert-danger'>{{$errors->first('description')}}</div>
	@endif
</div>

<div class='form-group'>
	{!! Form::submit('Process',['class'=>'btn btn-default']) !!}
</div>
