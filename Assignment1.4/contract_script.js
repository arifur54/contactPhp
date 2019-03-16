
function loadDoc(url, cfunction) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		cfunction(this);
    }
  };
  xhttp.open("GET", url, true);
  xhttp.send();
}

function loadId(id){
	loadDoc('form_process.php?deleteId=' + id, function(){ window.location.reload()});
}
/*function loadEdit(id){
    window.alert(id);
    loadDoc('form_process.php?editID=' + id, function () {
        window.open('UpdateContact.php?' +id);
    })
}*/

//\"location.href = 'UpdateContact.php?editID=$Id'