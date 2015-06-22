@extends('app')
@section('content')
@include('pages.includes.breadcrumbs')
@include('pages.includes.global')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="well well-sm">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <img src="{{asset('images/avatars/'.$user->avatar)}}" class="img-thumbnail" alt="avatar" >
                </div>
                <div class="col-sm-6 col-md-8">
                    <h4>{{$user->username}}</h4>
                    <hr>
                    <small><i class="glyphicon glyphicon-home"></i> City -
                    <b>{{$user->city}}</b>
                    </small>
                    <br>
                    <small><i class="glyphicon glyphicon-envelope"></i> Email -
                    <b>{{$user->email}}</b>
                    </small>
                    <br>
                    <small><i class="glyphicon glyphicon-gift"></i> Joined -
                    <b>{{$user->joinedDate()}}</b>
                    </small>
                    <hr>
                    <small><i class="glyphicon glyphicon-list-alt"></i> Topics -
                    <b>{{$user->topics()->count()}}</b>
                    </small>
                    <br>
                    <small><i class="glyphicon glyphicon-pencil"></i> Messages -
                    <b>{{$user->posts()->count()}}</b>
                    </small>
                    <br>
                    <br>
                    <q>{{$user->signature}}</q>
                    <h5>Send a private message</h5>
                    @include('pages.includes.errors')
                    {!! Form::open(['url'=>['message',$user->id],'method'=>'POST','role'=>'form']) !!}
                    <div class='form-group'>
                        {!! Form::textarea('message',old('message'),['class'=>'form-control','size' => '30x3']) !!}
                    </div>
                    <div class='form-group'>
                        {!! Form::submit('Send',['class'=>'btn btn-default form-control']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop