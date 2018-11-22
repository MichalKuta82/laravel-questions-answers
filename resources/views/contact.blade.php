@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-6 col-md-offset-3">  
        <h1>Contact Us</h1>
        
        <!--<form action="/posts" method="post">-->
        {!! Form::open(['method' => 'POST', 'action' => 'PageController@contact']) !!}
          <div class="form-group {{$errors->has('name') ? 'has-error' : '' }}">
            <!--<label for="post_title">Post Title</label>-->
            {!! Form::label('name', 'Name:', ['for' => 'name']) !!}
            <!--<input type="text" class="form-control" name="title" placeholder="Post Title">-->
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name', 'name' => 'name']) !!}
            @if($errors->has('name'))
                {{$errors->first('name')}}
            @endif
          </div>
          <div class="form-group {{$errors->has('email') ? 'has-error' : '' }}">
            <!--<label for="post_title">Post Title</label>-->
            {!! Form::label('email', 'Email:', ['for' => 'email']) !!}
            <!--<input type="text" class="form-control" name="title" placeholder="Post Title">-->
            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'name' => 'email']) !!}
            @if($errors->has('email'))
                {{$errors->first('email')}}
            @endif
          </div>
          <div class="form-group {{$errors->has('subject') ? 'has-error' : '' }}">
            <!--<label for="post_title">Post Title</label>-->
            {!! Form::label('subject', 'Subject:', ['for' => 'subject']) !!}
            <!--<input type="text" class="form-control" name="title" placeholder="Post Title">-->
            {!! Form::text('subject', null, ['class' => 'form-control', 'placeholder' => 'Subject', 'name' => 'subject']) !!}
            @if($errors->has('subject'))
                {{$errors->first('subject')}}
            @endif
          </div>
          <div class="form-group {{$errors->has('message') ? 'has-error' : '' }}">
            <!--<label for="post_title">Post Title</label>-->
            {!! Form::label('message', 'Message:', ['for' => 'message']) !!}
            <!--<input type="text" class="form-control" name="title" placeholder="Post Title">-->
            {!! Form::textarea('message', null, ['class' => 'form-control', 'placeholder' => 'Message', 'name' => 'message']) !!}
            @if($errors->has('message'))
                {{$errors->first('message')}}
            @endif
          </div>
          {!! Form::submit('Submit', ['class' => 'btn btn-primary', 'name' => 'submit']) !!}
          <!--<button type="submit" name="submit" class="btn btn-primary">Create</button>-->
        {!! Form::close() !!}
    </div>
</div>
@endsection