<!--  php start -->
<?php
include('header.php');
include('connection.php');
$albumid = $_GET['id'];
$q = "select * from music
join album on album.album_ID=music.album_ID_FK
where music.album_ID_FK = $albumid";
$result = mysqli_query($connect, $q);
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

<!--  Song Area Start  -->
<section class="bg-img bg-overlay bg-fixed" style="padding-bottom:100px;">
    <div class="container">
    <br><br><br><br><br><br><br><br>
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
                                <div class="song-play-area">
                                    <div class="song-name">
                                        <p><?php echo $data['title'] ?></p>
                                    </div>
                                    <audio preload="auto" loop controls>
                                        <source src="../admin/<?php echo $data['music_file'] ?>">
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

<?php
include('footer.php')
?>