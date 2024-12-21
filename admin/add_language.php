<?php
include("header.php");
include("connection.php");
?>
<!-- Languages form start -->
<div class="container-fluid pt-4 px-4">
    <div class="card bg-secondary">
        <div class="card-body">
            <h4 class="card-title">Add Languages</h4>
            <p class="card-description">
                Enter details to add Languages
            </p>
            <form class="forms-sample" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputName1" class="text-white">Language Name</label>
                    <br>
                    <input type="text" class="form-control bg-dark text-white" id="exampleInputName1" placeholder="Name" name="Languagename" style="margin: 10px 0px 10px 0px;" required>
                </div>
                <button type="submit" class="btn btn-primary mr-2" name="sub">Submit</button>
            </form>
        </div>
    </div>
</div>
<!-- Languages form end -->
 <!-- php start -->
<?php
if (isset($_POST['sub'])) {
    $Languagename = $_POST['Languagename'];
    if (!empty($Languagename)) {
        $q = "insert into language(language_name) values ('$Languagename')";
        $result = mysqli_query($connect, $q);
        if ($result) {
            echo "<script>alert('Language added to database'); window.location.href='add_Language.php';</script>";
        } else {
            echo mysqli_error($connect);
        }
    } else {
        echo "<script>alert('Language Name cannot be empty'); window.location.href='add_Language.php';</script>";
    }
}
include("footer.php");
?>
 <!-- php end -->