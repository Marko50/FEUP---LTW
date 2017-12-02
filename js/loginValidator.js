function encodeForAjax(data) {
  return Object.keys(data).map(function(k){
    return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
  }).join('&');
}

let form = document.getElementsByTagName('form')[0];
form.addEventListener('submit', function(event){
  let u = document.getElementById('username').value;
  let p = document.getElementById('password').value;

  let request = new XMLHttpRequest();
  request.open("post", "../phpUtils/verifyLoginCombination.php",false);
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  request.onreadystatechange = function(){
    if (request.readyState == XMLHttpRequest.DONE){
        if(request.responseText == "false")
        {
          document.getElementById('errors').innerHTML = 'Wrong username/passord combination!\n';
          document.getElementById('password').focus();
          document.getElementById('username').focus();
          event.preventDefault();
          return false;
        }
    }
  }
  request.send(encodeForAjax({username:u, password:p}));
  return true;
});
