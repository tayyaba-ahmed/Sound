<?php
include('connection.php');
$id=$_GET['id'];
$q = "Delete from video where video_id = $id";
$result=mysqli_query($connect,$q);
if ($result) {
    echo "<script>alert('Record Deleted'); window.location.href='view_video.php';</script>";
} else {
    echo "<script>alert('Error'); window.location.href='view_video.php';</script>";
}
?>