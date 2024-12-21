<?php
include("header.php");
include("connection.php");
$id=$_GET['id'];
$q = "select * from music where music_ID=$id";
$rows = mysqli_query($connect,$q);
$data=mysqli_fetch_assoc($rows);
$q1 = "select * from artist";
$rows1 = mysqli_query($connect,$q1);
$q2 = "select * from album";
$rows2 = mysqli_query($connect,$q2);
$q3 = "select * from language";
$rows3 = mysqli_query($connect,$q3);
$q4 = "select * from genre";
$rows4 = mysqli_query($connect,$q4);
$q5 = "select artist.artist_name AS artist_ID_FK, 
album.album_name AS album_ID_FK, 
language.language_name AS language_ID_FK,
genre.genre_name AS genre_ID_FK
from music 
join artist on music.artist_ID_FK = artist.artist_ID
join album on music.album_ID_FK = album.album_ID
join language on music.language_ID_FK = language.language_ID
join genre on music.genre_ID_FK = genre.genre_ID
where music_ID = $id";
$rows5 = mysqli_query($connect, $q5);
$data5=mysqli_fetch_assoc($rows5);
?>
 <!-- Musics form start -->
 <div class="container-fluid pt-4 px-4">
    <div class="card bg-secondary">
        <div class="card-body">
            <h4 class="card-title">Update Music</h4>
            <p class="card-description">
                Enter details to edit Music
            </p>
            <form class="forms-sample" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputName1" class="text-white">Title</label>
                    <br>
                    <input type="text" class="form-control bg-dark text-white" id="exampleInputName1" placeholder="Name" name="title" style="margin: 10px 0px 10px 0px;" value="<?php echo $data['title'];?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1" class="text-white">Choose Artist</label>
                    <br>
                    Current Artist: <?php echo $data5['artist_ID_FK']?>
                    <select name="artistid" class="form-control bg-dark" style="margin: 10px 0px 10px 0px;">
                    <option value="">Artist</option>
                    <?php while($data1=mysqli_fetch_assoc($rows1)) {?>
                    <option value="<?php echo $data1['artist_ID']?>"><?php echo $data1['artist_name']?></option>
                    <?php } ?>
                    </select>                     
                </div>
                <div class="form-group">
                    <label for="exampleInputName1" class="text-white">Choose Album</label>
                    <br>
                    Current Album: <?php echo $data5['album_ID_FK']?>
                    <select name="albumid" class="form-control bg-dark" style="margin: 10px 0px 10px 0px;">
                    <option value="">Album</option>
                    <?php while($data2=mysqli_fetch_assoc($rows2)) {?>
                    <option value="<?php echo $data2['album_ID']?>"><?php echo $data2['album_name']?></option>
                    <?php } ?>
                    </select>                     
                </div>
                <div class="form-group">
                    <label for="exampleInputName1" class="text-white">Choose Genre</label>
                    <br>
                    Current Genre: <?php echo $data5['genre_ID_FK']?>
                    <select name="genreid" class="form-control bg-dark" style="margin: 10px 0px 10px 0px;">
                    <option value="">Genre</option>
                    <?php while($data4=mysqli_fetch_assoc($rows4)) {?>
                    <option value="<?php echo $data4['genre_ID']?>"><?php echo $data4['genre_name']?></option>
                    <?php } ?>
                    </select>                     
                </div>
                <div class="form-group">
                    <label for="exampleInputName1" class="text-white">Choose Language</label>
                    <br>
                    Current Language: <?php echo $data5['language_ID_FK']?>
                    <select name="languageid" class="form-control bg-dark" style="margin: 10px 0px 10px 0px;">
                    <option value="">Language</option>
                    <?php while($data3=mysqli_fetch_assoc($rows3)) {?>
                    <option value="<?php echo $data3['language_ID']?>"><?php echo $data3['language_name']?></option>
                    <?php } ?>
                    </select>                     
                </div>
                <div class="form-group">
                    <label class="text-white">Released Year</label>
                    <br>
                    <input type="number" name="year" class="form-control bg-dark text-white" style="margin: 10px 0px 10px 0px;" value="<?php echo $data['year'];?>">
                </div>
                <div class="form-group">
                    <label class="text-white">Audio</label>
                    <br>
                    <input type="file" name="audio" class="form-control-file" style="margin: 10px 0px 10px 0px;">
                    <p>Current Audio: <br>
                    <audio controls autoplay loop style="margin:10px 0px 10px 0px;">
                    <source src="<?php echo $data['music_file']; ?>" type="audio/mp3">
                    Your browser does not support the audio element.
                    </audio>    
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1" class="text-white">Bio</label>
                    <br>
                    <textarea class="form-control bg-dark text-white" id="exampleTextarea1" rows="4" name="bio" style="margin: 10px 0px 10px 0px;" placeholder="..."><?php echo $data['description'];?></textarea>
                </div>
                <button type="submit" class="btn btn-primary mr-2" name="sub">Update</button>
            </form>
        </div>
    </div>
