var btn = document.querySelector('input[type="button"]');
var txt = document.querySelector('p');

function sendData(user, step, k, d,){
      var cli = new XMLHttpRequest();
      var url = 'https://palexandrov.000webhostapp.com/index.php?' + 'user=' + String(user) + '&' + 
      'step=' + String(step) + '&' + 'key=' + String(k) + '&' + 'duration=' + String(d);
      cli.open('POST', url, true);
      cli.send();
  }

btn.addEventListener('click', updateBtn);

function updateBtn() {
	var i = document.getElementsbyName("username").value;
	document.getElementById('test1').innerHTML = "YOOOOOOOO" + i;
}