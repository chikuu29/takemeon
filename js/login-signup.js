$(document).ready(function () {

    // log out start


    $('#logout-alert').on('click', function () {


        swal({

            title: "Are you sure?",
            text: "Are you Sure Want To logout",
            icon: "warning",
            buttons: true,
            dangerMode: true,

        }).then((logout) => {

            if (logout) {

                $.ajax({

                    url: 'logout.php',
                    type: 'POST',
                    data: { logout: "yes" },
                    success: function (data) {

                        swal({

                            title: "Done!",
                            text: "You Successfully Logout",
                            icon: "success",

                        }).then((ok) => {

                            location.reload();

                        });

                    }

                });

            } else {


                swal({

                    title: "Ohh Great!",
                    text: "You Are Still Login",
                    icon: "success",

                });

            }

        });




    })






    // logout end
    // user login

    $('#user-login-btn').on('click', function () {

        var login_form = document.getElementById('user-login-form');
        var login_form_data = new FormData(login_form);
        $.ajax({
            url: 'php/login.php',
            type: 'POST',
            data: login_form_data,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data == "DONE") {


                    swal({
                        title: "Good Job!",
                        text: "Authentication Succesfull",
                        icon: "success",


                    })
                        .then((go) => {

                            location.reload();


                        });



                } else {
                    if (data == "Your Email-id OTP Not Verified") {

                        swal({
                            title: "Opps!",
                            text: data,
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,

                        })
                            .then((go) => {

                                if (go) {

                                    location.href = "otp-verification.php";


                                } else {

                                    location.reload();
                                }
                            });



                    } else {
                        swal({
                            title: "Sorry",
                            text: data,
                            icon: "error",

                        });





                    }

                }
            }

        });
    });

});