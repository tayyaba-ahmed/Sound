<?php
include("header.php");
include("connection.php");
$id=$_GET['id'];
$q = "select * from album where album_ID=$id";
$rows = mysqli_query($connect,$q);
$data=mysqli_fetch_assoc($rows);
$q1 = "select * from artist";
$rows1 = mysqli_query($connect,$q1);
$q2 = "select artist.artist_name AS artist_ID_FK 
from album 
join artist on album.artist_ID_FK = artist.artist_ID
ORDER BY album_ID ASC";
$rows2 = mysqli_query($connect, $q2);
$data2=mysqli_fetch_assoc($rows2);
?>
<!-- Albums form start -->
<div class="container-fluid pt-4 px-4">
    <div class="card bg-secondary">
        <div class="card-body">
            <h4 class="card-title">Update Album</h4>
            <p class="card-description">
                Enter details to edit Album
            </p>
            <form class="forms-sample" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputName1" class="text-white">Album Name</label>
                    <br>
                    <input type="text" class="form-control bg-dark text-white" id="exampleInputName1" placeholder="Name" name="albumname" style="margin: 10px 0px 10px 0px;" value="<?php echo $data['album_name'];?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1" class="text-white">Choose Artist</label>
                    <br>
                    Current Artist: <?php echo $data2['artist_ID_FK']?>
                    <select name="artistid" class="form-control bg-dark" style="margin: 10px 0px 10px 0px;">
                    <option value=""> Artist</option>
                    <?php while($data1=mysqli_fetch_assoc($rows1)) {?>
                    <option value="<?php echo $data1['artist_ID']?>"><?php echo $data1['artist_name']?></option>
                    <?php } ?>
                    </select>                          
                </div>
                <div class="form-group">
                    <label class="text-white">Album Picture</label>
                    <br>
                    <input type="file" name="albumimg" class="form-control-file" style="margin: 10px 0px 10px 0px;">
                    <p>Current Picture: <br> <img src="<?php echo $data['album_image']?>" style="margin:10px 0px 10px 0px;" width="300px" height="300px"></p>
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1" class="text-white">Bio</label>
                    <br>
                    <textarea class="form-control bg-dark text-white" id="exampleTextarea1" rows="4" name="bio" style="margin: 10px 0px 10px 0px;" placeholder="..."><?php echo $data['album_bio']?></textarea>
                </div>
                <button type="submit" class="btn btn-primary mr-2" name="sub">Update</button>
            </form>
        </div>
    </div>
</div>
<!-- Albums form end -->
<?php 
include('footer.php');
if(isset($_POST['sub'])) {
    $album_name = $_POST['albumname'];
    $album_img = $_FILES['albumimg']['name'];
    $temp_name = $_FILES['albumimg']['tmp_name'];
    $img_type = $_FILES['albumimg']['type'];
    $img_size = $_FILES['albumimg']['size'];
    $bio = mysqli_real_escape_string($connect, $_POST['bio']);
    $artistid=$_POST['artistid'];
    $album_id=$_GET['id'];

    if (empty($artistid) || $artistid == 'Artist') {
        $artistid = $data['artist_ID_FK']; 
    }
    $folder="uploads/";
    $existing_image_q = "select album_image from album where album_ID='$album_id'";
    $existing_image_result = mysqli_query($connect,$existing_image_q);
    $existing_image_data = mysqli_fetch_assoc($existing_image_result);
    $existing_image = $existing_image_data['album_image'];
    if(!empty($album_img)) {
        if($img_type=="image/png" || $img_type=="image/jpg" || $img_type=="image/jpeg") {
            if ($img_size<=1000000) {
                $path=$folder.$album_img;
                move_uploaded_file($temp_name,$path);
                $q = "update album set album_name = '$album_name', artist_ID_FK = '$artistid', album_image='$path', album_bio = '$bio' where album_ID='$album_id'";
            } else {
                echo "<script>alert('File size should not exceed 1MB'); window.location.href('view_album.php');</script>";
                exit;
            }

        } else {
            echo "<script>alert('only jpg, png, jpeg files are allowed'); window.location.href='view_album.php';</script>";
            exit;
        }
    } else {
        $q = "update album set album_name = '$album_name',artist_ID_FK = '$artistid',album_image='$existing_image', album_bio = '$bio' where album_ID='$album_id'";
    }
    $result = mysqli_query($connect,$q);
    if ($result) {
      echo "<script>alert('Updated Successfully'); window.location.href='view_album.php';</script>";
    } else {
      echo mysqli_error($connect);
    }
}
?>