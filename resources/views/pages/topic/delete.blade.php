<div class="modal fade" id="topicDeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete topic - {{$topic->title}}</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger" role="alert">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span>
          <b>Attention</b><br><br>
          <small>All data will be lost !</small>
        </div>
        {!! Form::open(['url'=>['topic/delete',$topic->id],'method'=>'DELETE']) !!}
        {!! Form::submit('Delete Topic',['class'=>'btn btn-danger']) !!}
        {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>