@include('pages.includes.errors')

<div class='form-group'>
	{!! Form::label('forum_id', 'Forum')!!}
	{!! Form::select('forum_id',$data, null,['class'=>'form-control'])!!}
</div>
<div class='form-group'>
	{!! Form::label('title', 'Title')!!}
	{!! Form::text('title', old('title'), ['class'=>'form-control'])!!}
	<span class="help-block">Enter up to 50 characters (including spaces)</span>
</div>

<div class='form-group'>
	{!! Form::label('description', 'Description')!!}
	{!! Form::textarea('description', old('description'), ['class'=>'form-control','rows'=>3])!!}
</div>

<div class='form-group'>
	{!! Form::label('post_body', 'Post')!!}
	@include('pages.includes.wysiwyg')
</div>
<div class='form-group'>
	{!! Form::submit('Process',['class'=>'btn btn-default form-control']) !!}
</div>
