var burger = document.getElementById('menu');
burger.onclick = function myFunc() {
	var x = document.getElementById('myMenu');
    var y = document.getElementById('myLogo');
	if (x.className === "header-menu") {
		x.className += " responsive";
		y.className += " responsive";
	} else {
		x.className = "header-menu";
        y.className = "header-logo";
	}
}
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