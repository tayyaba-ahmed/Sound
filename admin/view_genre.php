<?php
include("header.php");
include("connection.php");
$q = "SELECT * FROM genre ORDER BY genre_ID ASC"; 
$rows = mysqli_query($connect, $q);
?>
<!-- genres form and php start -->
<div class="container-fluid pt-4 px-4">
    <div class="card bg-secondary">
        <div class="table-responsive pt-3">
            <table class="table table-striped project-orders-table">
                <thead>
                    <tr>
                        <th class="ml-5">ID</th>
                        <th>Genre Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($data = mysqli_fetch_assoc($rows)) {
                    ?>
                        <tr>
                            <td class="text-white"><?php echo $data['genre_ID'] ?></td>
                            <td class="text-white"><?php echo $data['genre_name'] ?></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="update_genre.php?id=<?php echo $data['genre_ID'] ?>" type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
                                        Edit
                                        <i class="typcn typcn-edit btn-icon-append"></i>
                                    </a>
                                    &nbsp;&nbsp;
                                    <a href="delete_genre.php?id=<?php echo $data['genre_ID'] ?>" type="button" class="btn btn-danger btn-sm btn-icon-text">
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
<!-- genres form and php end -->
<?php
include("footer.php");
?>