<!--  php start -->
<?php
include('header.php');
include('connection.php');
$languageid = $_GET['languageid'];
$q = "select * from music
join album on album.album_ID=music.album_ID_FK
where music.language_ID_FK = $languageid";
$result = mysqli_query($connect, $q);
$q1 = "select * from video
join album on album.album_ID=video.album_ID_FK
where video.language_ID_FK = $languageid";
$result1 = mysqli_query($connect, $q1);
$q3 = "select * from language where language_ID = $languageid";
$result3 = mysqli_query($connect, $q3);
$data3 = mysqli_fetch_assoc($result3);
$is_logged_in = isset($_SESSION['user_ID']);
?>
<!--  php end -->

<!--  styling start -->
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

    .select-job-items2 {
        margin: 15px 0;
        width: 100%;
        text-align: center;
    }

    .select1,
    .select2 {
        width: 100%;
        padding: 12px 20px;
        font-size: 16px;
        color: #333;
        border: 1px solid #ddd;
        border-radius: 4px;
        background-color: rgba(255, 255, 255, 0.9);
        transition: all 0.3s ease;
    }

    .select1:hover,
    .select2:hover {
        border-color: #007bff;
        background-color: rgba(255, 255, 255, 1);
    }

    select option {
        padding: 10px;
        font-size: 16px;
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

    .select-job-items2 {
        flex: 1;
        min-width: 200px;
        max-width: 48%;
        margin: 10px 0;
    }

    @media screen and (max-width: 768px) {
        .select-job-items2 {
            max-width: 100%;
            text-align: left;
        }

        .featured-artist-area {
            padding: 50px 0;
        }
    }

    #video-section {
        padding: 50px 0;
    }

    #video-section .song-thumbnail img {
        object-fit: cover;
        max-height: 380px;
        border-radius: 8px;
    }

    #video-section .song-play-area video {
        max-height: 380px;
        object-fit: cover;
        border-radius: 8px;
    }

    #video-section .headingcon h1 {
        font-size: 2.5rem;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
        margin-bottom: 40px;
    }

    #video-section .song-name p {
        margin-bottom: 20px;
        font-weight: bold;
        text-transform: uppercase;
    }

    @media (max-width: 767px) {

        #video-section .song-thumbnail img,
        #video-section .song-play-area video {
            max-height: 250px;
        }

        #video-section .song-name p {
            font-size: 1.2rem;
        }
    }

    @media (min-width: 768px) {

        #video-section .song-thumbnail img,
        #video-section .song-play-area video {
            max-height: 380px;
        }
    }

    .headingcon {
        width: 200px;
        text-align: center;
        display: inline;
        justify-content: center;
    }
</style>
<!--  styling end -->

<!--  language name start -->
<section class="featured-artist-area section-padding-100 bg-img bg-overlay bg-fixed" style="background-image: url(img/bg-img/bg-4.jpg);">
    <div class="container">
        <div class="one-music-songs-area">
            <div class="container">
                <br><br><br>
                <h1 style="text-align: center; color:#fff;"><?php echo $data3['language_name']; ?></h1>
            </div>
        </div>
    </div>
</section>
<!--  language name end -->

<!--  Song Area Start  -->
<section class="bg-img bg-overlay bg-fixed" style="padding-bottom:100px;">
    <div class="container">
        <div class="one-music-songs-area">
            <div class="container">
                <div class="headingcon">
                    <div>
                        <h1 style="color: #fff;">Music</h1>
                    </div>
                </div>
                <br><br>
                <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                    <br><br>
                    <div class="row">
                        <!--  Details area start -->
                        <div class="col-12">
                            <div class="single-song-area d-flex flex-wrap align-items-end">
                                <div class="song-thumbnail">
                                    <img src="../admin/<?php echo $data['album_image'] ?>" alt="">
                                </div>
                                <div class="song-play-area" onclick="handlePlay(event)">
                                    <div class="song-name">
                                        <p><?php echo $data['title'] ?></p>
                                    </div>
                                    <audio preload="auto" loop controls>
                                        <?php if ($is_logged_in) { ?>
                                            <source src="../admin/<?php echo $data['music_file']; ?>">
                                        <?php } ?>
                                    </audio>
                                </div>
                            </div>
                        </div>
                        <!--  Details area End -->
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<!--  Song Area End  -->

<!--  Video Area Start  -->
<section id="video-section" class="bg-img bg-overlay bg-fixed" style="padding-bottom:100px;">
    <div class="container">
        <div class="one-music-songs-area">
            <div class="container">
                <div class="headingcon text-center mb-5">
                    <h1 style="color: #fff;">Videos</h1>
                </div>
                <?php while ($data1 = mysqli_fetch_assoc($result1)) { ?>
                    <br><br><br><br><br><br>
                    <div class="row">
                        <div class="col-12 col-md-6 mb-4 mb-md-0">
                            <div class="song-thumbnail">
                                <img style="height:380px;width:400px;" src="../admin/<?php echo $data1['album_image'] ?>" alt="" class="img-fluid rounded shadow" style="object-fit: cover; height: 100%; max-height: 380px;">
                            </div>
                        </div>

                        <div class="col-12 col-md-6 mb-4 mb-md-0">
                            <div class="song-play-area text-center">
                                <div class="song-name mb-3">
                                    <p><?php echo $data1['title'] ?></p>
                                </div>
                                <?php if ($is_logged_in) { ?>
                                    <video preload="auto" loop controls class="w-100 rounded shadow" style="max-height: 380px;">
                                        <source src="../admin/<?php echo $data1['video_file'] ?>">
                                    </video>
                                <?php } else { ?>
                                    <video preload="auto" loop controls class="w-100 rounded shadow" style="max-height: 380px;" onclick="handlePlay(event)">
                                        <source src="">
                                    </video>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<!--  Video Area End  -->

<?php
include('footer.php')
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