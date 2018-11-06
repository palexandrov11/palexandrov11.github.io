var key1, key2, key3, t_up, t_down, t_pause, t_start;
var ar_l = 0;
var c_down = 0;
var c_up = 0;
var t_up = 0;
var t_down = 0;
var ar = [];
var ar1 = {};
var step_d = 0;
var step_u = -1;
var r = "";

function sendData(user, step, k, d){
      var cli = new XMLHttpRequest();
      cli.onreadystatechange = function() {
              if (cli.readyState === 4) {
                  if (cli.status === 200) {
                          r = cli.responseText;
                  } else {
                             alert('failure!'+ cli.status);
                  }
              }
      };
      var url = 'https://palexandrov.000webhostapp.com/index.php?' + 'user=' + String(user) + '&' + 
      'step=' + String(step) + '&' + 'key=' + String(k) + '&' + 'duration=' + String(d);
      cli.open('GET', url, false);
      cli.send(null);
  }



/*window.addEventListener("click", event => {
  var u = document.getElementById('username').value;
  if(u.length != 0){
    var r = sendData(u, 0, 0, 0);
    document.getElementById('test1').innerHTML = "username" + u;
  }  
});*/

/*window.onload() = function(){
  document.getElementById("button").style.display = 'none';
}*/

/*function hide(){
  document.getElementById('button').style.display = 'none';
}*/



function checkUser(){
  var user = document.getElementById('username').value;
  sendData(user, 0, 0, 0);
  if (toString(r) === toString(0)){
    document.getElementById('response').innerHTML = "Username " + user + " is available";
    document.getElementById('username').reset();
    document.getElementById('command').innerHTML = "Press start and enter in your passwords (Maximum 10 seconds from first key press)";
    document.getElementById('button').style.display = 'block';
  } else{
    document.getElementById('response').innerHTML = "Username " + user + " is taken";
    document.getElementById('username').reset();

  }
}



function listen(){
  document.getElementById('begin').innerHTML = "Listening...";
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
        step_d = step_d + 2;
        ar.push([t_pause])
 //       sendData("philip", step_d, '', t_pause);
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
          step_u = step_u + 2;
          c_up = 0;
        c_down = 0;
        document.getElementById('passkey').innerHTML = ar;
 //       sendData("philip", step_u, key1.join(""), t_up - t_down);
       }
      else{
        document.getElementById('passkey').innerHTML = "DONZOO";
      }
      }
    });
}






