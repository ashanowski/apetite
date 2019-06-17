function initMap() {
    // The location of Uluru
    var wroclaw = {lat: 51.146373, lng: 17.138244};
    var sosnowiec = {lat: 50.277267, lng: 19.127530}
    // The map, centered at Uluru
    var map = new google.maps.Map(
        document.getElementById('map'), {zoom: 6, center: wroclaw});
    // The marker, positioned at Uluru
    var marker = new google.maps.Marker({position: wroclaw, map: map});
    var marker2 = new google.maps.Marker({position: sosnowiec, map: map})
  }
  