@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Enter An Address To Get Weather</h1>

            <!--<form action="/posts" method="post">-->
            {!! Form::open(['method' => 'POST', 'action' => 'ApiController@postWeather']) !!}
              <div class="form-group {{$errors->has('location') ? 'has-error' : '' }}">
                <!--<label for="post_title">Post Title</label>-->
                {!! Form::label('location', 'Location:', ['for' => 'location']) !!}
                <!--<input type="text" class="form-control" name="title" placeholder="Post Title">-->
                {!! Form::text('location', null, ['class' => 'form-control', 'placeholder' => 'Enter Zipcode Or Address', 'name' => 'location']) !!}
                @if($errors->has('location'))
                    {{$errors->first('location')}}
                @endif
              </div>
              {!! Form::submit('Submit', ['class' => 'btn btn-primary', 'value' => 'Get Weather']) !!}
              <!--<button type="submit" name="submit" class="btn btn-primary">Create</button>-->
            {!! Form::close() !!}
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Address</h1>

            <hr>
            <p>{{$weather->hourly->summary}}</p>
            <ul>
                <li>Current Temp: {{$weather->currently->temperature}}</li>
                <li>Feels Like: {{$weather->currently->apparentTemperature}}</li>
                <li>Wind Speed: {{$weather->currently->windSpeed}}</li>
            </ul>
        </div>
    </div>
</div>
@endsection
