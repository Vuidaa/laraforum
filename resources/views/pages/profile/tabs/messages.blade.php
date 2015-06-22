@if(count($user->received_messages))
<h3>Inbox</h3>
<table class="table table-condensed">
  <thead>
    <tr>
      <th>Sent by:</th>
      <th>Message:</th>
      <th>Date:</th>
    </tr>
  </thead>
  <tbody>
    @foreach($user->received_messages as $message)
    <tr class="{{$message->status}}-message">
      <td><a href="{{ url('profile', $message->sender->slug) }}">{{$message->sender->name}}</a></td>
      <td><a href="{{url('message',$message->id)}}">{{str_limit($message->message, $limit = 30, $end = '...')}}</a></td>
      <td>{{$message->created_at}}</td>
      <td>
        {!! Form::open(['url'=>['message/delete',$message->id],'method'=>'DELETE']) !!}
        {!! Form::submit('Delete',['class'=>'btn btn-danger btn-sm']) !!}
        {!! Form::close() !!}
      </tr>
      @endforeach
    </tbody>
  </table>
  @else
  <h4>No messages received.</h4>
  @endif