

function sendData(user, step, k, d,){
      var cli = new XMLHttpRequest();
      var url = 'https://palexandrov.000webhostapp.com/index.php?' + 'user=' + String(user) + '&' + 
      'step=' + String(step) + '&' + 'key=' + String(k) + '&' + 'duration=' + String(d);
      cli.open('POST', url, true);
      cli.send();
  }
function checkUser(){
	var u = document.getElementById("username").value;
	sendData(u, 0, 0, 0);
	document.getElementById("demo").innerHTML = "username is being verified" + u;
}

//var btn = document.getElementById("btn");


window.addEventListener("click", event => {
	var u = document.getElementById('username').value;
	document.getElementById('response').innerHTML = "username is being verified" + u;
	document.getElementById('test1').innerHTML = "username" + u;
});

