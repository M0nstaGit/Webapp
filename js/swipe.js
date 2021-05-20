var users = document.querySelectorAll('.js-card');
var firstUser = document.querySelectorAll('.js-card')[0];
firstUser.style.display = "block";

var index = 1

function like() {
    for (index; index < users.length; index++) {
        firstUser.style.display = "none";
        var currentUser = document.querySelectorAll('.js-card')[index];
        currentUser.style.display = "block";
    }
}

function dislike() {
    for (index; index < users.length; index++) {
        firstUser.style.display = "none";
        var currentUser = document.querySelectorAll('.js-card')[index];
        currentUser.style.display = "block";
    }
}




