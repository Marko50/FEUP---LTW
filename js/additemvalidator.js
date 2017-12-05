let form = document.getElementsByTagName('form')[0];
form.addEventListener('submit', function(event){
  let date = document.getElementById("datelimit").value;
  let varDate = new Date(date); //dd-mm-YYYY
  let today = new Date();
  today.setHours(0,0,0,0);

  if(varDate < today) {
    document.getElementById('errors').innerHTML = 'Date has already passed!\n';
    document.getElementById('datelimit').focus();
    event.preventDefault();
    return false;
  }

  let items = document.getElementsByTagName('div')[0];
});
