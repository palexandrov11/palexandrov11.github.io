var key1, key2, key3, t_up, t_down, t_pause, t_start;
var ar_l = 0;
var c_down = 0;
var c_up = 0;
var t_up = 0;
var t_down = 0;
var ar = [];
var ar1 = {};

window.addEventListener("keydown", event => {
    c_down = c_down + 1;
  if (ar.length == 0){
    d = new Date();
    t_start = d.getTime();
  }
  if (c_down == 1) {
    d = new Date();
    t_down = d.getTime();
    if (ar.length != 0){
        t_pause = t_down - t_up;
      ar.push([t_pause])
    }
  }
  if (!ar1.hasOwnProperty(event.keyCode)){
    ar1[event.keyCode] = 0;
  }
  });                                                                                               
  
window.addEventListener("keyup", event => {
    c_up = c_up + 1;
  key1 = Object.keys(ar1);
  if (c_up == key1.length){
    d = new Date();
        t_up = d.getTime();
    if (t_up - t_start < 10000){
        ar.push([key1, t_up - t_down]);
      ar1 = {};
        c_up = 0;
      c_down = 0;
      document.getElementById('ar').innerHTML = keyCode1;
     }
  }
};




