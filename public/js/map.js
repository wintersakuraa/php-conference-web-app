let latLng;
let map;
let marker;
let lat = $('#latitude').val();
let lng = $('#longitude').val();

// map for getById view
function viewMap() {
    latLng = new google.maps.LatLng(confLat, confLng);

    const mapOptions = {
        zoom: 10,
        center: latLng
    };

    map = new google.maps.Map(document.getElementById("viewMap"), mapOptions);

    marker = new google.maps.Marker({
        position: latLng,
        map: map,
        draggable: false,
        animation: google.maps.Animation.DROP
    });
}

// map for create/edit view
function initMap() {
    if (lat && lng) {
        latLng = new google.maps.LatLng(lat, lng);
    } else {
        latLng = new google.maps.LatLng(50.4501, 30.5234);
    }

    const mapOptions = {
        zoom: 10,
        center: latLng
    };

    map = new google.maps.Map(document.querySelector("#map"), mapOptions);

    marker = new google.maps.Marker({
        position: latLng,
        map: map,
        draggable: true,
        animation: google.maps.Animation.DROP
    });

    google.maps.event.addListener(marker, 'dragend', (marker) => {
        latLng = marker.latLng;
        currentLatitude = latLng.lat();
        currentLongitude = latLng.lng();
        $('#latitude').val(currentLatitude);
        $('#longitude').val(currentLongitude);
    });
}

// update map for create/edit view
function updatePosition() {
    lat = $('#latitude').val();
    lng = $('#longitude').val();

    if (lat == 0 && lng == 0) {
        lat = 50.4501;
        lng = 30.5234;

        marker.setPosition(null);
        latLng = new google.maps.LatLng(lat, lng);
        map.setCenter(latLng);

    } else {
        latLng = new google.maps.LatLng(lat, lng);
        marker.setPosition(latLng);
        map.setCenter(latLng);
    }
}
