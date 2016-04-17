<?php

?>
<br>
<button class="btn btn-lg btn-info center-block" onclick="getLocation()">Scan Area</button>

<p id="location"></p>
<p id="newlocation"></p>

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
    
    checkRadius(position.coords.latitude, position.coords.longitude);
}
    
function checkRadius(lat, long){
    var command = "depend/check-proximity.php?lat=";
    var second = "?long="; 
    
   $("#newlocation").load("depend/check-proximity.php" , {lat:lat, long:long})
    return false;
}    
</script>