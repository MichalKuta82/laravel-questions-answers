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
            <p>@{{ darksky.summary }}</p>
            <ul>
                <li>Current Temp: @{{ darksky.temp }}</li>
                <li>Feels Like: @{{ darksky.feelsLikeTemp }}</li>
                <li>Wind Speed: @{{ darksky.windSpeed }}</li>
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
    darksky: {
      summary: '',
      temp: '',
      feelsLikeTemp: '',
      windSpeed: ''
    }
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

          const darkskyApi = '{{ env('DARKSKY_API') }}';
          const corsAnywhere = 'https://cors-anywhere.herokuapp.com/'
          const url = `${corsAnywhere}https://api.darksky.net/forecast/${darkskyApi}/${res.geometry.location.lat},${res.geometry.location.lng}`
          return axios.get(url);
        }).then(function (response){
          let res2 = response.data;
          vm.darksky.summary = res2.currently.summary;
          vm.darksky.temp = res2.currently.temp;
          vm.darksky.feelsLikeTemp = res2.currently.feelsLikeTemp;
          vm.darksky.windSpeed = res2.currently.windSpeed;
        })
      }
    }
  });

</script>
@endsection
