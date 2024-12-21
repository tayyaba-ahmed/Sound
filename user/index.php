<!-- php Start -->
<?php
include("header.php");
include("connection.php");
$q = "SELECT * from artist
LIMIT 4";
$result = mysqli_query($connect, $q);
$q1 = "select * from album";
$result1 = mysqli_query($connect, $q1);
$q2 = "select * from music join artist on 
music.artist_ID_FK = artist.artist_ID
where music.music_ID = 10";
$result2 = mysqli_query($connect, $q2);
$data2 = mysqli_fetch_assoc($result2);
$is_logged_in = isset($_SESSION['user_ID']);
?>
<!-- php end -->

<!-- styling Start -->
<style>
    .featured-artist-area {
        position: relative;
        padding: 100px 0;
        background-size: cover;
        background-position: center;
        color: #fff;
    }

    .bg-img {
        background-image: url('img/bg-img/bg-4.jpg');
        background-attachment: fixed;
    }

    .container {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 15px;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .single-album-area:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }

    .single-album-area:hover .hover-button {
        display: block;
    }

    .single-album-area {
        position: relative;
        overflow: hidden;
        border: 1px solid #ddd;
        border-radius: 8px;
    }

    .album-thumb {
        position: relative;
    }

    .album-thumb img {
        width: 100%;
        border-bottom: 1px solid #ddd;
        transition: filter 0.3s;
    }

    .hover-button {
        display: block;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 150px;
        color: #007bff;
        padding: 10px 15px;
        border: 2px solid white;
        border-radius: 0px;
        text-decoration: none;
        display: none;
        text-align: center;
        transition: all;
    }

    .hover-button:hover {

        display: block;
        box-shadow: 0 7px 30px rgba(0, 0, 0, 0.4);
        transform: translate(1);
    }

    .single-album-area:hover .hover-button {
        display: block;
        color: black;
    }

    .single-album-area:hover {
        filter: brightness(0.7);
        transform: scale(1.05);
    }

    .single-album-area:hover .album-thumb img {
        filter: brightness(0.7);
    }
</style>
<!-- styling end -->

<!-- Hero Area Start -->
<section class="hero-area">
    <div class="hero-slides owl-carousel">
        <!-- Single Hero Slide -->
        <div class="single-hero-slide d-flex align-items-center justify-content-center">
            <!-- Slide Img -->
            <div class="slide-img bg-img" style="background-image: url(img/hero1.jpg);"></div>
            <!-- Slide Content -->
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-slides-content text-center">
                            <h6 data-animation="fadeInUp" data-delay="100ms">Latest album</h6>
                            <h2 data-animation="fadeInUp" data-delay="300ms">Dive into Sound!<span>Dive into Sound!</span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Hero Slide -->
        <div class="single-hero-slide d-flex align-items-center justify-content-center">
            <!-- Slide Img -->
            <div class="slide-img bg-img" style="background-image: url(img/hero2.jpeg);"></div>
            <!-- Slide Content -->
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-slides-content text-center">
                            <h6 data-animation="fadeInUp" data-delay="100ms">Latest album</h6>
                            <h2 data-animation="fadeInUp" data-delay="300ms">Find Your Vibe!<span>Find Your Vibe!</span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--  Hero Area End  -->

<!--Latest Albums Area Start -->
<section class="latest-albums-area section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading style-2">
                    <h2>Latest Albums</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="albums-slideshow owl-carousel">
                    <?php while ($row1 = mysqli_fetch_assoc($result1)) { ?>
                        <div class="single-album" onclick="handlePlay(event)">
                            <?php if (isset($_SESSION['user_ID'])) { ?>
                                <a href="singlealbum.php?albumid=<?php echo $row1['album_ID']; ?>">
                                <?php } else { ?>
                                <?php } ?>
                                <img src="../admin/<?php echo $row1['album_image'] ?>" alt="">
                                <div class="album-info">
                                    <h5><?php echo $row1['album_name'] ?></h5>
                                </a>
                        </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Latest Albums Area End -->

<!--  Artist Area start  -->
<section class="oneMusic-buy-now-area has-fluid bg-gray section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="section-heading style-2">
                    <h2> Popular Artists</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="col-12 col-md-6 col-lg-3 col-lg-2">
                    <div class="single-album-area wow fadeInUp" data-wow-delay="100ms">
                        <div class="album-thumb">
                            <img src="../admin/<?php echo $row['artist_image'] ?>" alt="" style="height: 300px;">
                            <div class="hover-button" onclick="handlePlay(event)">
                                <?php
                                if (isset($_SESSION['user_ID'])) { ?>
                                    <a href="artist.php?artistid=<?php echo $row['artist_ID']; ?>">View More</a>
                                <?php } else { ?>
                                    <a href="index.php">View More</a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="album-info" style="padding: 10px; text-align: center;">
                            <a href="#">
                                <h5 style="margin: 0; color: #333;"><?php echo $row['artist_name']; ?></h5>
                            </a>
                            <p style="margin: 0; color: #666; text-align:justify;"><?php echo $row['artist_bio']; ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- Artist Area end  -->

<!-- Latest song Area Start -->
<section class="featured-artist-area section-padding-100 bg-img bg-overlay bg-fixed" style="background-image: url(img/bg-img/bg-4.jpg);">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-12 col-md-5 col-lg-4">
                <div class="featured-artist-thumb">
                    <img src="../admin/<?php echo $data2['artist_image'] ?>" alt="">
                </div>
            </div>
            <div class="col-12 col-md-7 col-lg-8">
                <div class="featured-artist-content">
                    <div class="section-heading white text-left mb-30">
                        <p>See what’s new</p>
                        <h2>Our Latest Song</h2>
                    </div>
                    <p><?php echo $data2['description']; ?></p>
                    <div class="song-play-area" onclick="handlePlay(event)">
                        <div class="song-name">
                            <p><?php echo $data2['title'] ?></p>
                        </div>
                        <audio preload="auto" controls>
                            <?php if ($is_logged_in) { ?>
                                <source src="../admin/<?php echo $data2['music_file']; ?>">
                            <?php } ?>
                        </audio>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--  latest song Area End  -->

<!-- Miscellaneous Area Start -->
<section class="miscellaneous-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <!-- New Hits Songs start -->
            <div class="col-12 col-lg-6">
                <div class="new-hits-area mb-100">
                    <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                        <p>See what’s new</p>
                        <h2>New Hits</h2>
                    </div>
                    <?php
                    $q4 = "select * from music join album on music.album_ID_FK = album.album_ID 
                    join artist on music.artist_ID_FK = artist.artist_ID
                    LIMIT 4";
                    $result4 = mysqli_query($connect, $q4);
                    while ($data4 = mysqli_fetch_assoc($result4)) { ?>
                        <div class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="150ms">
                            <div class="first-part d-flex align-items-center">
                                <div class="thumbnail">
                                    <img src="../admin/<?php echo $data4['album_image'] ?>" alt="">
                                </div>
                                <div class="content-">
                                    <h6><?php echo $data4['title'] ?></h6>
                                    <p><?php echo $data4['album_name'] ?></p>
                                </div>
                            </div>
                            <button onclick="handlePlay(event)" style="border: none; background-color: transparent; outline:none">
                                <audio preload="auto" controls>
                                    <?php if ($is_logged_in) { ?>
                                        <source src="../admin/<?php echo $data4['music_file']; ?>">
                                    <?php } else { ?>

                                    <?php } ?>
                                </audio>
                            </button>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- New Hits Songs end -->
            <!--  Popular Artists start -->
            <div class="col-12 col-lg-6">
                <div class="popular-artists-area mb-100">
                    <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                        <p>See what’s new</p>
                        <h2>Popular Artist</h2>
                    </div>
                    <?php
                    $q3 = "select * from artist";
                    $result3 = mysqli_query($connect, $q3);
                    while ($data3 = mysqli_fetch_assoc($result3)) { ?>
                        <div class="single-artists d-flex align-items-center wow fadeInUp" data-wow-delay="100ms">
                            <div class="thumbnail">
                                <img src="../admin/<?php echo $data3['artist_image'] ?>" alt="" style="height:76px;">
                            </div>
                            <div class="content-">
                                <p><?php echo $data3['artist_name'] ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!--  Popular Artists end  -->
            </div>
        </div>
    </div>
</section>
<!-- Miscellaneous Area End  -->

<!--  Contact Area Start -->
<section class="contact-area section-padding-100 bg-img bg-overlay bg-fixed has-bg-img" style="background-image: url(img/bg-img/bg-2.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading white wow fadeInUp" data-wow-delay="100ms">
                    <p>See what’s new</p>
                    <h2>Get In Touch</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <!-- Contact Form Area -->
                <div class="contact-form-area">
                    <form action="send_email.php" method="post">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group wow fadeInUp" data-wow-delay="100ms">
                                    <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group wow fadeInUp" data-wow-delay="200ms">
                                    <input type="email" class="form-control" id="email" placeholder="E-mail" name="email">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group wow fadeInUp" data-wow-delay="300ms">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject" name="subject">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group wow fadeInUp" data-wow-delay="400ms">
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message" name="message"></textarea>
                                </div>
                            </div>
                            <div class="col-12 text-center wow fadeInUp" data-wow-delay="500ms">
                                <button class="btn oneMusic-btn mt-30" type="submit">Send <i class="fa fa-angle-double-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--  Contact Area End  -->

<?php
include('footer.php');
?>

<script>
    function handlePlay(event) {
        var isLoggedIn = <?php echo isset($_SESSION['user_ID']) ? 'true' : 'false'; ?>;
        if (!isLoggedIn) {
            event.preventDefault();
            alert("Kindly login to access this content.");
        }
    }
</script>