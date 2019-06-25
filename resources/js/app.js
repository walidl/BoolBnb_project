/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

//Inizializzazione mappa
var map = tomtom.L.map('map', {
  key: 'T1lAQG5AAAhzXmU8kZ5dB5zchnRTeyTG',
  center: [45.46239, 9.19026],
  zoom: 12
});

//Search box autocomplete
function tomtomAutoComp(){

  var searchBoxInstance = tomtom.searchBox({
        collapsible: false,
        searchOnDragEnd: 'never'
    }).addTo(map);

    var searchPanel = $("#search-panel");

    searchPanel.append(searchBoxInstance.getContainer());

    searchPanel.change(function () {

      var value = $(this).text();

      var val = value.split(',');

      var address = val[0]+","+val[1];

      tomtom.fuzzySearch().query(address).go(function (result) {
       var lat = result[0].position.lat;
       var lon = result[0].position.lon;

       var markers = new L.TomTomMarkersLayer().addTo(map);
       markers.setMarkersData([[lat,lon]]);

       markers.addMarkers();
       map.fitBounds(markers.getBounds());

       var addr = result[0].address.freeformAddress;

       var addrInput = $("#addr");
       var latInput = $("#lat");
       var lonInput = $("#lon");

       addrInput.val(addr);
       latInput.val(lat);
       lonInput.val(lon);
    });

  });
}

function init(){
  tomtomAutoComp();
}

$(document).ready(init);
