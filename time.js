
var st;
function start(){
    var s=new Date();
    st=s.getTime();
    startTime();
}
function startTime() {
    var today = new Date();
    var et=today.getTime();
    var diff=et-st;
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    var min=Math.floor(diff/60000);
    var sec=Math.floor(diff/1000)-60*min;
    document.getElementById('time').innerHTML =
    "Current Time-" +  h + ":" + m + ":" + s;
    document.getElementById('te').innerHTML = "Time on page-  " + checkTime(min) + ' :' + checkTime(sec);
    var t = setTimeout(startTime, 1000);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
