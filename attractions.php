<?php include 'header.php' ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

<?php
include_once 'admin/php/config.php';
$post_name = $_GET['q'];
$sql = "SELECT * FROM post WHERE post_slug='{$post_name}'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);



?>
<title><?php echo $row['post_name'] ?></title>
<link rel="stylesheet" href="css/post.css">

<meta name="description" content="<?php echo $row['blog_post_seo_desc'] ?>">
    

</head>

<body>
    <!-- --------Preloader------------------ -->
    <div id="preloader"></div>
    <!-- --------Preloader------------X------ -->
    <?php include 'navbar.php' ?>
    <div class="container">


    </div>
    <div class="naviagation-page">
        <ul>
            <li><a href="index.php"><i class="fas fa-home"></i>Home</a><i class="fas fa-chevron-right"></i></li>
            <li><a href="state.php?state=<?php echo strtolower($row['state_name']); ?>"><?php echo strtoupper($row['state_name']); ?></a><i class="fas fa-chevron-right"></i></li>
            <li><a href="cities.php?city=<?php echo strtolower($row['city_name']); ?>"><?php echo strtoupper($row['city_name']); ?></a><i class="fas fa-chevron-right"></i></li>
            <li><a href="attractions.php?q=<?php echo $row['post_slug']; ?>"><?php echo strtoupper($row['post_slug']); ?></a></li>

        </ul>
    </div>


    <div class="container-md">

        <div class="row">
            <!-- This div takes 3 out of
                 12 columns in the grid -->
            <div class="col-9">
                <div class="cool-look mb-2">
                    <h1 id="post-titel" class="headding"><?php echo $row['post_name']; ?></h1>
                    <p id="post-desc" ><?php echo $row['short_desc']; ?></p>
                </div>
                <div class="cool-look">
                    <img src="<?php echo $hostname;?>/admin/php/upload/atraction/<?php echo $row['post_img']  ?>" class="w-100 post-img">
                </div>
                <div class="post-date-holder cool-look">
                    <p>Public &nbsp;<Span id="post-date"><?php echo $row['post_date'];  ?></Span></p>
                </div>
                <div class="cool-look"style="text-align: justify;">
                    <?php echo $row['post_content']; ?>
                </div>
                <br>
                <div class="cool-look place-location"style="text-align: justify;">
                    <?php echo $row['google_location']; ?>
                </div>
                <!-- google ads -->
                <div class="cool-look w-100 ads-banner">

                </div>
                <!-- google ads -->
                <!-- <div class="sear">
                    <div class="sear-container">
                        <div class="sear-item">
                            <i class="fas fa-eye"></i>
                            <span>1000</span>

                        </div>
                        <div class="sear-item">
                            <i class="fas fa-thumbs-up"></i>
                            <span>1000</span>

                        </div>
                        <div class="sear-item">
                            <a href="whatsapp://send?text=This is WhatsApp sharing example using link" data-action="share/whatsapp/share" target="_blank"><i class="fas fa-share-alt"></i></a>
                        </div>

                    </div>

                </div> -->




                <div class="comment-box">
                    <p class="headding">Comment Box</p>
                    <div class="comment-input">
                        <form action="" id="comment-form">
                            <input type="text" id="comment_field" placeholder="Writing...">
                            <button type="button" id="comment-submit-btn"><i class="fas fa-paper-plane"></i></button>
                        </form>
                        <input type="number" hidden id="indivisual_post_id" value="<?php echo $row['post_id']; ?>">

                    </div>



                    <div class="comment">






                    </div>





                </div>

            </div>
            <!--This column takes 9 out of 12 
            columns available-->
            <div class="col-3">

                <div>
                    <div class="ads">

                    </div>
                    <aside class="Releted-post mt-2">
                        <p class="h4 text-center">Releted Post</p>
                        <ul>
                            <?php

                            $cityname="$row[city_name]";
                            $releted_post="SELECT * FROM blog_post WHERE blog_post_city='{$cityname}'";
                            $result=mysqli_query($con,$releted_post);

                            if(mysqli_num_rows($result)>0){
                                while($post=mysqli_fetch_assoc($result)){

                                   echo "<li><a href='post.php?q=$post[blog_post_slug]'>$post[blog_post_name]</a></li>";
                                   
                                }

                            }else{
                                echo "<p>No data Availble</p>";
                            }


                            ?>
                           
                        </ul>

                    </aside>

                    <aside class="side-l-ads">

                    </aside>

                </div>



            </div>
        </div>



    </div>
    <!-- google ads -->
    <div class="container w-100 ads-banner">

    </div>
    <!-- google ads -->

    
 
    <!-- google ads -->

    <!-- <section class="container">
        <div class="headding">Youtube Vlog Video</div>
        <div class="yt-video-holder">
            <div class="yt-video">
                <iframe src="https://www.youtube.com/embed/nbLcrPgMf9w" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="yt-video">
                <iframe src="https://www.youtube.com/embed/8NtR-FOOhuo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="yt-video">
                <iframe src="https://www.youtube.com/embed/QystH8luOfQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="yt-video">
                <iframe src="https://www.youtube.com/embed/zXL392Dmoyc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="yt-video">
                <iframe src="https://www.youtube.com/embed/nbLcrPgMf9w" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="yt-video">
                <iframe src="https://www.youtube.com/embed/8NtR-FOOhuo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="yt-video">
                <iframe src="https://www.youtube.com/embed/QystH8luOfQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="yt-video">
                <iframe src="https://www.youtube.com/embed/zXL392Dmoyc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

        </div>
    </section> -->
    <!-- google ads -->
    <div class="container w-100 ads-banner">

    </div>
    <!-- google ads -->


    <!-------- foooter ----------->
    <!-------------Contact Us-------  -->
    <?php include 'contact.php'  ?>

    <script>
        $(document).ready(function() {



            var post_id = $('#indivisual_post_id').val();

            function load_comment(post_id) {
                setInterval(function() {
                    $.ajax({
                        url: 'php/fetch_comment.php',
                        type: 'POST',
                        data: {
                            post_id: post_id
                        },
                        success: function(data) {

                            $('.comment').html(data);

                        }
                    });

                }, 500);




            }

            load_comment(post_id);

            $('#comment-submit-btn').on('click', function() {


                $comment = $('#comment_field').val();

                $.ajax({
                    url: 'php/save_comment.php',
                    type: 'POST',
                    data: {
                        post_id: post_id,
                        comment: $comment
                    },
                    success: function(data) {
                        const obj = JSON.parse(data);

                        $('#comment-form')[0].reset();
                        swal({
                            title: obj.titel,
                            text: obj.msg,
                            icon: obj.error,


                        })
                    }
                })






            })


        })
    </script>


    <?php include 'footer.php' ?>