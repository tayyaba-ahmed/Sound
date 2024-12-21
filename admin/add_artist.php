<?php
include("header.php");
include("connection.php");
?>
<!-- Artists form start -->
<div class="container-fluid pt-4 px-4">
    <div class="card bg-secondary">
        <div class="card-body">
            <h4 class="card-title">Add Artists</h4>
            <p class="card-description">
                Enter details to add Artists
            </p>
            <form class="forms-sample" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputName1" class="text-white">Artist Name</label>
                    <br>
                    <input type="text" class="form-control bg-dark text-white" id="exampleInputName1" placeholder="Name" name="artistname" style="margin: 10px 0px 10px 0px;" required>
                </div>
                <div class="form-group">
                    <label class="text-white">Artist Picture</label>
                    <br>
                    <input type="file" name="artistimg" class="form-control-file" style="margin: 10px 0px 10px 0px;" required>
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
<!-- Artists form end -->
<?php
if (isset($_POST['sub'])) {
    try {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $artist_name = mysqli_real_escape_string($connect, $_POST['artistname']);
        $artist_img = $_FILES['artistimg']['name'];
        $temp_name = $_FILES['artistimg']['tmp_name'];
        $img_type = $_FILES['artistimg']['type'];
        $img_size = $_FILES['artistimg']['size'];
        $bio = mysqli_real_escape_string($connect, $_POST['bio']);
        $folder = "uploads/";

        if ($img_type == "image/png" || $img_type == "image/jpg" || $img_type == "image/jpeg") {
            if ($img_size <= 1000000) {
                $unique_name = uniqid() . "_" . $artist_img;
                $path = $folder . $unique_name;

                if (move_uploaded_file($temp_name, $path)) {
                    $q = "INSERT INTO artist(artist_name, artist_image, artist_bio) VALUES ('$artist_name','$path','$bio')";
                    $result = mysqli_query($connect, $q);

                    if ($result) {
                        echo "<script>alert('Artist added to database'); window.location.href='add_artist.php';</script>";
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