window.addEventListener('click', function(e){
  if (document.getElementById('main_div').contains(e.target)){
console.log("");
  } else{
    window.location.href = "../index.php";

  }
});
// not using jquery
window.onload = function(){
  var anchors = document.getElementsByTagName('a');
  for (var i=0; i<anchors.length; i++){
    anchors[i].setAttribute('target', '_blank');
  }
}
