<?php
include('header.php');
include('connection.php');
$id=$_GET['id'];
$qq = "select * from artist where artist_ID=$id";
$rows = mysqli_query($connect,$qq);
$data=mysqli_fetch_assoc($rows);
?>

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
                    <input type="text" class="form-control bg-dark text-white" id="exampleInputName1" placeholder="Name" name="artistname" style="margin: 10px 0px 10px 0px;" value="<?php echo $data['artist_name'];?>">
                </div>
                <div class="form-group">
                    <label class="text-white">Artist Picture</label>
                    <br>
                    <input type="file" name="artistimg" class="form-control-file" style="margin: 10px 0px 10px 0px;">
                    <p>Current Picture: <br> <img src="<?php echo $data['artist_image']?>" style="margin:10px 0px 10px 0px;" width="300px" height="300px"></p>

                </div>
                <div class="form-group">
                    <label for="exampleTextarea1" class="text-white">Bio</label>
                    <br>
                    <textarea class="form-control bg-dark text-white" id="exampleTextarea1" rows="4" name="bio" style="margin: 10px 0px 10px 0px;" placeholder="..."><?php echo $data['artist_bio'];?></textarea>
                </div>
                <button type="submit" class="btn btn-primary mr-2" name="sub">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php 
include('footer.php');
if(isset($_POST['sub'])) {
    $artist_id=$_GET['id'];
    $artist_name=$_POST['artistname'];
    $artist_img=$_FILES['artistimg']['name'];
    $temp_name=$_FILES['artistimg']['tmp_name'];
    $img_type=$_FILES['artistimg']['type'];
    $img_size=$_FILES['artistimg']['size'];
    $bio=$_POST['bio'];

    $folder="uploads/";
    $existing_image_q = "select artist_image from artist where artist_ID='$artist_id'";
    $existing_image_result = mysqli_query($connect,$existing_image_q);
    $existing_image_data = mysqli_fetch_assoc($existing_image_result);
    $existing_image = $existing_image_data['artist_image'];
    if(!empty($artist_img)) {
        if($img_type=="image/png" || $img_type=="image/jpg" || $img_type=="image/jpeg") {
            if ($img_size<=1000000) {
                $path=$folder.$artist_img;
                move_uploaded_file($temp_name,$path);
                $q = "update artist set artist_name = '$artist_name', artist_image='$path', artist_bio = '$bio' where artist_ID='$artist_id'";
            } else {
                echo "<script>alert('File size should not exceed 1MB'); window.location.href('view_artist.php');</script>";
                exit;
            }

        } else {
            echo "<script>alert('only jpg, png, jpeg files are allowed'); window.location.href='view_artist.php';</script>";
            exit;
        }
    } else {
        $q = "update artist set artist_name = '$artist_name',artist_image='$existing_image', artist_bio = '$bio' where artist_ID='$artist_id'";
    }
    $result = mysqli_query($connect,$q);
    if ($result) {
      echo "<script>alert('Updated Successfully'); window.location.href='view_artist.php';</script>";
    } else {
      echo mysqli_error($connect);
    }
}
?>