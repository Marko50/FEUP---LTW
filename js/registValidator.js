function encodeForAjax(data) {
  return Object.keys(data).map(function(k){
    return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
  }).join('&');
}

let form = document.getElementsByTagName('form')[0];
form.addEventListener('submit', function(event){
  let password = document.getElementById('password').value;
  if(password.length < 5){
    document.getElementById('errors').innerHTML = 'Please pick a password with more than 5 caracters!\n';
    document.getElementById('password').focus();
    event.preventDefault();
    return false;
  }
  let password2 = document.getElementById('password2').value;
  if(password2 != password){
    document.getElementById('errors').innerHTML = 'Passwords do not match!\n';
    document.getElementById('password2').focus();
    event.preventDefault();
    return false;
  }
  let usern = document.getElementById('username').value;
  let requestUsername = new XMLHttpRequest();
  requestUsername.open("post", "../phpUtils/verifyUsernameExistance.php",true);
  requestUsername .onreadystatechange = function(){
    if (requestUsername .readyState == 4){
        if(requestUsername.responseText == "true")
        {
          document.getElementById('errors').innerHTML = 'Username already exists!\n';
          document.getElementById('username').focus();
          event.preventDefault();
          return false;
        }
    }
  }
  requestUsername .setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  requestUsername .send(encodeForAjax({username: usern}));

  let em = document.getElementById('email').value;
  let requestEmail = new XMLHttpRequest();
  requestEmail.open("post", "../phpUtils/verifyEmailExistance.php",true);
  requestEmail.onreadystatechange = function(){
    if (requestEmail.readyState == 4){
        if(requestEmail.responseText == "true")
        {
          document.getElementById('errors').innerHTML = 'Email already exists!\n';
          document.getElementById('email').focus();
          event.preventDefault();
          return false;
        }
    }
  }
  requestEmail.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  requestEmail.send(encodeForAjax({email: em}));

  return true;
});
