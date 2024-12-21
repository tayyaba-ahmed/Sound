<?php
include("header.php");
include("connection.php");
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
                    <input type="text" class="form-control bg-dark text-white" id="exampleInputName1" placeholder="Name" name="genrename" style="margin: 10px 0px 10px 0px;" required>
                </div>
                <button type="submit" class="btn btn-primary mr-2" name="sub">Submit</button>
            </form>
        </div>
    </div>
</div>
<!-- genre form end -->
 <!-- php start -->
<?php
if (isset($_POST['sub'])) {
    $genrename = $_POST['genrename'];
    if (!empty($genrename)) {
        $q = "insert into genre(genre_name) values ('$genrename')";
        $result = mysqli_query($connect, $q);
        if ($result) {
            echo "<script>alert('Genre added to database'); window.location.href='add_genre.php';</script>";
        } else {
            echo mysqli_error($connect);
        }
    } else {
        echo "<script>alert('Genre Name cannot be empty'); window.location.href='add_genre.php';</script>";
    }
}
include("footer.php");
?>
 <!-- php end -->