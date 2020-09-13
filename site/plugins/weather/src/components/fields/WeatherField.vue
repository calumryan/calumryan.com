<template>
  <div>
    <k-field class="k-doi-field" :label="label">
      <k-input theme="field" type="text" name="textfield" :value="value" @input="onInput" v-model="value">
    </k-field>
    <k-button class="" type="button" @click="getWeather">Get weather</k-button>
  </div>
</template>

<script>
//const DarkSky = require('forecast.io');
export default {
  // data: {
  //   options: {
  //     APIKey: process.env.DARKSKY_API_KEY,
  //     timeout: 1000
  //   },
  //   darksky: new DarkSky(options)
  // },
  data: {
      darkSkyAPI: process.env.VUE_APP_ARKSKY_API_KEY,
      weatherData: '',
      weatherOutput: [],
      latitude: '',
      longitude: ''
  },
  props: {
    label: String,
    value: String
  },
  methods: {
    // onInput(value) {
    //   this.$emit("input", value);
    // },
    success: function(position) {
      this.latitude  = position.coords.latitude;
      this.longitude = position.coords.longitude;
      this.weatherData = `https://api.darksky.net/forecast/${this.darkskyAPI}/${this.latitude},${this.longitude}`;
      this.value = this.latitude;
      fetch(this.weatherData, {
        headers : {'Content-Type': 'application/json'}
      })
      .then((response) => response.json())
      .then((data) => {
        console.log('Success:', data);
      })
      .catch((error) => {
        console.error('Error:', error);
      });

    },
    error: function() {
      alert("Unable to retrieve your location");
    },
    getWeather: function() {

      if (!navigator.geolocation){
        alert('Geolocation is not supported by your browser');
        return;
      }

      navigator.geolocation.getCurrentPosition(this.success, this.error);

    }
  }
}
</script>

<style>
  /* optional scoped styles for the component */
</style>