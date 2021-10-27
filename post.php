<?php include 'header.php' ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/post.css">


<?php
include_once 'admin/php/config.php';
$post_name = $_GET['q'];
$sql = "SELECT * FROM blog_post WHERE blog_post_slug='{$post_name}'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);



?>
<title><?php echo $row['blog_post_slug'] ?></title>
<meta name="description" content="<?php echo $row['blog_post_seo_desc']; ?>">

</head>

<body>
    <!-- --------Preloader------------------ -->
    <!-- <div id="preloader"></div> -->
    <!-- --------Preloader------------X------ -->
    <?php include 'navbar.php' ?>
    <div class="ads container">


    </div>



    <div class="container-md">
        <div class="naviagation-page">
            <ul>
                <li><a href="index.php">Home</a><i class="fas fa-chevron-right"></i></li>
                <li><a href="post.php?q=<?php echo $row['blog_post_slug']; ?>"><?php echo $row['blog_post_slug']; ?></a></li>
            </ul>
        </div>

        <div class="row p-3">
            <!-- This div takes 3 out of
                 12 columns in the grid -->
            <div class="col-9">

                <div class="cool-look">
                    <h1 id="post-titel"><?php echo $row['blog_post_name']; ?></h1>
                    <p id="post-desc"><?php echo $row['blog_post_desc']; ?></p>
                </div>
                <div class="cool-look">
                    <img src="<?php echo $hostname; ?>/admin/php/upload/post/<?php echo $row['blog_post_img']  ?>" class="w-100 post-img">
                </div>
                <div class="post-date-holdercool-look">
                    <p>Public &nbsp;<Span id="post-date"><?php echo $row['blog_post_date'];  ?></Span></p>
                </div>
                <div class="cool-look" style="text-align: justify;">
                    <!-- <p id="post-content"></p> -->
                    <?php echo $row['blog_post_content']; ?>
                </div>
                <!-- google ads -->
                <div class="cool-look w-100 ads-banner">

                </div>
                <!-- google ads -->





                <div class="comment-box">
                    <p class="h3">Comment Box</p>
                    <div class="comment-input">
                        <form action="" id="comment-form">
                            <input type="text" id="comment_field" placeholder="Writing...">
                            <button type="button" id="comment-submit-btn"><i class="fas fa-paper-plane"></i></button>
                        </form>
                        <input type="number" hidden id="indivisual_post_id" value="<?php echo $row['blog_post_id']; ?>">

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

                            $cityname = "$row[blog_post_city]";
                            $releted_post = "SELECT * FROM blog_post WHERE blog_post_city='{$cityname}'";
                            $result = mysqli_query($con, $releted_post);

                            if (mysqli_num_rows($result) > 0) {
                                while ($post = mysqli_fetch_assoc($result)) {

                                    echo "<li><a href='post.php?q=$post[blog_post_slug]'>$post[blog_post_name]</a></li>";
                                }
                            } else {
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
    <div class="container cool-look w-100 ads-banner">

    </div>
    <!-- google ads -->

    <!-- google ads -->
    <div class="container cool-look w-100 ads-banner">

    </div>
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
    <div class="container cool-look w-100 ads-banner">

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
                        url: 'php/fetch_blog_post_comment.php',
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
                    url: 'php/save_post_comment.php',
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