<!--  php start -->
<?php
include('header.php');
include('connection.php');
$albumid = $_GET['albumid'];
$q = "select * from music
join album on album.album_ID=music.album_ID_FK
where music.album_ID_FK = $albumid";
$result = mysqli_query($connect, $q);
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
$userid = $_SESSION['user_ID'];
$q3 = "select * from reviews where user_ID_FK = $userid AND album_ID_FK = $albumid";
$result3 = mysqli_query($connect, $q3);
if (mysqli_num_rows($result3) > 0) { 
    $data3 = mysqli_fetch_assoc($result3);
    $rate = $data3['rating'];
}
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

    .rating-stars {
        font-size: 30px;
        cursor: pointer;
    }

    .rating-message {
        display: none;
        color: green;
    }

    .rating {
        display: flex;
        justify-content: center;
        flex-direction: row-reverse;
        gap: 0.3rem;
        --stroke: #666;
        --fill: #ffc73a;
    }

    .rating input {
        appearance: unset;
    }

    .rating label {
        cursor: pointer;
    }

    .rating svg {
        width: 3rem;
        height: 3rem;
        overflow: visible;
        fill: transparent;
        stroke: var(--stroke);
        stroke-linejoin: bevel;
        stroke-dasharray: 12;
        animation: idle 4s linear infinite;
        transition: stroke 0.2s, fill 0.5s;
    }

    @keyframes idle {
        from {
            stroke-dashoffset: 24;
        }
    }

    .rating label:hover svg {
        stroke: var(--fill);
    }

    .rating input:checked~label svg {
        transition: 0s;
        animation: idle 4s linear infinite, yippee 0.75s backwards;
        fill: var(--fill);
        stroke: var(--fill);
        stroke-opacity: 0;
        stroke-dasharray: 0;
        stroke-linejoin: miter;
        stroke-width: 8px;
    }

    @keyframes yippee {
        0% {
            transform: scale(1);
            fill: var(--fill);
            fill-opacity: 0;
            stroke-opacity: 1;
            stroke: var(--stroke);
            stroke-dasharray: 10;
            stroke-width: 1px;
            stroke-linejoin: bevel;
        }

        30% {
            transform: scale(0);
            fill: var(--fill);
            fill-opacity: 0;
            stroke-opacity: 1;
            stroke: var(--stroke);
            stroke-dasharray: 10;
            stroke-width: 1px;
            stroke-linejoin: bevel;
        }

        30.1% {
            stroke: var(--fill);
            stroke-dasharray: 0;
            stroke-linejoin: miter;
            stroke-width: 8px;
        }

        60% {
            transform: scale(1.2);
            fill: var(--fill);
        }
    }

    .link-muted {
        color: #aaa;
    }

    .link-muted:hover {
        color: #1266f1;
    }

    #com {
        overflow-y: scroll;
        height: 800px;
        max-height: 50vh;
    }
</style>
<!--  styling end -->

<!--  album start -->
<section class=" bg-img bg-overlay bg-fixed" style="background-image: url(img/bg-img/bg-4.jpg);">
    <div class="container">
        <br><br><br><br><br><br><br><br>
        <div class="row align-items-end">
            <div class="col-12 col-md-5 col-lg-4">
                <div class="featured-artist-thumb">
                    <img src="../Admin/<?php echo $data2['album_image'] ?>" alt="" width="300" height="250">
                </div>
            </div>
            <div class="col-12 col-md-7 col-lg-8 my-5">
                <div class="featured-artist-content">
                    <!-- Section Heading -->
                    <div class="section-heading white text-left mb-30">
                        <p>Album</p>
                        <h2><?php echo $data2['album_name'] ?></h2>
                    </div>
                    <div class="song-name">
                        <p>Release Year: <?php echo $data2['year'] ?></p>
                        <p>Artist: <?php echo $data2['artist_name'] ?></p>
                        <?php
                        $rate = isset($rate) ? $rate : null;
                        if ($rate == null) { ?>
                            <p>Ratings: 0.00</p>
                        <?php } else { ?>
                            <p>Ratings: <?php echo $rate ?>.00 </p>
                        <?php } ?>
                        <a href="singlealbumvideo.php?id=<?php echo $data2['album_ID'] ?>" class="btn" style="background-color: black; color:white;">Video Songs</button></a>
                        <a href="singlealbummusic.php?id=<?php echo $data2['album_ID'] ?>" class="btn" style="background-color: black; color:white;">Audio Songs</button></a>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br><br><br>
    </div>
</section>
<!--  album end -->

<!--  feedback start -->
<div class="container-fluid py-5 text-center">
    <p>Give Feadback and Ratings</p>
    <h1>We value your words</h1>
    <div class="container-fluid d-flex justify-content-center con py-5">
        <form class="w-50" action="" method="post">
            <div class="rating">
                <input name="star-radio" id="star-1" type="radio">
                <label for="star-1">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" pathLength="360"></path>
                    </svg>
                </label>
                <input name="star-radio2" id="star-2" type="radio">
                <label for="star-2">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" pathLength="360"></path>
                    </svg>
                </label>
                <input name="star-radio3" id="star-3" type="radio">
                <label for="star-3">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" pathLength="360"></path>
                    </svg>
                </label>
                <input name="star-radio4" id="star-4" type="radio">
                <label for="star-4">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" pathLength="360"></path>
                    </svg>
                </label>
                <input name="star-radio5" id="star-5" type="radio">
                <label for="star-5">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" pathLength="360"></path>
                    </svg>
                </label>
            </div>
            <input type="hidden" name="userid" id="" value="<?php echo $_SESSION['user_ID'] ?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"></label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $_SESSION['username'] ?>" required minlength="3" maxlength="20">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label"></label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="msg" rows="5" placeholder="Enter your feedback" required minlength="5" maxlength="100"></textarea>
            </div>
            <button type="submit" name="feedback" class="btn d-grid mx-auto" style="background-color: black; color:white;">SEND A MESSAGE</button>
        </form>
    </div>
</div>
<!--  feedback end -->

<?php
include('footer.php');
if (isset($_POST['feedback'])) {
    $user_id = $_POST['userid'];
    $msg = $_POST['msg'];
    if (isset($_POST['star-radio5'])) {
        $rate = 1;
    } else if (isset($_POST['star-radio4'])) {
        $rate = 2;
    } else if (isset($_POST['star-radio3'])) {
        $rate = 3;
    } else if (isset($_POST['star-radio2'])) {
        $rate = 4;
    } else if (isset($_POST['star-radio'])) {
        $rate = 5;
    } else {
        $rate = 0;
    }
    if (mysqli_num_rows($result3) > 0) {
        $q4 = "update reviews set review_text = '$msg' , rating = '$rate' where user_ID_FK = $user_id AND album_ID_FK = $albumid";
        $result4 = mysqli_query($connect, $q4);
        if ($result4) {
            echo "<script> alert('Feedback updated'); window.location.href = '?albumid=$albumid';</script>";
        }
    } else {
        $q5 = "insert into reviews(user_ID_FK,album_ID_FK,review_text,rating)values('$user_id','$albumid','$msg','$rate')";
        $result5 = mysqli_query($connect, $q5);
        if ($result5) {
            echo "<script>alert('Feedback saved'); window.location.href = '?albumid=$albumid';</script>";
        }
    }
}
?>