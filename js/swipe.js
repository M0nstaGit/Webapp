var users = document.querySelectorAll('.js-card');
var firstUser = document.querySelectorAll('.js-card')[0];
firstUser.style.display = "block";

var index = 1;
var userLength = document.querySelectorAll(".js-card").length;

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

        var currentId = currentUser.querySelector('#currentId').value;
        var userId = currentUser.querySelector('#userId').value;
        var relation = 1;

        var userInfo = {};
        userInfo.currrent = currentId;
        userInfo.id = userId;
        userInfo.relation = relation;

        ajaxSendTo(userInfo);
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

        var currentId = currentUser.querySelector('#currentId').value;
        var userId = currentUser.querySelector('#userId').value;
        var relation = 0;

        var userInfo = {};
        userInfo.currrent = currentId;
        userInfo.id = userId;
        userInfo.relation = relation;

        ajaxSendTo(userInfo);
    }
}

function ajaxSendTo(userInfo) {
    $.ajax({
        url:"./swipeToDb.php",
        method: "POST",
        data: userInfo,
        success: function(res) {
            console.log(res);
        }
    })
}


