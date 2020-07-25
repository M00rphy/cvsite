$(function () {
    function timeChecker() {
        setInterval(function () {
            var storedTimeStamp = sessionStorage.getItem("lasTimeStamp");
            timeCompare(storedTimeStamp);
        }, 1000);
    }

    function timeCompare(timeString) {
        var currentTime = new Date();
        var pastTime = new Date(timeString);
        var timeDif = currentTime - pastTime;
        var minPast = Math.floor((timeDif / 60000));

        if (minPast >= 3) {
            sessionStorage.removeItem("lastTimeStamp");
            window.location = "./login/logout.php";
            return false;
        } else {
            //console.log(currentTime + " - " + pastTime + " - " + minPast + " min past");
            //console.log("Tiempo inactivo: " + (timeDif / 1000));
        }

        //console.log(minPast);
    }

    $(document).mousemove(function () {
        var timeStamp = new Date();
        sessionStorage.setItem("lasTimeStamp", timeStamp);
        //console.log("Mouse Moved, TimeStamp reseted");
    });
    $(document).keypress(function () {
        var timeStamp = new Date();
        sessionStorage.setItem("lasTimeStamp", timeStamp);
        //console.log("Key Pressed, TimeStamp reseted");
    });
    $(document).keydown(function () {
        var timeStamp = new Date();
        sessionStorage.setItem("lasTimeStamp", timeStamp);
        //console.log("Key Down, TimeStamp reseted");
    });
    $(document).click(function () {
        var timeStamp = new Date();
        sessionStorage.setItem("lasTimeStamp", timeStamp);
        //console.log("Clicked, TimeStamp reseted");
    });
    timeChecker();
});