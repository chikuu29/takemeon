function openNav() {
  // document.querySelector(".overlay").style.display="black";
  document.getElementById("mobail-nav").style.width = "250px";
 
}

function closeNav() {
  document.getElementById("mobail-nav").style.width = "0%";
  // document.querySelector(".overlay").style.display="none";
 

}

// for open navbar
function openLoginbar() {
  
  document.getElementById('loginsighup').style.display = 'block';
}
function closeloginbar() {
  document.getElementById('loginsighup').style.display = 'none';
}

function logout(){
  document.getElementById('logout').style.display='block';
}
function closelogout(){
  document.getElementById('logout').style.display='none';
}




