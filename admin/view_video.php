<?php
include("header.php");
include("connection.php");
$q = "select video.video_ID, video.title, artist.artist_name AS artist_ID_FK ,genre.genre_name AS genre_ID_FK,
album.album_name AS album_ID_FK , language.language_name AS language_ID_FK , video.year, video.video_file, video.description
from video 
join artist on video.artist_ID_FK = artist.artist_ID
join album on video.album_ID_FK = album.album_ID
join genre on video.genre_ID_FK = genre.genre_ID
join language on video.language_ID_FK = language.language_ID
ORDER BY video_ID ASC";
$rows = mysqli_query($connect, $q);
?>
<!-- videos form and php start -->
<div class="container-fluid pt-4 px-4">
    <div class="card bg-secondary">
        <div class="table-responsive pt-3">
            <table class="table table-striped project-orders-table">
                <thead>
                    <tr>
                        <th class="ml-5">ID</th> 
                        <th>Title</th>
                        <th>Artist</th>
                        <th>Album</th>
                        <th>Genre</th>                
                        <th>Language</th>
                        <th>Year</th>
                        <th>Description</th>
                        <th>Video</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody style="font-size: 15px;">
                    <?php
                    while ($data = mysqli_fetch_assoc($rows)) {
                    ?>
                        <tr>
                            <td class="text-white"><?php echo $data['video_ID'] ?></td>
                            <td class="text-white"><?php echo $data['title'] ?></td>
                            <td class="text-white"><?php echo $data['artist_ID_FK']?></td>
                            <td class="text-white"><?php echo $data['album_ID_FK']?></td>
                            <td class="text-white"><?php echo $data['genre_ID_FK']?></td>
                            <td class="text-white"><?php echo $data['language_ID_FK']?></td>
                            <td class="text-white"><?php echo $data['year'] ?></td>
                            <td class="text-white">
                                <div style="white-space: pre-wrap; width: 200px; text-align:justify;"><?php echo $data['description'] ?></div>
                            </td>
                            <td><video width="100px" height="100px" controls>
                            <source src="<?php echo $data['video_file']; ?>" type="video/mp4">
                            <source src="<?php echo $data['video_file']; ?>" type="video/webm">
                            <source src="<?php echo $data['video_file']; ?>" type="video/ogg">
                                Your browser does not support the video tag.
                            </video></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="update_video.php?id=<?php echo $data['video_ID'] ?>" type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
                                        Edit
                                        <i class="typcn typcn-edit btn-icon-append"></i>
                                    </a>
                                    &nbsp;&nbsp;
                                    <a href="delete_video.php?id=<?php echo $data['video_ID'] ?>" type="button" class="btn btn-danger btn-sm btn-icon-text">
                                        Delete
                                        <i class="typcn typcn-delete-outline btn-icon-append"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- videos form and php end -->
<?php
include("footer.php");
?>