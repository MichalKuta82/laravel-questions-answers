@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-6 col-md-offset-3">	
		<h1>{{$question->title}}</h1>

		<p class="lead">{{$question->description}}</p>

		<hr>
		@if(count($question->answers) > 0)
			@foreach($question->answers as $answer)
				<p>{{$answer->content}}</p>
			@endforeach
		@else
			<p>No Answers</p>
		@endif
		<h1>Create Answer</h1>
		
	    <!--<form action="/posts" method="post">-->
		{!! Form::open(['method' => 'POST', 'action' => 'AnswersController@store', 'files' => true]) !!}
		  <input type="hidden" name="question_id" value="{{$question->id}}">
		  <div class="form-group {{$errors->has('content') ? 'has-error' : '' }}">
		    <!--<label for="post_title">Post Title</label>-->
		    {!! Form::label('content', 'Content:', ['for' => 'content']) !!}
		    <!--<input type="text" class="form-control" name="title" placeholder="Post Title">-->
		    {!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Content', 'name' => 'content', 'rows' => 3]) !!}
		    @if($errors->has('content'))
		    	{{$errors->first('content')}}
		    @endif
		  </div>
		  {!! Form::submit('Submit', ['class' => 'btn btn-primary', 'name' => 'submit']) !!}
		  <!--<button type="submit" name="submit" class="btn btn-primary">Create</button>-->
		{!! Form::close() !!}

	</div>
</div>

@stop