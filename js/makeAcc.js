function getLocation() {
    if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
    } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    var json_var = [position.coords.latitude, position.coords.longitude]

    // json_var.latitude = position.coords.latitude;
    // json_var.longtitude = position.coords.longitude;

    getCity(json_var);
    // console.log(json_var);
    // $.ajax({
    //     url:"getLocation.php",
    //     method: "POST",
    //     data: json_var,
    //     success: function(res) {
    //         console.log(res);
    //     }
    // })
}

function getCity(coordinates) {
    var xhr = new XMLHttpRequest();
    var lat = coordinates[0];
    var lng = coordinates[1];
  
    // Paste your LocationIQ token below.
    xhr.open('GET', "https://us1.locationiq.com/v1/reverse.php?key=pk.ecc3c3dd5b65b3bba5bd442a08fbe91b&lat=" +
    lat + "&lon=" + lng + "&format=json", true);
    xhr.send();
    xhr.onreadystatechange = processRequest;
    xhr.addEventListener("readystatechange", processRequest, false);
  
    function processRequest(e) {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);
            var city = response.address.county;

            var county = {};
            county.name = city;

            ajaxSendTo(county)
        }
    }
}

function ajaxSendTo(county) {
    $.ajax({
        url:"getLocation.php",
        method: "POST",
        data: county,
        success: function(res) {
            console.log(res);
        }
    })
}
