<?php
include('connection.php');
$id = $_GET['id'];
$q_delete_albums = "DELETE FROM album WHERE artist_ID_FK = $id";
$result_delete_albums = mysqli_query($connect, $q_delete_albums);
$q_delete_music = "DELETE FROM music WHERE artist_ID_FK = $id";
$result_delete_music = mysqli_query($connect, $q_delete_music);
$q_delete_vid = "DELETE FROM video WHERE artist_ID_FK = $id";
$result_delete_vid = mysqli_query($connect, $q_delete_vid);
if ($result_delete_albums && $result_delete_music && $result_delete_vid) {
    $q = "DELETE FROM artist WHERE artist_ID = $id";
    $result = mysqli_query($connect, $q);
    if ($result) {
        echo "<script>alert('Record Deleted'); window.location.href='view_artist.php';</script>";
    } else {
        echo "<script>alert('Error deleting artist record'); window.location.href='view_artist.php';</script>";
    }
} else {
    echo "<script>alert('Error deleting related albums, music or videos'); window.location.href='view_artist.php';</script>";
}
?>
