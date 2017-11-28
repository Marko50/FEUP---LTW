function encodeForAjax(data) {
  return Object.keys(data).map(function(k){
    return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
  }).join('&');
}

let form = document.getElementsByTagName('form')[0];
form.addEventListener('submit', function(event){
  let password = document.getElementById('password');
  if(password.length < 5){
    alert('Please pick a password with more than 5 caracters\n');
    event.preventDefault();
    return false;
  }
  let password2 = document.getElementById('password2');
  if(password2 != password){
    alert('Passwords do not match!\n');
    event.preventDefault();
    return false;
  }
  let username = document.getElementById('username');
  let email = document.getElementById('email');
  
  return true;
});
