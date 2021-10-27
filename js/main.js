
window.onscroll = function () { myFunction() };

    var navbar = document.getElementById("nav");
    var sticky = navbar.offsetTop;


    var home = document.querySelector('.navigation .home');
    var login = document.querySelector('.navigation .mlogin');
   

    var logo = document.querySelector(".image-logo img");
    var navtext=document.querySelectorAll('.desktop-nav a');
    var dlogin=document.querySelector('.login a');
  
  
   


function myFunction() {
        // 
        // console.log(window.pageYOffset);
        if (window.pageYOffset > 0) {
            navbar.classList.add('activescoll');
            
            for (let index = 0; index < navtext.length; index++) {
               navtext[index].style.color="black";
                
            }
            dlogin.style.color="black";

            
            home.style.color = "black";
            login.style.color = "black";
            navbar.style.background="white";
            logo.style.filter="brightness(1)";
            
        
            


        }
        else {
            navbar.classList.remove('activescoll');
            // ------navbar text color change-------
            for (let index = 0; index < navtext.length; index++) {
               navtext[index].style.color="";
                
            }
             // ------navbar text color change------X-----
            //  ------desktop login color---------
             dlogin.style.color="";
            //  ------desktop login color---x------
            //----------home button---------- 
            home.style.background="";
            home.style.color = "";
            //----------home button----x------ 
            //----------login button---------- 
            login.style.color = "";
            login.style.background="";
            //----------login button---x------- 
            navbar.style.background="";
           
            logo.style.filter="";

        }
    }
// READ MORE JAVA SCRIPT
function readmorefunc(){
               
    var moreText = document.getElementById('more');
    var btn=document.getElementById('read-btn');

if (moreText.style.display ==="none") {
    moreText.style.display="inline";
    btn.innerHTML="Read Less";
  
 
   

    
}else{

    moreText.style.display="none";
    btn.innerHTML='Read More <i class="fas fa-chevron-right"></i>';


}


}

// javascript for search box 
function search_value(str) {
    
    var search_result=document.getElementById('search-item');
    if (str==" ") {
        search_result.style.display="none";
    }else{
        search_result.style.display="block";
    }
   
    
  
}



// Get the modal
var modal = document.getElementById('loginsighup');

var c = document.querySelector('.third-half');
var d = document.querySelector('.second-half');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
 
    if (event.target == modal) {
        modal.style.display = "none";
    }
    if (event.target == d || event.target == c) {
        document.getElementById('search-item').style.display = "";
    } else {
        document.getElementById('search-item').style.display = "none";
    }
}






