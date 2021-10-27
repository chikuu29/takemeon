    <!-- preloader script -->
    <script>
        var ploader = document.getElementById("preloader");
        window.addEventListener('load', function() {

            ploader.style.display = "none";


        })
    </script>
    <script src="js/login-signup.js"></script>
    <script>
        $(document).ready(function() {

            $('#contact_btn_submit').on('click', function() {
                var contact_form = document.getElementById('contact_form');
                var formdata = new FormData(contact_form);
                console.log(formdata);
                $.ajax({
                    url: 'php/save_contact.php',
                    type: 'POST',
                    data: formdata,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data == "nan") {

                            openLoginbar();

                        } else {
                            console.log(data);
                            const obj = JSON.parse(data);
                            $('#contact_form')[0].reset();
                            swal({
                                title: obj.title,
                                text: obj.msg,
                                icon: obj.error,


                            })

                        }
                    }
                });
            });
        });
    </script>

    </body>

    </html>