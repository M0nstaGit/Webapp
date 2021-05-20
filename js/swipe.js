var users = document.querySelectorAll('.js-card');
var firstUser = document.querySelectorAll('.js-card')[0];
firstUser.style.display = "block";

var index = 1;
var userLength = document.querySelectorAll(".js-card").length;
console.log(userLength);

function like() {
    if (index >= userLength) {
        var previousUser = document.querySelectorAll('.js-card')[index-1];
        previousUser.style.display = "none";
        document.getElementById("noMore").innerHTML = "There are no more people left";
    }
    else {
        var previousUser = document.querySelectorAll('.js-card')[index-1];
        previousUser.style.display = "none";

        var currentUser = document.querySelectorAll('.js-card')[index];
        currentUser.style.display = "block";
        index++;
    }
}

function dislike() {
    if (index >= userLength) {
        var previousUser = document.querySelectorAll('.js-card')[index-1];
        previousUser.style.display = "none";
        document.getElementById("noMore").innerHTML = "There are no more people left";
    }
    else {
        var previousUser = document.querySelectorAll('.js-card')[index-1];
        previousUser.style.display = "none";
    
        var currentUser = document.querySelectorAll('.js-card')[index];
        currentUser.style.display = "block";
        index++;
    }
}




