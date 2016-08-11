var map;
      function initialize() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: new google.maps.LatLng(-1.2870409, 36.8145043),
          mapTypeId: 'roadmap',
          styles: [
            {
              featureType: 'road',
              elementType: 'geometry',
              stylers: [
                { color: '#ff0000' },
                { weight: 1.6 }
              ]
            }, {
              featureType: 'road',
              elementType: 'labels',
              stylers: [
                { saturation: -100 },
                { invert_lightness:false }
              ]
            }, {
              featureType: 'landscape',
              elementType: 'geometry',
              stylers: [
                { hue: '#ffff00' },
                { gamma: 1.4 },
                { saturation: 82 },
                { lightness: 96 }
              ]
            }, {
              featureType: 'poi.school',
              elementType: 'geometry',
              stylers: [
                { hue: '#fff700' },
                { lightness: -15 },
                { saturation: 99 }
              ]
            }, {
              featureType: 'poi',
              elementType: 'geometry',
              stylers: [
                { visibility: 'off' }
              ]
            }, {
              featureType: 'poi.school',
              elementType: 'geometry',
              stylers: [
                { visibility: 'on' },
                { hue: '#fff700' },
                { lightness: -15 },
                { saturation: 99 }
              ]
            }
          ]
        });

        var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
var icons = {
  parking: {
    icon: iconBase + 'parking_lot_maps.png'
  },
  library: {
    icon: iconBase + 'library_maps.png'
  },
  info: {
    icon: iconBase + 'info-i_maps.png'
  }
};

function addMarker(feature) {
  var marker = new google.maps.Marker({
    position: feature.position,
    icon: icons[feature.type].icon,
    map: map
  });
}

        var features = [
          {
            position: new google.maps.LatLng(-1.2870409, 36.8145043),
            type: 'info'
          }, {
            position: new google.maps.LatLng(-1.2870409, 36.8145043),
            type: 'info'
          }, {
            position: new google.maps.LatLng(-1.2870409, 36.8145043),
            type: 'info'
          }, {
            position: new google.maps.LatLng(-1.2870409, 36.8145043),
            type: 'info'
          }, {
            position: new google.maps.LatLng(-1.2870409, 36.8145043),
            type: 'info'
          }, {
            position: new google.maps.LatLng(-1.2870409, 36.8145043),
            type: 'info'
          }, {
            position: new google.maps.LatLng(-1.2870409, 36.8145043),
            type: 'info'
          }, {
            position: new google.maps.LatLng(-1.2870409, 36.8145043),
            type: 'info'
          }, {
            position: new google.maps.LatLng(-1.2870409, 36.8145043),
            type: 'info'
          }, {
            position: new google.maps.LatLng(-1.2870409, 36.8145043),
            type: 'info'
          }, {
            position: new google.maps.LatLng(-1.2870409, 36.8145043),
            type: 'info'
          }, {
            position: new google.maps.LatLng(-1.2870409, 36.8145043),
            type: 'parking'
          }, {
            position: new google.maps.LatLng(-1.2870409, 36.8145043),
            type: 'parking'
          }, {
            position: new google.maps.LatLng(-1.2870409, 36.8145043),
            type: 'parking'
          }, {
            position: new google.maps.LatLng(-1.2870409, 36.8145043),
            type: 'parking'
          }, {
            position: new google.maps.LatLng(-1.2870409, 36.8145043),
            type: 'parking'
          }, {
            position: new google.maps.LatLng(-1.2870409, 36.8145043),
            type: 'parking'
          }, {
            position: new google.maps.LatLng(-1.2870409, 36.8145043),
            type: 'parking'
          }, {
            position: new google.maps.LatLng(-1.2870409, 36.8145043),
            type: 'library'
          }
        ];

        for (var i = 0, feature; feature = features[i]; i++) {
          addMarker(feature);
        }
       
      }
