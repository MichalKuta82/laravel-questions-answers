@extends('layouts.app')

@section('content')
<div class="container" id="app">
    <div class="row">
        <div class="col-md-6 col-md-offset-3" v-if="step == 1">
            <h1>Enter An Address To Get Weather</h1>

            <form>
              <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" name="location" placeholder="Enter Zipcode or Address" v-model="userInput">
              </div>
              <button class="btn btn-primary" v-on:click.prevent="getWeather" v-show="userInput">Get Weather</button>
        </div>
        <div class="col-md-6 col-md-offset-3" v-if="step == 2">
            <h1>@{{ googleAddress.formatted }}</h1>
            <hr>
            <ul>
              <li>Lat: @{{ googleAddress.lat }}</li>
              <li>Lng: @{{ googleAddress.lng }}</li>
            </ul>
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

  var app = new Vue({
    el: '#app',
    data: {
      step: 1,
      userInput: '',
      googleAddress: {
        formatted: '',
        lat: '',
        lng: ''
      }
    },
    methods: {
      getWeather: function() {
        this.step = 2;
        let vm = this;
        axios.get('https://maps.googleapis.com/maps/api/geocode/json', {
          params: {
            address: vm.userInput
          }
        }).then(function (response){
          let res = response.data.results[0];
          vm.googleAddress.formatted = vm.res.formatted_address;
          vm.googleAddress.lat = res.geometry.location.lat;
          vm.googleAddress.lng = res.geometry.location.lng;
        })
      }
    }
  });

</script>
@endsection
