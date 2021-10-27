<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog w-50">
            <div class="modal-content">
            <div class="modal-header">
                   
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-header justify-content-center">
                    <img src="php/upload/admin/<?php echo $_SESSION['img']; ?>" class=" delete-btn  rounded" alt=" <?php echo $_SESSION['fullname']; ?>">

                </div>
                <div class="modal-body text-dark text-center text-uppercase text-bold fs-5 fw-bold">
                  
                   <?php echo $_SESSION['fullname']; ?>

                </div>
  
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Not Now</button>
                    <button type="button" class="btn btn-primary" id="logout-btn">Logout</button>
                </div>
           
            </div>
        </div>
    </div>

<!-- <a href="logout.php" class="text-white text-decoration-none ">Logout Now</a> -->


<script src="js/global_function.js"></script>
<!-- <script src="js/signup.js"></script> -->



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">



    $(document).ready(function(){


        $('#logout-btn').on('click',function(){

            swal({
                  title: "Are you sure?",
                  text: "Are you Sure Want To logout",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })

                .then((willDelete) => {
                  if (willDelete) {

                        $.ajax({

                            url:'logout.php',
                            type:'POST',
                            data:{logout:"yes"},
                            success:function(data){



                                swal({

                                      title: "Done!",
                                      text: "You Successfully Logout",
                                      icon: "success",

                                }).then((ok)=>{

                                    location.reload();

                                });




                            }




                        })

                    

                  } else {


                    swal({
                              title: "Ohh Great!",
                              text: "You Are Still Login",
                              icon: "success",

                            });

                  

                  }

                });


            

        })


 })

//logout end




</script>
