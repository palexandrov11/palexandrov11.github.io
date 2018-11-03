var key1, key2, key3, t_up, t_down, t_pause, t_start;
var ar_l = 0;
var c_down = 0;
var c_up = 0;
var t_up = 0;
var t_down = 0;
var ar = [];
var ar1 = {};
var step_d = 0;
var step_u = 0;

/*var serverData = 'Philip';
//var js = JSON.stringify(serverData);
var cli = new XMLHttpRequest();
cli.onreadystatechange = function() {
        if (cli.readyState === 4) {
            if (cli.status === 200) {
                       // OK
                       alert('response:'+cli.responseText);
                       // here you can use the result (cli.responseText)
            } else {
                       // not OK
                       alert('failure!'+ cli.status);
            }
        }
};
cli.open('GET', 'https://palexandrov.000webhostapp.com/index.php?a');
//cli.open('POST', 'http://ptsv2.com/t/uv2pn-1540842031/post');
//cli.setRequestHeader('Content-Type', 'application/json');
//cli.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//cli.send("serverData=" + serverData);
cli.send()
//cli.send("fname=philip");*/

//xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//xhr.send("serverData=" + serverData);

//var data = "fname=jerry";
//var serverData = data.serialize()
//$.get("https://palexandrov.000webhostapp.com/index.php?a");
function sendData(user, step, k, d,){
      var cli = new XMLHttpRequest();
      cli.onreadystatechange = function() {
              if (cli.readyState === 4) {
                  if (cli.status === 200) {
                             // OK
                             alert('response:'+cli.responseText);
                             // here you can use the result (cli.responseText)
                  } else {
                             // not OK
                             alert('failure!'+ cli.status);
                  }
              }
      };
      var url = 'https://palexandrov.000webhostapp.com/index.php?' + 'user=' + String(user) + '&' + 
      'step=' + String(step) + '&' + 'key=' + String(k) + '&' + 'duration=' + String(d);
      cli.open('POST', url, true);
      cli.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      cli.send();
  }

//sendData('fndkjnfksjfs', 'fndskjfnds', 'fdnsjkfndskjf');

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
      send_d = step_d + 1;
      ar.push([t_pause])
      sendData("philip", step_d, '', t_pause);
    }
  }
  if (!ar1.hasOwnProperty(event.keyCode)){
    ar1[event.keyCode] = 0;
  }
  });                                                                                               
  
window.addEventListener("keyup", event => {
    step_u = step_u + 1;
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
      document.getElementById('test1').innerHTML = ar;
      sendData("philip", step_u, key1.join(""), t_up - t_down);
     }
    else{
      document.getElementById('test1').innerHTML = "DONZOO";
    }
    }
  });








