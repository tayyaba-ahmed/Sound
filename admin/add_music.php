<?php
include("header.php");
include("connection.php");
$q1 = "select * from artist";
$rows1 = mysqli_query($connect,$q1);
$q2 = "select * from album";
$rows2 = mysqli_query($connect,$q2);
$q3 = "select * from genre";
$rows3 = mysqli_query($connect,$q3);
$q4 = "select * from language";
$rows4 = mysqli_query($connect,$q4);
?>
 <!-- Musics form start -->
<div class="container-fluid pt-4 px-4">
    <div class="card bg-secondary">
        <div class="card-body">
            <h4 class="card-title">Add Music</h4>
            <p class="card-description">
                Enter details to add Music
            </p>
            <form class="forms-sample" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputName1" class="text-white">Title</label>
                    <br>
                    <input type="text" class="form-control bg-dark text-white" id="exampleInputName1" placeholder="Name" name="title" style="margin: 10px 0px 10px 0px;" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputName1" class="text-white">Choose Artist</label>
                    <br>
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
                    <select name="genreid" class="form-control bg-dark" style="margin: 10px 0px 10px 0px;">
                    <option value="">Genre</option>
                    <?php while($data3=mysqli_fetch_assoc($rows3)) {?>
                    <option value="<?php echo $data3['genre_ID']?>"><?php echo $data3['genre_name']?></option>
                    <?php } ?>
                    </select>                     
                </div>
                <div class="form-group">
                    <label for="exampleInputName1" class="text-white">Choose Language</label>
                    <br>
                    <select name="languageid" class="form-control bg-dark" style="margin: 10px 0px 10px 0px;">
                    <option value="">Language</option>
                    <?php while($data4=mysqli_fetch_assoc($rows4)) {?>
                    <option value="<?php echo $data4['language_ID']?>"><?php echo $data4['language_name']?></option>
                    <?php } ?>
                    </select>                     
                </div>
                <div class="form-group">
                    <label class="text-white">Released Year</label>
                    <br>
                    <input type="number" name="year" class="form-control bg-dark text-white" style="margin: 10px 0px 10px 0px;" required>
                </div>
                <div class="form-group">
                    <label class="text-white">Audio</label>
                    <br>
                    <input type="file" name="audio" class="form-control-file" style="margin: 10px 0px 10px 0px;" required>
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1" class="text-white">Bio</label>
                    <br>
                    <textarea class="form-control bg-dark text-white" id="exampleTextarea1" rows="4" name="bio" style="margin: 10px 0px 10px 0px;" placeholder="..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary mr-2" name="sub">Submit</button>
            </form>
        </div>
    </div>
</div>
<!-- Musics form end -->
<?php
if (isset($_POST['sub'])) {
    try {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $title = mysqli_real_escape_string($connect, $_POST['title']);
        $year = $_POST['year'];
        $audio_name = $_FILES['audio']['name'];
        $temp_name = $_FILES['audio']['tmp_name'];
        $audio_type = $_FILES['audio']['type'];
        $audio_size = $_FILES['audio']['size'];
        $bio = mysqli_real_escape_string($connect, $_POST['bio']);
        $artistid = $_POST['artistid'];
        $albumid = $_POST['albumid'];
        $genreid = $_POST['genreid'];
        $languageid = $_POST['languageid'];

        if (empty($artistid)) {
            throw new Exception("Kindly add a proper Artist.");
        } else if (empty($albumid)) {
            throw new Exception("Kindly add a proper Album.");
        } else if (empty($genreid)) {
            throw new Exception("Kindly add a proper Genre.");
        } else if (empty($languageid)) {
            throw new Exception("Kindly add a proper Language.");
        } 

        $folder = "uploads/";
        if (in_array($audio_type, ["audio/wav", "audio/ogg", "audio/mpeg"])) {
            if ($audio_size <= 10000000) {
                $path = $folder . $audio_name;

                $q = "INSERT INTO music(title, artist_ID_FK, album_ID_FK, genre_ID_FK, language_ID_FK, year, music_file, description)
                VALUES ('$title','$artistid','$albumid','$genreid','$languageid','$year','$path','$bio')";
                
                $result = mysqli_query($connect, $q);
                if ($result) {
                    move_uploaded_file($temp_name, $path);
                    echo "<script>alert('Music added to database'); window.location.href='add_music.php';</script>";
                } else {
                    throw new Exception("Failed to add music to the database.");
                }
            } else {
                throw new Exception("Audio size should not exceed 10MB.");
            }
        } else {
            throw new Exception("Only wav, ogg, mp3 files are allowed.");
        }
    } catch (Exception $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "'); window.location.href='add_music.php';</script>";
    }
}
include("footer.php");
?>