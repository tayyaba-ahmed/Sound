<?php
include("header.php");
include("connection.php");
$q = "SELECT * FROM artist ORDER BY artist_ID ASC";
$rows = mysqli_query($connect, $q);
?>
<!-- artists form and php start -->
<div class="container-fluid pt-4 px-4">
    <div class="card bg-secondary">
        <div class="table-responsive pt-3">
            <table class="table table-striped project-orders-table">
                <thead>
                    <tr>
                        <th class="ml-5">ID</th>
                        <th>Artist Name</th>
                        <th>Introduction</th>
                        <th>Picture</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody style="font-size: 15px;">
                    <?php
                    while ($data = mysqli_fetch_assoc($rows)) {
                    ?>
                        <tr>
                            <td class="text-white"><?php echo $data['artist_ID'] ?></td>
                            <td class="text-white"><?php echo $data['artist_name'] ?></td>
                            <td class="text-white">
                                <div style="white-space: pre-wrap; width: 600px; text-align:justify;"><?php echo $data['artist_bio'] ?></div>
                            </td>
                            <td><img src="<?php echo $data['artist_image'] ?>" style="border-radius: 50%; width: 50px; height: 50px;"></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="update_artist.php?id=<?php echo $data['artist_ID'] ?>" type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
                                        Edit
                                        <i class="typcn typcn-edit btn-icon-append"></i>
                                    </a>
                                    &nbsp;&nbsp;
                                    <a href="delete_artist.php?id=<?php echo $data['artist_ID'] ?>" type="button" class="btn btn-danger btn-sm btn-icon-text">
                                        Delete
                                        <i class="typcn typcn-delete-outline btn-icon-append"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- artists form and php end -->
<?php
include("footer.php");
?>