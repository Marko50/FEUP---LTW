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

  let node = document.createElement("DIV");
  let description = document.getElementById('itemtext').value;
  let limitdate = document.getElementById('datelimit').value;
  node.innerHTML = '<p> To do untill ' + limitdate + ': ' + desciption + '</p>';
  let items = document.getElementsByTagName('section')[0];
  items.appendChild(node);
  return true;
});
