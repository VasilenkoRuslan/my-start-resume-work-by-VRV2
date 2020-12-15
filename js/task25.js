function initMap() {
    let flexi = {lat: 47.8475126, lng: 35.1348354};
    let map = new google.maps.Map(
        document.getElementById('map'), {
        zoom: 13,
        center: flexi,
    });
    let marker = new google.maps.Marker({
        position: flexi,
        map: map
    });
};