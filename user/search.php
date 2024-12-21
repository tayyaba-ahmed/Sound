<?php
include("header.php");
include("connection.php");

if (isset($_GET['query'])) {
    $searchTerm = mysqli_real_escape_string($connect, $_GET['query']);

    $artistQuery = "SELECT * FROM artist WHERE artist_name LIKE '%$searchTerm%'";
    $albumQuery = "SELECT * FROM album WHERE album_name LIKE '%$searchTerm%'";
    $musicQuery = "SELECT * FROM music WHERE title LIKE '%$searchTerm%'";
    $videoQuery = "SELECT * FROM video WHERE title LIKE '%$searchTerm%'";
    $genreQuery = "SELECT * FROM genre WHERE genre_name LIKE '%$searchTerm%'";
    $languageQuery = "SELECT * FROM language WHERE language_name LIKE '%$searchTerm%'";

    $artistResults = mysqli_query($connect, $artistQuery);
    $albumResults = mysqli_query($connect, $albumQuery);
    $musicResults = mysqli_query($connect, $musicQuery);
    $videoResults = mysqli_query($connect, $videoQuery);
    $genreResults = mysqli_query($connect, $genreQuery);
    $languageResults = mysqli_query($connect, $languageQuery);
}
if (
    mysqli_num_rows($artistResults) == 0 && mysqli_num_rows($albumResults) == 0
    && mysqli_num_rows($musicResults) == 0 && mysqli_num_rows($videoResults) == 0
    && mysqli_num_rows($genreResults) == 0 && mysqli_num_rows($languageResults) == 0
) {
    echo '<script>alert("No data found!"); window.location.href = "index.php" </script>';
}
?>


<!--  Search Area Start  -->
<section class="bg-img bg-overlay bg-fixed" style="padding-bottom:100px;">
    <div class="container">
        <div class="one-music-songs-area">
            <div class="container">
                <div class="row">
                    <!--  Details area start -->
                    <div class="col-12">
                        <div class="single-song-area d-flex flex-wrap align-items-end">
                            <!-- Display Artist Results -->
                            <?php if (mysqli_num_rows($artistResults) > 0) { ?>
                                <?php while ($artist = mysqli_fetch_assoc($artistResults)) { ?>
                                    <script>
                                        window.location.href = "artist.php?artistid=<?php echo $artist['artist_ID']; ?>"
                                    </script>
                                <?php } ?>
                                </ul>
                            <?php } ?>

                            <!-- Display Album Results -->
                            <?php if (mysqli_num_rows($albumResults) > 0) { ?>
                                <?php while ($album = mysqli_fetch_assoc($albumResults)) { ?>
                                    <script>
                                        window.location.href = "searchalbum.php?albumid=<?php echo $album['album_ID']; ?>"
                                    </script>
                                <?php } ?>
                                </ul>
                            <?php } ?>

                            <!-- Display Music Results -->
                            <?php if (mysqli_num_rows($musicResults) > 0) { ?>
                                <?php while ($music = mysqli_fetch_assoc($musicResults)) { ?>
                                    <script>
                                        window.location.href = "search_musicANDvideo.php?id=<?php echo $music['music_ID']; ?>"
                                    </script>
                                <?php } ?>
                                </ul>
                            <?php } ?>

                            <!-- Display Video Results -->
                            <?php if (mysqli_num_rows($videoResults) > 0) { ?>
                                <?php while ($video = mysqli_fetch_assoc($videoResults)) { ?>
                                    <script>
                                        window.location.href = "search_musicANDvideo?id=<?php echo $artist['video_ID']; ?>"
                                    </script>
                                <?php } ?>
                                </ul>
                            <?php } ?>

                            <!-- Display Genre Results -->
                            <?php if (mysqli_num_rows($genreResults) > 0) { ?>
                                <?php while ($genre = mysqli_fetch_assoc($genreResults)) { ?>
                                    <script>
                                        window.location.href = "genre.php?genreid=<?php echo $genre['genre_ID']; ?>"
                                    </script>
                                <?php } ?>
                                </ul>
                            <?php } ?>

                            <!-- Display Language Results -->
                            <?php if (mysqli_num_rows($languageResults) > 0) { ?>
                                <?php while ($language = mysqli_fetch_assoc($languageResults)) { ?>
                                    <script>
                                        window.location.href = "language.php?languageid=<?php echo $language['language_ID']; ?>"
                                    </script>
                                <?php } ?>
                                </ul>
                            <?php } ?>

                        </div>
                    </div>
                </div>
                <!--  Details area End -->
            </div>

        </div>
    </div>
    </div>
</section>
<!--  Search Area End  -->

<?php
include('footer.php');
?>