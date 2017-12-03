function isValid(str){
 let format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
 return format.test(str);
}

let form = document.getElementsByTagName('form')[0];
form.addEventListener('submit', function(event){
  let todoListTitle = document.getElementById('title').value;
  if(isValid(todoListTitle)){
    event.preventDefault();
    document.getElementById('errors').innerHTML = 'Title has invalid characters!\n';
    document.getElementById('title').focus();
    event.preventDefault();
    return false;
  }

  return true;
});
