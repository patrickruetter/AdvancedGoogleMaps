$(document).ready(function() {
  var center = null;
  var maps = [];

  function initialize() {
    $( ".map" ).each(function( index ) {
      var options = {};
      options.address = $( this ).data('address');
      options.zoom = $( this ).data('zoom');
      options.scrollWheel = $( this ).data('scrollwheel');
      options.zoomControl = $( this ).data('zoomcontrol');
      options.mapType = $( this ).data('maptype');
      initializeMap(this, options);
    });
  }

  function initializeMap(element, options) {
    var map;

    var geocoder = new google.maps.Geocoder();

    var mapOptions = {
      zoom: options.zoom,
      disableDefaultUI: true,
      zoomControl: options.zoomControl,
      scrollwheel: options.scrollWheel,
      zoomcontrol: options.zoomControl,
      mapTypeId: google.maps.MapTypeId[options.mapType]
    };

    map = new google.maps.Map(element, mapOptions);

    maps.push(map);

    geocoder.geocode({
        'address': options.address
    }, function (results, status) {

        if (status == google.maps.GeocoderStatus.OK) {
            center = results[0].geometry.location

            map.setCenter(center);

            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
            });

        } else {
            console.log("Geocode was not successful for the following reason: " + status);
        }
    });

  }

  google.maps.event.addDomListener(window, 'load', initialize);

  google.maps.event.addDomListener(window, 'resize', function() {
    maps.forEach(function(map) {
      map.setCenter(center);
    })
  });
});
