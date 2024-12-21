<?php
include('header.php');
include('connection.php');
$id=$_GET['id'];
$qq = "select * from genre where genre_ID=$id";
$rows = mysqli_query($connect,$qq);
$data=mysqli_fetch_assoc($rows);
?>
<!-- genre form start -->
<div class="container-fluid pt-4 px-4">
    <div class="card bg-secondary">
        <div class="card-body">
            <h4 class="card-title">Add Genres</h4>
            <p class="card-description">
                Enter details to add Genres
            </p>
            <form class="forms-sample" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputName1" class="text-white">Genre Name</label>
                    <br> 
                    <input type="text" class="form-control bg-dark text-white" id="exampleInputName1" placeholder="Name" name="genrename" style="margin: 10px 0px 10px 0px;"  value="<?php echo $data['genre_name'];?>">
                </div>
                <button type="submit" class="btn btn-primary mr-2" name="sub">Submit</button>
            </form>
        </div>
    </div>
</div>
<!-- genre form end -->
        <?php 
include('footer.php');
if(isset($_POST['sub'])) {
    $genre_id=$_GET['id'];
    $genrename=$_POST['genrename'];
    if(!empty($genrename)) {
        $q = "update genre set genre_name = '$genrename' where genre_ID='$genre_id'";
        $result = mysqli_query($connect,$q);
        if ($result) {
          echo "<script>alert('Updated Successfully'); window.location.href='view_genre.php';</script>";
        } else {
          echo mysqli_error($connect);
        }
 
    } else {
        echo "<script>alert('genre name cannot be empty');</script>";
    }
} 
?>