</div>
<!-- Musics form end -->
<?php 
include('footer.php');
if(isset($_POST['sub'])) {
    $title = $_POST['title'];
    $year = $_POST['year'];
    $audio_name = $_FILES['audio']['name'];
    $temp_name = $_FILES['audio']['tmp_name'];
    $audio_type = $_FILES['audio']['type'];
    $audio_size = $_FILES['audio']['size'];
    $bio = mysqli_real_escape_string($connect, $_POST['bio']);
    $artistid=$_POST['artistid'];
    $albumid=$_POST['albumid'];
    $genreid=$_POST['genreid'];
    $languageid=$_POST['languageid'];
    $musicid=$_GET['id'];

    if (empty($artistid) || $artistid == 'Artist') {
        $artistid = $data['artist_ID_FK']; 
    }
    if (empty($albumid) || $albumid == 'Album') {
        $albumid = $data['album_ID_FK'];
    }
    if (empty($genreid) || $genreid == 'Genre') {
        $genreid = $data['genre_ID_FK']; 
    }
    if (empty($languageid) || $languageid == 'Language') {
        $languageid = $data['language_ID_FK']; 
    }
    $folder="uploads/";
    $existing_audio_q = "select music_file from music where music_ID='$musicid'";
    $existing_audio_result = mysqli_query($connect,$existing_audio_q);
    $existing_audio_data = mysqli_fetch_assoc($existing_audio_result);
    $existing_audio = $existing_audio_data['music_file'];
    if(!empty($audio_name)) {
        if ($audio_type == "audio/wav" || $audio_type == "audio/ogg" || $audio_type == "audio/mpeg") {
            if ($audio_size<=10000000) {
                $path=$folder.$audio_name;
                move_uploaded_file($temp_name,$path);
                $q = "update music set title = '$title', artist_ID_FK = '$artistid', album_ID_FK = '$albumid', language_ID_FK = 
                '$languageid', genre_ID_FK = '$genreid' ,music_file='$path', year = '$year', description = '$bio' where music_ID='$musicid'";
            } else {
                echo "<script>alert('Audio size should not exceed 10MB'); window.location.href('view_music.php');</script>";
                exit;
            }

        } else {
            echo "<script>alert('only wav, ogg, mp3 files are allowed'); window.location.href='view_music.php';</script>";
            exit;
        }
    } else {
        $q = "update music set title = '$title', artist_ID_FK = '$artistid', album_ID_FK = '$albumid', language_ID_FK = 
                '$languageid', genre_ID_FK = '$genreid' ,music_file='$existing_audio', year = '$year', description = '$bio' where music_ID='$musicid'";
    }
    $result = mysqli_query($connect,$q);
    if ($result) {
      echo "<script>alert('Updated Successfully'); window.location.href='view_music.php';</script>";
    } else {
      echo mysqli_error($connect);
    }
}
?>