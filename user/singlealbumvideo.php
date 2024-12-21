<!--  php start -->
<?php
include('header.php');
include('connection.php');
$albumid = $_GET['id'];
$q1 = "select * from video
join album on album.album_ID=video.album_ID_FK
where video.album_ID_FK = $albumid";
$result1 = mysqli_query($connect, $q1);
$q2 = "select * from album 
join artist on album.artist_ID_FK = artist.artist_ID
join music on album.album_ID = music.album_ID_FK
where album_ID = $albumid";;
$result2 = mysqli_query($connect, $q2);
$data2 = mysqli_fetch_assoc($result2);
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

    @media screen and (max-width: 768px) {
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

<!--  Video Area Start  -->
<section id="video-section" class="bg-img bg-overlay bg-fixed" style="padding-bottom:100px;">
    <div class="container">
    <br><br><br><br><br><br><br><br>
        <div class="one-music-songs-area">
            <div class="container">
                <div class="headingcon text-center mb-5">
                    <h1 style="color: #fff;">Videos</h1>
                </div>
                <br><br>
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
                                <video preload="auto" loop controls class="w-100 rounded shadow" style="max-height: 380px;">
                                    <source src="../admin/<?php echo $data1['video_file'] ?>">
                                </video>
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