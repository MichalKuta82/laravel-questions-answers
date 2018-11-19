@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-6 col-md-offset-3">	
		<h1>All Questions</h1>
		<a href="{{route('questions.create')}}" class="btn btn-primary btn-sm">Ask A Question</a>

		<table class="table">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">Id</th>
		      <th scope="col">Title</th>
		      <th scope="col">Description</th>
		      <th scope="col">Created At</th>
		      <th scope="col">Updated At</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@if($questions)
			  	@foreach($questions as $question)
				    <tr>
				      <td>{{$question->id}}</td>
				      <td>{{$question->title}}</td>
				      <td>{{$question->description}}</td>
				      <td>{{$question->created_at->toDayDateTimeString()}}</td>
				      <td>{{$question->updated_at->toDayDateTimeString()}}</td>
				      <td><a href="{{route('questions.show', $question->id)}}" class="btn btn-primary btn-sm">View question</a></td>
				    </tr>
			    @endforeach
		    @endif
		  </tbody>
		</table>
		{{ $questions->links() }}  
@stop