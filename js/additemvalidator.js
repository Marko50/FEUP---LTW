function encodeForAjax(data) {
  return Object.keys(data).map(function(k) {
    return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
  }).join('&');
}

var buttonlistener = function(itemID) {
  let itemChangeRequest = new XMLHttpRequest();
  itemChangeRequest.open("post", "../phpUtils/changeitem.php", false);
  itemChangeRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  itemChangeRequest.send(encodeForAjax({itemID: itemID}));
}

let form = document.getElementsByTagName('form')[0];
form.addEventListener('submit', function(event) {
  let date = document.getElementById("datelimit").value;
  let varDate = new Date(date); //dd-mm-YYYY
  let today = new Date();
  today.setHours(0, 0, 0, 0);

  if (varDate < today) {
    document.getElementById('errors').innerHTML = 'Date has already passed!\n';
    document.getElementById('datelimit').focus();
    event.preventDefault();
    return false;
  }
  let description = document.getElementById('itemtext').value;
  if (description.length == 0) {
    document.getElementById('errors').innerHTML = 'You must write something!\n';
    document.getElementById('itemtext').focus();
    event.preventDefault();
    return false;
  }
  let limitdate = document.getElementById('datelimit').value;
  let tdID = document.getElementById('todolistid').value;
  let itemRequest = new XMLHttpRequest();
  itemRequest.onreadystatechange = function(){
    if (itemRequest.readyState == XMLHttpRequest.DONE){
        let lastid = parseInt(itemRequest.responseText);
        let node = document.createElement("DIV");
        node.innerHTML = '<p> <input type="checkbox" class="checkboxitem" value ='
        + lastid + ' > </input> To do untill '
         + limitdate + ': ' + description +
        '</p>';
        node.addEventListener('click', function() {
          buttonlistener(lastid);
        });
        let items = document.getElementsByTagName('section')[0];
        items.appendChild(node);
        event.preventDefault();
    }
  }
  itemRequest.open("post", "../phpUtils/additem.php", false);
  itemRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  itemRequest.send(encodeForAjax({todolistid: tdID, itemtext: description, datelimit: limitdate}));
  return true;
});


let buttons = document.getElementsByClassName("checkboxitem");

for (let i = 0; i < buttons.length; i++) {
  buttons[i].addEventListener('click', function() {
    var id = parseInt(buttons[i].value);
    buttonlistener(id);
  });
}
