<!--  php start  -->
<?php
include('header.php');
include('connection.php');
if (isset($_GET['artistid'])) {
    $artistid = $_GET['artistid'];
    $q = "select * from video 
    join album on album_ID = video.album_ID_FK
    join artist on artist_ID = video.artist_ID_FK
    where video.artist_ID_FK = $artistid";
    $result = mysqli_query($connect, $q);
} else if (isset($_GET['genreid'])) {
    $genreid = $_GET['genreid'];
    $q = "select * from video 
    join album on album_ID = video.album_ID_FK
    join artist on artist_ID = video.artist_ID_FK
    where video.genre_ID_FK = $genreid";
    $result = mysqli_query($connect, $q);
} else {
    $q = "select * from video 
    join album on album_ID = video.album_ID_FK
    join artist on artist_ID = video.artist_ID_FK";
    $result = mysqli_query($connect, $q);
}
$q1 = "select * from artist";
$result1 = mysqli_query($connect, $q1);
$q2 = "select * from genre";
$result2 = mysqli_query($connect, $q2);
$is_logged_in = isset($_SESSION['user_ID']);
?>
<!--  php end  -->

<!--  styling start  -->
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
<!--  styling end  -->

<!--  dropdown start  -->
<section class="featured-artist-area section-padding-100 bg-img bg-overlay bg-fixed" style="background-image: url(img/bg-img/bg-4.jpg);">
    <div class="container">
        <div class="one-music-songs-area">
            <div class="container">
                <br><br><br>
                <div class="row">
                    <!-- Select Artist start -->
                    <div class="select-job-items2">
                        <select name="select2" class="select1" onchange="redirecttopage()">
                            <option value="">Artist</option>
                            <?php while ($data1 = mysqli_fetch_assoc($result1)) { ?>
                                <option value="<?php echo $data1['artist_ID'] ?>"><?php echo $data1['artist_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!--  Select Artist End-->
                    <!-- Select Genre start -->
                    <div class="select-job-items2">
                        <select name="select3" class="select2" onchange="redirecttopage1()">
                            <option value="">Genres</option>
                            <?php while ($data2 = mysqli_fetch_assoc($result2)) { ?>
                                <option value="<?php echo $data2['genre_ID']; ?>"><?php echo $data2['genre_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!-- Select Genre End-->
                </div>
            </div>
        </div>
    </div>
</section>
<!--  dropdown end -->

<!--  Video Area Start  -->
<section class="bg-img bg-overlay bg-fixed" style="padding-bottom:100px;">
    <div class="container">
        <div class="one-music-songs-area">
            <div class="container">
                <div class="headingcon text-center mb-5">
                    <h1 style="color: #fff;">Videos</h1>
                </div>
                <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                    <br><br><br><br><br><br>
                    <div class="row">
                        <div class="col-12 col-md-6 mb-4 mb-md-0">
                            <div class="song-thumbnail">
                                <img style="height:380px;width:400px;" src="../Admin/<?php echo $data['album_image'] ?>" alt="">

                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-4 mb-md-0">
                            <div class="song-play-area text-center">
                                <div class="song-name mb-3">
                                    <p><?php echo $data['title'] ?> by <?php echo $data['artist_name'] ?></p>
                                </div>
                                <?php if ($is_logged_in) { ?>
                                    <video preload="auto" loop controls class="w-100 rounded shadow" style="max-height: 380px;">
                                        <source src="../admin/<?php echo $data['video_file'] ?>">
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

<!--  Javascript start  -->
<script>
    function redirecttopage() {
        let selectelement = document.querySelector('.select1');
        let value = selectelement.value;
        if (value) {
            window.location.href = "video.php?artistid=" + value;
        }
    }

    function redirecttopage1() {
        let selectelement = document.querySelector('.select2');
        let value = selectelement.value;
        if (value) {
            window.location.href = "video.php?genreid=" + value;
        }
    }

    function handlePlay(event) {
        var isLoggedIn = <?php echo isset($_SESSION['user_ID']) ? 'true' : 'false'; ?>;
        if (!isLoggedIn) {
            event.preventDefault();
            alert("Kindly login to access this content.");
        }
    }
</script>
<!--  Javascript end  -->