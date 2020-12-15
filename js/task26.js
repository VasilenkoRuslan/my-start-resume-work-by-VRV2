$('#btn').click(function () {
    if ($("#lat,#lng").val() !== "") {
        $('#map').slideDown();
        initMap($("#lat").val(), $("#lng").val());
    }
});

function initMap(lat, lng) {
    let coordinate = {lat: Number(lat), lng: Number(lng)};
    let map = new google.maps.Map(
        document.getElementById('map'), {
            zoom: 13,
            center: coordinate,
        });
    let marker = new google.maps.Marker({
        position: coordinate,
        map: map
    });
}







