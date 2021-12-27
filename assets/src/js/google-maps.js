(function(){
  'use strict';

  // Initialize and add the map
  function initMap() {

    const SnazzyInfoWindow = require('snazzy-info-window')
    
    // The location of Uluru
    var center = {
      lat: 40.712784,
      lng: -74.005941
    }
    
    // The map, centered at Uluru
    var map = new google.maps.Map(
      document.getElementById('map'), 
      {
        zoom: 17,
        styles: [
          {
              "featureType": "all",
              "elementType": "all",
              "stylers": [
                  {
                      "saturation": "32"
                  },
                  {
                      "lightness": "-3"
                  },
                  {
                      "visibility": "on"
                  },
                  {
                      "weight": "1.18"
                  }
              ]
          },
          {
              "featureType": "all",
              "elementType": "geometry.fill",
              "stylers": [
                  {
                      "saturation": "-62"
                  },
                  {
                      "weight": "3.98"
                  },
                  {
                      "hue": "#0041ff"
                  }
              ]
          },
          {
              "featureType": "administrative",
              "elementType": "labels",
              "stylers": [
                  {
                      "visibility": "off"
                  }
              ]
          },
          {
              "featureType": "landscape",
              "elementType": "labels",
              "stylers": [
                  {
                      "visibility": "off"
                  }
              ]
          },
          {
              "featureType": "landscape.man_made",
              "elementType": "all",
              "stylers": [
                  {
                      "saturation": "-70"
                  },
                  {
                      "lightness": "14"
                  }
              ]
          },
          {
              "featureType": "poi",
              "elementType": "labels",
              "stylers": [
                  {
                      "visibility": "off"
                  }
              ]
          },
          {
              "featureType": "road",
              "elementType": "labels",
              "stylers": [
                  {
                      "visibility": "off"
                  }
              ]
          },
          {
              "featureType": "transit",
              "elementType": "labels",
              "stylers": [
                  {
                      "visibility": "off"
                  }
              ]
          },
          {
              "featureType": "water",
              "elementType": "all",
              "stylers": [
                  {
                      "saturation": "100"
                  },
                  {
                      "lightness": "-14"
                  }
              ]
          },
          {
              "featureType": "water",
              "elementType": "labels",
              "stylers": [
                  {
                      "visibility": "off"
                  },
                  {
                      "lightness": "12"
                  }
              ]
          }
      ],
        maxZoom: 20,
        minZoom: 0,
        mapTypeId: 'roadmap',
        disableDefaultUI: true,
        clickableIcons: false,
        disableDoubleClickZoom: false,
        draggable: true,
        keyboardShortcuts: true,
        scrollwheel: false,
        center: center
      }
    )

    const markers = [{
      lat: 40.712425,
      lng: -74.008091,
    }, {
      lat: 40.711246,
      lng: -74.007672,
    }, {
      lat: 40.711612,
      lng: -74.006395,
    }, {
      lat: 40.713108,
      lng: -74.008155,
    }, {
      lat: 40.712507,
      lng: -74.004175,
    }, {
      lat: 40.713312,
      lng: -74.005612,
    }, {
      lat: 40.712059,
      lng: -74.008906,
    }, {
      lat: 40.711189,
      lng: -74.005762,
    }, {
      lat: 40.713564,
      lng: -74.00734,
    }, {
      lat: 40.712759,
      lng: -74.006095,
    }, ]
    
    markers.forEach(position => {
      var markerOptions = {
        map: map,
        position
      }
      
      markerOptions.icon = {
        path: 'M11 2c-3.9 0-7 3.1-7 7 0 5.3 7 13 7 13 0 0 7-7.7 7-13 0-3.9-3.1-7-7-7Zm0 9.5c-1.4 0-2.5-1.1-2.5-2.5 0-1.4 1.1-2.5 2.5-2.5 1.4 0 2.5 1.1 2.5 2.5 0 1.4-1.1 2.5-2.5 2.5Z',
        scale: 1.6363636363636363636363636364,
        anchor: new google.maps.Point(11, 22),
        fillOpacity: 1,
        fillColor: '#299aff',
        strokeOpacity: 0
      }
      
      const marker = new google.maps.Marker(markerOptions)

      var infoWindow = new SnazzyInfoWindow({
        marker: marker,
        wrapperClass: 'ql-snow',
        placement: 'top',
        backgroundColor: '#fff',
        fontColor: '#000',
        content: '<div class="ql-editor" style="font-family: Arial, Helvetica, sans-serif; font-size: 14px;">\u003cp\u003eYour content goes here...\u003c/p\u003e</div>',
        maxWidth: undefined,
        maxHeight: undefined,
        padding: "30px",
        borderRadius: "3px 3px",
        offset: {
          top: "-37px",
          left: "0px",
        },
        border: false,
        pointer: "15px",
        shadow: {"h":"0px","v":"1px","blur":"3px","spread":"0px","opacity":0.3,"color":"#000000"},
        closeOnMapClick: true,
        closeWhenOthersOpen: true
      })

    })
  }

  window.initMap = initMap

})()