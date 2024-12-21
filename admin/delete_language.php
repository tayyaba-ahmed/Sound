<?php
include('connection.php');
$id = $_GET['id'];
$q_delete_music = "DELETE FROM music WHERE language_ID_FK = $id";
$result_delete_music = mysqli_query($connect, $q_delete_music);
$q_delete_vid = "DELETE FROM video WHERE language_ID_FK = $id";
$result_delete_vid = mysqli_query($connect, $q_delete_vid);
if ($result_delete_music && $result_delete_vid) {
    $q = "DELETE FROM language WHERE language_ID = $id";
    $result = mysqli_query($connect, $q);
    if ($result) {
        echo "<script>alert('Record Deleted'); window.location.href='view_language.php';</script>";
    } else {
        echo "<script>alert('Error deleting language record'); window.location.href='view_language.php';</script>";
    }
} else {
    echo "<script>alert('Error deleting related music or videos'); window.location.href='view_language.php';</script>";
}
?>