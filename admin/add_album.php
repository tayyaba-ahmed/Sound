<?php
include("header.php");
include("connection.php");
$q1 = "select * from artist";
$rows1 = mysqli_query($connect, $q1);
?>
<!-- Albums form start -->
<div class="container-fluid pt-4 px-4">
    <div class="card bg-secondary">
        <div class="card-body">
            <h4 class="card-title">Add Albums</h4>
            <p class="card-description">
                Enter details to add Albums
            </p>
            <form class="forms-sample" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputName1" class="text-white">Album Name</label>
                    <br>
                    <input type="text" class="form-control bg-dark text-white" id="exampleInputName1" placeholder="Name" name="albumname" style="margin: 10px 0px 10px 0px;" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputName1" class="text-white">Choose Artist</label>
                    <br>

                    <select name="artistid" class="form-control bg-dark" style="margin: 10px 0px 10px 0px;">
                        <option value="">Artist</option>
                        <?php while ($data1 = mysqli_fetch_assoc($rows1)) { ?>
                            <option value="<?php echo $data1['artist_ID'] ?>"><?php echo $data1['artist_name'] ?></option>
                        <?php } ?>
                    </select>

                </div>
                <div class="form-group">
                    <label class="text-white">Album Picture</label>
                    <br>
                    <input type="file" name="albumimg" class="form-control-file" style="margin: 10px 0px 10px 0px;" required>
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
<!-- Albums form end -->
<?php
if (isset($_POST['sub'])) {
    try {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $Album_name = mysqli_real_escape_string($connect, $_POST['albumname']);
        $Album_img = $_FILES['albumimg']['name'];
        $temp_name = $_FILES['albumimg']['tmp_name'];
        $img_type = $_FILES['albumimg']['type'];
        $img_size = $_FILES['albumimg']['size'];
        $bio = mysqli_real_escape_string($connect, $_POST['bio']);
        $artistid = $_POST['artistid'];

        if (empty($artistid) || $artistid == 'Artist') {
            echo "<script>alert('Kindly add a proper Artist'); window.location.href='add_album.php';</script>";
        }
        $folder = "uploads/";
        if ($img_type == "image/png" || $img_type == "image/jpg" || $img_type == "image/jpeg") {
            if ($img_size <= 1000000) {
                $unique_name = uniqid() . "_" . $Album_img;
                $path = $folder . $unique_name;
                if (move_uploaded_file($temp_name, $path)) {
                    $q = "insert into album(album_name, artist_ID_FK, album_image, album_bio) values ('$Album_name','$artistid','$path','$bio')";
                    $result = mysqli_query($connect, $q);
                    if ($result) {
                        echo "<script>alert('Album added to database'); window.location.href='add_album.php';</script>";
                    } else {
                        throw new Exception("Database insertion failed.");
                    }
                } else {
                    throw new Exception("Failed to upload the image.");
                }
            } else {
                throw new Exception("File size should not exceed 1MB.");
            }
        } else {
            throw new Exception("Only jpg, png, jpeg files are allowed.");
        }
    } catch (Exception $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }
}
include("footer.php");
?>