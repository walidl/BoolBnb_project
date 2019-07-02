
require('./bootstrap');

window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);


const app = new Vue({
    el: '#app',
});
var $ = require('jquery');

//Plugin per autocomplete delle mail
var typeahead = require('bootstrap-3-typeahead');

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
       lonInput.val(lon).trigger('change');
    });

  });
}

function init(){
  tomtomAutoComp();
}

$(document).ready(init);
