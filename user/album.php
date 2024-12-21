<!-- php start  -->
<?php
include('header.php');
include('connection.php');
$q = "select * from album join artist on album.artist_ID_FK = artist.artist_ID";
$result = mysqli_query($connect, $q);
$is_logged_in = isset($_SESSION['user_ID']);
?>
<!-- php end  -->

<!-- styling Start -->
<style>
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
</style>
<!-- styling end -->

<!-- Album Area start  -->
<section class="featured-artist-area bg-img bg-overlay bg-fixed" style="background-image: url(img/bg-img/bg-4.jpg);">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="section-heading style-2">
                    <br><br><br>
                    <h1 style="text-align: center; color:#fff;">Albums</h1>
                </div>
            </div>
        </div>
        <div class="row" style="margin: 0px 50px 5px 50px;">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="col-12 col-md-6 col-lg-3 col-lg-2">
                    <div class="single-album-area wow fadeInUp" data-wow-delay="100ms" style="background-color: #ddd; border: none;">
                        <div class="album-thumb">
                            <img src="../admin/<?php echo $row['album_image'] ?>" alt="" style="height: 280px;">
                            <div class="hover-button" onclick="handlePlay(event)">
                                <?php if (isset($_SESSION['user_ID'])) { ?>
                                    <a href="singlealbum.php?albumid=<?php echo $row['album_ID']; ?>">View More</a>
                                <?php } else { ?>
                                    <a href="index.php">View More</a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="album-info" style="padding: 10px; text-align: center;">
                            <a href="#">
                                <h5 style="margin: 0; color: #333;"><?php echo $row['album_name']; ?> </h5>
                                <h7 style="margin: 0; color: #333;">Artist: <?php echo $row['artist_name']; ?> </h7>
                            </a>
                            <p style="margin: 0; color: #666;  text-align:justify;"><?php echo $row['album_bio']; ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- Album Area end  -->

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