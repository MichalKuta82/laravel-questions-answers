@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h1>{{$user->name}}'s Profile</h1>
			<p>
				See what {{$user->name}} has been up to on Laravel Answers.
			</p>
		</div>
		<div class="col-md-6">
			<h1>{{$user->name}}'s Image</h1>
		</div>
	</div>
			<hr>

	<div class="row">
		<div class="col-md-6">
			<h3>Questions</h3>
			@foreach($user->questions as $question)
				<div class="panel panel-default">
					<div class="panel-body">
						<h4>{{$question->title}}</h4>
						<p>{{$question->description}}</p>
					</div>
					<div class="panel-footer">
						<a href="{{route('questions.show', $question->id)}}" class="btn btn-link">View Question</a>			
					</div>
				</div>
			@endforeach
		</div>
		<div class="col-md-6">
			<h3>Answers</h3>
			@foreach($user->answers as $answer)
				<div class="panel panel-default">
					<div class="panel-heading">
						{{$answer->question->title}}
					</div>
					<div class="panel-body">
						<p>{{$answer->content}}</p>
						<p>Created by {{$answer->user->name}}</p>
					</div>
					<div class="panel-footer">
						<a href="{{route('questions.show', $answer->question->id)}}" class="btn btn-link">View All Answers For This Question</a>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</div>

@stop