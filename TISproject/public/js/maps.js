function initMap() {
    var center = { lat: 6.2443677, lng: -75.6636142 };
    var locations = [
        [
            "Jardín Botánico Joaquín Antonio Uribe<br>\
            Cl. 73 #51d-14, Aranjuez, Medellín, Aranjuez, Medellín, Antioquia<br>",
            6.2704792,
            -75.5661395,
        ],
        ["Centro de Medellin<br>", 6.2432868, -75.5793858],
        [
            "Museo de Arte Moderno de Medellín<br>\
            Cra. 44 #19a-100, El Poblado, Medellín, El Poblado, Medellín, Antioquia<br>",
            6.2238053,
            -75.5790096,
        ],
        [
            "Parque Ecológico El Salado<br>\
            Vereda el Vallano Envigado - A 5 Km del, Envigado, Antioquia<br>",
            6.1391349,
            -75.5755552,
        ],
        [
            "Cerro de Las Tres Cruces<br>\
            Cl. 8 #84f-25, Medellín, Altavista, Medellín, Antioquia<br>",
            6.212857,
            -75.616722,
        ],
    ];
    var map = new google.maps.Map(document.getElementById("map"), {
        zoom: 9,
        center: center,
    });
    var infowindow = new google.maps.InfoWindow({});
    var marker, count;
    for (count = 0; count < locations.length; count++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(
                locations[count][1],
                locations[count][2]
            ),
            map: map,
            title: locations[count][0],
        });
        google.maps.event.addListener(
            marker,
            "click",
            (function (marker, count) {
                return function () {
                    infowindow.setContent(locations[count][0]);
                    infowindow.open(map, marker);
                };
            })(marker, count)
        );
    }
}
