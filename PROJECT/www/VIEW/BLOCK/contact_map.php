






<div id="contact-map" class="contact-map" style="background: url( '/static/image/contact/background.jpg' ) no-repeat center center / cover, url( '/static/image/contact/background.jpg.preload.jpg' ) no-repeat center center / cover">
</div>
<script src="//maps.googleapis.com/maps/api/js?key=RuxfYm8XiqdChb6CmygYRRDMnlIh8xnIKvy2ntc&language=fr&region=BE"></script>
<script>
    // -- STATEMENTS

    var map_location = { lat: 50.8948787, lng: 4.3415547 };

    var map = new google.maps.Map(
        document.getElementById( "contact-map" ),
        {
            center: map_location,
            zoom: 18,
            zoomControl: true,
            mapTypeControl: false,
            scaleControl: false,
            streetViewControl: false,
            rotateControl: false,
            fullscreenControl: false,
            styles: [
            {
                "featureType": "administrative",
                "elementType": "all",
                "stylers": [
                    {
                        "visibility": "on"
                    },
                    {
                        "lightness": 33
                    }
                ]
            },
            {
                "featureType": "landscape",
                "elementType": "all",
                "stylers": [
                    {
                        "color": "#f2e5d4"
                    }
                ]
            },
            {
                "featureType": "poi.park",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#c5dac6"
                    }
                ]
            },
            {
                "featureType": "poi.park",
                "elementType": "labels",
                "stylers": [
                    {
                        "visibility": "on"
                    },
                    {
                        "lightness": 20
                    }
                ]
            },
            {
                "featureType": "road",
                "elementType": "all",
                "stylers": [
                    {
                        "lightness": 20
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#c5c6c6"
                    }
                ]
            },
            {
                "featureType": "road.arterial",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#e4d7c6"
                    }
                ]
            },
            {
                "featureType": "road.local",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#fbfaf7"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "all",
                "stylers": [
                    {
                        "visibility": "on"
                    },
                    {
                        "color": "#acbcc9"
                    }
                ]
            }
        ]
        }
        );

    var marker = new google.maps.Marker(
        {
            position: map_location,
            map: map
        }
        );
</script>
