<?php include 'header.php' ?>
<?php

include 'admin/php/config.php';
if (!isset($_GET['city'])) {
    header('location:index.php');
} else {
    $city_name = $_GET['city'];
    $get_city_data = "SELECT * FROM city INNER JOIN state ON city.state_name=state.state_name AND
     city.slug='{$city_name}'";
    $result = mysqli_query($con, $get_city_data);
    $row = mysqli_fetch_assoc($result);
}


?>

<title><?php echo $row['city_name']; ?></title>
<meta name="description" content="<?php echo $row['city_short_desc']; ?>">

</head>

<body>
    <!-- --------Preloader------------------ -->
    <div id="preloader"></div>
    <!-- --------Preloader------------X------ -->

    <?php include 'navbar.php' ?>
    <!----------login and Signup page ------x--------->

    <div class="content-bg">

        <img src="<?php echo $hostname; ?>/admin/php/upload/city/<?php echo $row['city_img']; ?>" alt="<?php echo $row['city_img']; ?>">

        <span class="text-center"><?php echo $row['city_name']; ?></span>

    </div>
    <!-- -----------------NAVIGATOR------------------------ -->
    <div class="naviagation-page container">
        <ul>
            <li><a href="index.php">Home</a><i class="fas fa-chevron-right"></i></li>
            <li><a href="state.php?state=<?php echo $row['slug_name']; ?>"><?php echo $row['state_name']; ?></a><i class="fas fa-chevron-right"></i></li>
            <li><a href="#"><?php echo strtoupper($row['slug']); ?></a></li>

        </ul>
    </div>
    <!-- -----------------NAVIGATOR------------x------------ -->
    <!-- -----------------SIDE CONTEN----------------------  -->
    <div class="container">

        <div class="recent-post-container">
            <div class="post">
                <h1 class="headding"> ABOUT
                    <?php echo $row['city_name']; ?>
                </h1>
                <div>
                    <?php echo $row['city_location']; ?>
                </div>
                <p class="content-desc">
                    <?php

                    $finalstring = $row['city_long_desc'];
                    $total_word = str_word_count($row['city_long_desc']);
                    $string_length = strlen($row['city_long_desc']);

                    echo substr($finalstring, 0, $string_length / 2);


                    ?>
                    <span id="more" style="display: none;">
                    <?php echo substr($finalstring, $string_length / 2, $string_length); ?></span>
                </p>

                <button id="read-btn" onclick="readmorefunc()">Read More<i class="fas fa-location-arrow"></i></button>

            </div>
            <div class="sidebar">
                <div class="releted-post">
                    <div class="headding">Related Post</div>
                    <div class="r-post">
                    <?php
                             $fetch_post_query ="SELECT * FROM blog_post WHERE blog_post_city='{$city_name}'";
                             $fetch_post = mysqli_query($con,$fetch_post_query);
                             if(mysqli_num_rows($fetch_post)>=1){
                                
                                 while($post=mysqli_fetch_assoc($fetch_post)){

                                    echo  "<li><a href='post.php?q=$post[blog_post_slug]'>$post[blog_post_name]</a></li>";

                                 }
                            

                             }else{
                                 echo "<p>No Data Availble</p>";
                             }

                        ?>
                    </div>

                </div>


                <div class="ads">

                </div>




            </div>

        </div>




    </div>

    <!-- -----------------SIDE CONTEN-----------X-----------  -->


    <!-- google ads -->
    <div class="container ads-banner">

    </div>
    <!-- google ads -->
    <!-- --------------BEST PLACE CONTAINER ----------- -->
    <section class="container">
        <h1 class="headding">Best Place</h1>
        <div class="content-noslickbar">
            <?php

            $get_post ="SELECT * FROM post INNER JOIN city ON post.city_name=city.city_name 
            AND city.city_name='{$city_name}'";

            $post=mysqli_query($con,$get_post);
            if(mysqli_num_rows($post)>0){

                while($p=mysqli_fetch_assoc($post)){

                    echo "<div class='item'>
                    <a href='attractions.php?q=$p[post_slug]'>
                        <img src='$hostname/admin/php/upload/atraction/$p[post_img]' alt='$p[post_img]'>
                        <div class='item-placetext-place'>
                          
                            <a href='attractions.php?q=$p[post_slug]'>$p[post_name]</a>
                        </div>
                    </a>
                </div>";

                }

            }else{
                echo "<p>No Data Found</p>";
            }

            ?>

          
          

        </div>


    </section>


    <!-- google ads -->
    <div class="container ads-banner">

    </div>
    <!-- google ads -->



    <!-- --------------BEST PLACE CONTAINER ----------- -->


    <!-- -----------youtube video -holder-------- -->
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


    <!-- -----------youtube video -holder-------- -->
    <!-- google ads -->
    <div class="container ads-banner">

    </div>
    <!-- google ads -->





    <!-------------Contact Us-------  -->
    <?php include 'contact.php'  ?>
    <!-------- foooter -----X------>


    <?php include 'footer.php' ?>