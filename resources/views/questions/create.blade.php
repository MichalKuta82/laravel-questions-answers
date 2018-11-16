@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-6 col-md-offset-3">	
		<h1>Ask a Question</h1>
		
	    <!--<form action="/posts" method="post">-->
		{!! Form::open(['method' => 'POST', 'action' => 'QuestionController@store', 'files' => true]) !!}
		  <div class="form-group {{$errors->has('title') ? 'has-error' : '' }}">
		    <!--<label for="post_title">Post Title</label>-->
		    {!! Form::label('title', 'Title:', ['for' => 'title']) !!}
		    <!--<input type="text" class="form-control" name="title" placeholder="Post Title">-->
		    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title', 'name' => 'title']) !!}
		    @if($errors->has('title'))
		    	{{$errors->first('title')}}
		    @endif
		  </div>
		  <div class="form-group {{$errors->has('description') ? 'has-error' : '' }}">
		    <!--<label for="post_title">Post Title</label>-->
		    {!! Form::label('description', 'Description:', ['for' => 'description']) !!}
		    <!--<input type="text" class="form-control" name="title" placeholder="Post Title">-->
		    {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description', 'name' => 'description']) !!}
		    @if($errors->has('description'))
		    	{{$errors->first('description')}}
		    @endif
		  </div>
		  {!! Form::submit('Submit', ['class' => 'btn btn-primary', 'name' => 'submit']) !!}
		  <!--<button type="submit" name="submit" class="btn btn-primary">Create</button>-->
		{!! Form::close() !!}
	</div>
</div>

@stop