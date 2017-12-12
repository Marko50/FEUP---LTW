let formImage = document.getElementsByTagName('form')[1];
formImage.addEventListener('submit', function(event){
  let inp = document.getElementById('photoId');
  if(inp.files.length === 0){
      document.getElementById('errors').innerHTML = 'No file selected!\n';
      document.getElementById('photoId').focus();
      event.preventDefault();
      return false;
    }

});
