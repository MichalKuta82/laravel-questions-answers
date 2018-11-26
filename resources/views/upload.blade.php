@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Upload Profile Picture</h1>

            <!--<form action="/posts" method="post">-->
            {!! Form::open(['method' => 'POST', 'action' => 'UploadController@postUpload', 'files' => true]) !!}
              <div class="form-group {{$errors->has('picture') ? 'has-error' : '' }}">
                <!--<label for="post_title">Post Title</label>-->
                {!! Form::label('picture', 'Picture:', ['for' => 'picture']) !!}
                <!--<input type="text" class="form-control" name="title" placeholder="Post Title">-->
                {!! Form::file('picture', null, ['class' => 'form-control']) !!}
                @if($errors->has('picture'))
                    {{$errors->first('picture')}}
                @endif
              </div>
              {!! Form::submit('Submit', ['class' => 'btn btn-primary', 'name' => 'submit']) !!}
              <!--<button type="submit" name="submit" class="btn btn-primary">Create</button>-->
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
