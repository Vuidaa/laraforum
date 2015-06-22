<h3>Edit profile</h3>
<hr>
{!! Form::model($user,['url'=>'profile','method'=>'PATCH']) !!}
<div class='form-group'>
	{!! Form::label('name','Name')!!}
	{!! Form::text('name',old('name'),['class'=>'form-control'])!!}
</div>
<div class='form-group'>
	{!! Form::label('email','Email')!!}
	{!! Form::email('email',old('email'),['class'=>'form-control'])!!}
</div>
<div class='form-group'>
	{!! Form::label('city','City')!!}
	{!! Form::text('city',old('city'),['class'=>'form-control'])!!}
</div>
<div class='form-group'>
	{!! Form::label('signature','Signature')!!}
	{!! Form::text('signature',old('signature'),['class'=>'form-control'])!!}
</div>
<div class='form-group'>
	{!! Form::submit('Update',['class'=>'btn btn-default'])!!}
</div>

{!! Form::close() !!}