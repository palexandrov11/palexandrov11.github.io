function sendData(user, step, k, d,){
      var cli = new XMLHttpRequest();
      cli.onreadystatechange = function() {
              if (cli.readyState === 4) {
                  if (cli.status === 200) {
                             // OK
                             return cli.responseText;
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
      cli.send();
  }

//var btn = document.getElementById("btn");


window.addEventListener("click", event => {

	var u = document.getElementById('username').value;
	var r = sendData()
	document.getElementById('response').innerHTML = "username is being verified" + r;
	document.getElementById('test1').innerHTML = "username" + u;
	
});

