<?php

?>

<button class="btn btn-info" onclick="getLocation()">Scan Area</button>

<script>
var currentLocation = document.getElementById("location");
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        currentLocation.innerHTML = "Geolocation is not supported by this browser.";
    }
}
function showPosition(position) {
    currentLocation.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude; 
}
    
function checkRadius(){
    
}    
</script>