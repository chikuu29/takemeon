var form = document.getElementById('form');
var submit = document.getElementById('save-btn');
var msg = document.getElementById('error-msg');

var otp_form = document.getElementById('otp-form');
var otp_submit = document.getElementById('user-otp-submit');
var otp_input = document.getElementById('otp-input').value;
var otp_msg = document.getElementById('otpmsg');



// otp.style.display="none";
form.submit = (e) => {
  e.preventDefault();
}

submit.onclick = () => {
  const xhr = new XMLHttpRequest();
  xhr.open("post", "php/signup.php", true);
 
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.responseText;
        
        if (data == "ok") {
          msg.innerHTML = "Plase Check Your Spam/Email We Send OTP To Your  Email";
          otp_form.style.display = "block";

        } else {

          msg.innerHTML = data;
        }




      }
    }
  }
  let formdata = new FormData(form);
  xhr.send(formdata);


}

otp_submit.onclick = () => {

  console.log(otp_input);
  const xhr = new XMLHttpRequest();
  xhr.open("post", "php/otp-validation.php", true);

  xhr.onprogress = function () {
    preloder.style.display = "block";
  }
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.responseText;

        setInterval(function () {
          preloder.style.display = "none";
        }, 2000)

        if (data == "ok") {
          // otp_msg.style.innerHTML="Congratulation Your Email Is Now Verified";
          alert("Congratulation Your Email Is Now Verified");
          location.href="newuser.php";
        
        } else {
          otp_msg.innerHTML=data;
        
        
        }

      }
    }
  }

  let otp=new FormData(otp_form);
  xhr.send(otp);



}


