var key1, key2, key3, d, dd, n, nn, nnn;

window.onkeydown = function(f){
        key1 = f.keyCode;
    dd = new Date();
    nn = dd.getTime();
}
window.onkeyup = function(e) {
    key2 = e.keyCode;
    d = new Date();
    n = d.getTime();
    key3 = key2;
    nnn = n - nn;

    document.getElementById('test1').innerHTML = 'keyCode = ' + key1;
    document.getElementById('test2').innerHTML = 'keyCode = ' + key2;
    document.getElementById('time1').innerHTML = 'timepassed1 = ' + nn;
    document.getElementById('time2').innerHTML = 'timepassed2 = ' + n;
    document.getElementById('time3').innerHTML = 'timepassed2 = ' + nnn;
}