@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Enter An Address To Get Weather</h1>

            <form>
              <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" name="location" placeholder="Enter Zipcode or Address">
              </div>
              <button type="submit" name="submit" class="btn btn-primary">Create</button>
        </div>
        <div class="col-md-6 col-md-offset-3">
            <h1>Address</h1>

            <hr>
            <p>Weather Summary</p>
            <ul>
                <li>Current Temp: Temp</li>
                <li>Feels Like: Temp</li>
                <li>Wind Speed: Speed</li>
            </ul>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
  
</script>
@endsection
