@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-6 col-md-offset-3">	
		<h1>{{$question->title}}</h1>

		<p class="lead">{{$question->description}}</p>

	</div>
</div>

@stop