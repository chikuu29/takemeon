<?php include 'header.php' ?>

<?php
include_once 'admin/php/config.php';
if (!isset($_GET['state'])) {
    header('location:index.php');
} else {
    $state_name = $_GET['state'];
    $sql = "SELECT * FROM state WHERE state_name='{$state_name}'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
}

?>

<title><?php echo $row['state_name']; ?></title>
<meta name="description" content="<?php echo $row['state_short_desc']; ?>">

</head>

<body>
    <!-- --------Preloader------------------ -->
    <div id="preloader"></div>


    <?php include 'navbar.php' ?>

    <div class="content-bg">

        <img src="<?php echo $hostname;?>/admin/php/upload/state/<?php echo $row['state_img']; ?>" alt="<?php echo $row['state_img']; ?>">

        <span class="text-center"><?php echo $row['state_name']; ?></span>

    </div>
    <!-- -----------------NAVIGATOR------------------------ -->
    <div class="container naviagation-page">
        <ul>
            <li><a href="index.php">Home</a><i class="fas fa-chevron-right"></i></li>
            <li><a href="state.php?state_name=<?php echo $row['slug_name']; ?>"><?php echo $row['state_name']; ?></a><i class="fas fa-chevron-right"></i></li>

        </ul>
    </div>
    <!-- -----------------NAVIGATOR------------x------------ -->
    <!-- -----------------SIDE CONTEN----------------------  -->
    <div class="container">

        <div class="recent-post-container">
            <div class="post">
                <h1 class="headding"> ABOUT
                    <?php echo $row['state_name']; ?>
                </h1>
                <div id="googl_map">
                    <?php echo $row['state_location']; ?>
                </div>
                <p class="content-desc">
                    <?php

                    $finalstring = $row['state_long_desc'];
                    $total_word = str_word_count($row['state_long_desc']);
                    $string_length = strlen($row['state_long_desc']);

                    echo substr($finalstring, 0, $string_length / 2);


                    ?>
                    <span id="more" style="display: none;">
                        <?php echo substr($finalstring, $string_length / 2, $string_length); ?>
                    </span>
                </p>

                <button id="read-btn" onclick="readmorefunc()">Read More<i class="fas fa-location-arrow"></i></button>

            </div>
            <div class="sidebar">
                <div class="releted-post">
                    <div class="headding">Related Post</div>
                    <div class="r-post">
                        <?php
                             $fetch_post_query ="SELECT * FROM blog_post WHERE blog_post_state='{$state_name}'";
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

    <!-- --------------City wise continer ----------- -->
    <section class="container">
        <h1 class="headding">Cities</h1>
        <div class="content-noslickbar">
            <?php

            $get_city = mysqli_query($con, "SELECT * FROM city INNER JOIN state ON city.state_name=state.state_name 
                                   AND state.state_name='{$row['state_name']}'");

            if (mysqli_num_rows($get_city) > 0) {

                while ($q = mysqli_fetch_assoc($get_city)) {

                    echo "<div class='item'>
                        <a href='cities.php?city=$q[slug]'>
                            <img src='$hostname/admin/php/upload/city/$q[city_img]' alt='$q[city_name]'> 
                            <div class='city-item-text-center'>$q[city_name]</div>
                              </a>
                            <div class='item-placetext'>
                                <a href='cities.php?city=$q[slug]'>Know More</a>
                            </div>
                          
                    </div>";
                }
            } else {

                echo '<p>No Data Found</p>';
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








    <!-- -----------------Recent-post--------------------- -->

    <!-------------Contact Us-------  -->
    <?php include 'contact.php'  ?>
    <!-------- foooter -----X------>



    <?php include 'footer.php' ?>