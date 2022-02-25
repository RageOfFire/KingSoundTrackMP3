var timerVar = 0;
var totalSeconds = 0;

function countTimer() {
    ++totalSeconds;
    var hour = Math.floor(totalSeconds / 3600);
    var minute = Math.floor((totalSeconds - hour * 3600) / 60);
    var seconds = totalSeconds - (hour * 3600 + minute * 60);
    if (hour < 10)
        hour = "0" + hour;
    if (minute < 10)
        minute = "0" + minute;
    if (seconds < 10)
        seconds = "0" + seconds;
    document.getElementById("timer").innerHTML = hour + ":" + minute + ":" + seconds;
}