function color_change(value) {
    var elemet=document.body;
    var home=document.getElementById('home');
    var username=document.getElementById('username');
    var change_light=document.querySelector('.col-div-6 .color-change');
    change_light.classList.toggle('color-active');
    if(value==1){
        
       elemet.style.backgroundColor="#cfead9";
       home.style.color="black";
       username.style.color="black";
    }
    if(value==2){
        
        elemet.style.backgroundColor="#1b203d";
        home.style.color="white";
        username.style.color="azure";
    }
  

}

function HideNav() {
    var navbar = document.getElementById('mySidenav');
    var main = document.getElementById('main')
  
    
      if(navbar.style.display=="block"){
        main.style.marginLeft="0px";
        navbar.style.display="none";
      }else{
        main.style.marginLeft="250px";
        navbar.style.display="block";
         
      }

}

// ---------------------Alert Conform-----
