// var textBoxes = document.querySelectorAll('[id^=card]');

// var firstUser = document.querySelectorAll('.js-card')[0];
// firstUser.style.display = "none";

var x = document.getElementById("demo");

var x = document.getElementById("demo");
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
    console.log(position.coords.latitude);
    console.log(position.coords.longitude);
}

