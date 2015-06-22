<h3>Change password</h3>
<hr>
{!! Form::open(['url'=>'profile/password','method'=>'POST']) !!}
<div class='form-group'>
	{!! Form::label('old_password','Old password')!!}
	{!! Form::password('old_password',['class'=>'form-control'])!!}
</div>
<div class='form-group'>
	{!! Form::label('password','New password')!!}
	{!! Form::password('password',['class'=>'form-control'])!!}
</div>
<div class='form-group'>
	{!! Form::label('password_confirmation','New password again')!!}
	{!! Form::password('password_confirmation',['class'=>'form-control'])!!}
</div>
<div class='form-group'>
	{!! Form::submit('Change',['class'=>'btn btn-default'])!!}
</div>
{!! Form::close() !!}