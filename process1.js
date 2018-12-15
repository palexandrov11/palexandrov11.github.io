var key1, key2, key3, t_up, t_down, t_pause, t_start;
var ar_l = 0;
var c_down = 0;
var c_up = 0;
var t_up = 0;
var t_down = 0;
var t_start = 0;
var ar = [];
var ar1 = {};
var step_d = 0;
var step_u = -1;
var r = "";
var points = 0;
var duration = 0;
var key_val = 0;

function sendData(user, step, k, d, i, f){
      var cli = new XMLHttpRequest();
      cli.onreadystatechange = function() {
              if (cli.readyState === 4) {
                  if (cli.status === 200) {
                          var response = cli.responseText;
                          if (f === "checkVal"){
                            checkVal(response);
                          } 
                          if (f === "countVal"){
                            if (response == 1){
                              points = points + 1;
                            }
                          }
                          if (f === "verifyVal"){
                    //        alert(response + "here");
                            verifyVal(response);
                          }
                  } else {
                             alert('failure!'+ cli.status);
                  }
              }
      };
      var url = 'https://palexandrov.000webhostapp.com/index.php?' + 'user=' + String(user) + '&' + 
      'step=' + String(step) + '&' + 'key=' + String(k) + '&' + 'duration=' + String(d) + 
      '&' + 'option=' + String(i);
      cli.open('GET', url, false);
      cli.send(null);
  }


function checkUser(){
  var user = document.getElementById('username').value;
  sendData(user, 0, 0, 0, 2, "checkVal");
}

function checkVal(i){
  var user = document.getElementById('username').value;
  if(i == 1){
    document.getElementById('response').innerHTML = "Username " + user + " is  not available";
  } else {
    document.getElementById('response').innerHTML = "username " + user + " is available";
    document.getElementById('command').innerHTML = "Press start and enter in your passwords (Maximum 5 seconds from first key press)";
    document.getElementById('button').style.display = 'block';
  }
}

function verifyVal(i){
    if (i == 1){
      document.getElementById('passkey').innerHTML = "Password is correct";
      document.getElementById('begin').innerHTML = "Password is correct";
    } else {
      document.getElementById('passkey').innerHTML = "Password is incorrect";
      document.getElementById('begin').innerHTML = "Password is incorrect";
    }
  }
 
function listen(option=0){
  document.getElementById('begin').innerHTML = "Listening...";
  var user = document.getElementById('username').value;
  window.addEventListener("keydown", event => {
    c_down = c_down + 1;
    if (event.keyCode == 13){
      key_val = 13;
    }else{
      key_val = '';
    }
    if (ar.length == 0){
      t_start = time();
    } 
    if (c_down == 1){
      t_down = time();
      if (ar.length != 0){
        t_pause = t_down - t_up;
        step_d = step_d + 2;
        sendDecision(user, step_d, key_val, t_down, t_pause, option);
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
      ar1 = {};
      step_u = step_u + 2;
      c_up = 0;
      c_down = 0;
      t_up = time();
      k_pause = t_up - t_down;
      sendDecision(user, step_u, key1.join(""), t_up, k_pause, option);
    }
  });
}

function sendDecision(user, step, key_val, t, duration, option){
  if ((key_val == 13) || (t - t_start > 5000)){
    if (option == 0){
      sendData(user, 20, '', points, option, '');
      document.getElementById('passkey').innerHTML = "DONE!";
    } else{
      sendData(user, 20, '', points, option, "verifyVal");
    }
  } else{
      sendData(user, step, key_val, duration, option, "countVal");
      ar.push([key_val, duration]);
      document.getElementById('passkey').innerHTML = ar;
  }
}

function time(){
    d = new Date();
    return d.getTime();
}

function verify(){
  listen(1);
}






