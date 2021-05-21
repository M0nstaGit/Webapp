try {
    var users = document.querySelectorAll('.js-card');
    var firstUser = document.querySelectorAll('.js-card')[0];
    firstUser.style.display = "block";

    var index = 0;
    var userLength = document.querySelectorAll(".js-card").length;
}
catch(err) {
    document.getElementById("noMore").innerHTML = "There are no more people left to swipe";
}

function like() {
    var currentUser = document.querySelectorAll('.js-card')[index];
    currentUser.style.display = "none";

    var currentId = currentUser.querySelector('#currentId').value;
    var userId = currentUser.querySelector('#userId').value;
    var relation = 1;

    var userInfo = {};
    userInfo.current = currentId;
    userInfo.id = userId;
    userInfo.relation = relation;

    ajaxSendTo(userInfo);
    index++;

    document.querySelectorAll(".js-card")[index].style.display = "block";

    if (index >= userLength) {
        document.getElementById("noMore").innerHTML = "There are no more people left";
    }
    
}

function dislike() {
    var currentUser = document.querySelectorAll('.js-card')[index];
    currentUser.style.display = "none";

    var currentId = currentUser.querySelector('#currentId').value;
    var userId = currentUser.querySelector('#userId').value;
    var relation = 0;

    var userInfo = {};
    userInfo.current = currentId;
    userInfo.id = userId;
    userInfo.relation = relation;

    index++;
    ajaxSendTo(userInfo);
    
    document.querySelectorAll(".js-card")[index].style.display = "block";

    if (index >= userLength) {
        document.getElementById("noMore").innerHTML = "There are no more people left";
    }

    
}

function ajaxSendTo(userInfo) {
    $.ajax({
        url:"./swipe.php",
        method: "POST",
        data: userInfo,
        error: console.error,
        success: function(res) {
            console.log(userInfo);
        }
        
    })
}



