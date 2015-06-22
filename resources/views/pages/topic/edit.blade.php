<!-- Modal-->
<div class="modal fade" id="topicEditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit topic details</h4>
      </div>
      <div class="modal-body">
        {!! Form::model($topic, array('url' => array('topic/edit', $topic->id),'method' => 'PUT')) !!}
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
          {!! Form::submit('Save changes',['class'=>'btn btn-default']) !!}
        </div>
        {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>