<?php

session_start();

if(isset($_SESSION['admin_user_id']) && isset($_SESSION['password']) ){

    header('location:dash.php');
}



$cockie_admin_email="";
$cockie_admin_password="";


if(isset($_COOKIE['admin_email']) && isset($_COOKIE['admin_psw'])){

$cockie_admin_email=$_COOKIE['admin_email'];
$cockie_admin_password=$_COOKIE['admin_psw'];


} 

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Login</title>
        <link rel="shortcut icon" href="img/urllogo.png" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
            <link rel="stylesheet" href="css/style.css">
        </head>
        <body>
            <div class="container">
                <div class="image-logo">
                    <span>Welcome To</span>
                    <div class="logo"> <img src="img/glogo.png" alt="takemeon"></div>
                    <span>Admin Panel</span>
                </div>
            </div>
            <div class="container border border-light p-5">
                <form id="login-from" >
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter email" value="<?php echo $cockie_admin_email; ?>" >
                    </div>
                    <div class="form-group mb-3 ">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="psw" class="form-control mb-3" id="exampleInputPassword1" placeholder="Password"  value="<?php echo $cockie_admin_password; ?>" >
                        
                    </div>
                    <div class="form-group form-check mb-3">
                        <input type="checkbox" class="form-check-input" checked name="remember" id="exampleCheck1">
                        <label class="form-check-label"  for="exampleCheck1" >Remember Me</label>
                    </div>
                    <div class="">
                        <button type="button" name="submit" id="login-btn-submit" class="btn btn-primary">Login</button>
                        
                    </div>
                </form>
            </div>
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark text-center" id="staticBackdropLabel">Hello</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-dark text-center">
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-lg" data-bs-dismiss="modal">Close</button>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
            crossorigin="anonymous"></script>
            
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script type="text/javascript">
            $(document).ready(function(){
            // $('.form-check-input').on('click',function(){
            //   var input_type=$('#exampleInputPassword1');
            //    if (input_type.attr('type')=='password') {
            //          input_type.attr('type','text');
            //    }else{
            //     input_type.attr('type','password');
            //    }
            
            // })
            $('#login-btn-submit').on('click',function(){

            var login_form=document.getElementById('login-from');
            var login_form_data=new FormData(login_form);

            $.ajax({
                    url:'php/login.php',
                    type:'POST',
                    data:login_form_data,
                    contentType: false,
                    processData: false,
                    success:function(data){

                    if(data=="DONE"){

                            location.href="dash.php";
                    }else{
            
                            $('.modal-body').html(data);
                            $('#staticBackdrop').modal('show');
            
                        }
                   }
                });
            });
        });
            </script>
        </body>
    </html>