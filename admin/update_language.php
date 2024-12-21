<?php
include('header.php');
include('connection.php');
$id=$_GET['id'];
$qq = "select * from language where language_ID=$id";
$rows = mysqli_query($connect,$qq);
$data=mysqli_fetch_assoc($rows);
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
                    <input type="text" class="form-control bg-dark text-white" id="exampleInputName1" placeholder="Name" name="Languagename" style="margin: 10px 0px 10px 0px;" value="<?php echo $data['language_name'];?>">
                </div>
                <button type="submit" class="btn btn-primary mr-2" name="sub">Submit</button>
            </form>
        </div>
    </div>
</div>
<!-- Languages form end -->
        <?php 
include('footer.php');
if(isset($_POST['sub'])) {
    $language_id=$_GET['id'];
    $languagename=$_POST['Languagename'];
    if(!empty($languagename)) {
        $q = "update language set language_name = '$languagename' where language_ID='$language_id'";
        $result = mysqli_query($connect,$q);
        if ($result) {
          echo "<script>alert('Updated Successfully'); window.location.href='view_language.php';</script>";
        } else {
          echo mysqli_error($connect);
        }
 
    } else {
        echo "<script>alert('Language name cannot be empty');</script>";
    }
} 
?>
