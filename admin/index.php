<?php
include("header.php");
?>

<!-- Section 1 Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-line fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Plays Count</p>
                    <h6 class="mb-0">50,999</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-bar fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Users Count</p>
                    <h6 class="mb-0">1,456</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-play-circle fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Today Views</p>
                    <h6 class="mb-0">3,245</h6>
                </div>
            </div>
        </div>
        <!-- Total Music Views -->
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-headphones fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Views</p>
                    <h6 class="mb-0">45,678</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Section 1 End -->

<!-- Section 2 Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-1">

        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Worldwide Music Views</h6>
            </div>
            <canvas id="worldwide-sales"></canvas>
        </div>

    </div>
</div>
<!-- Section 2 End -->

<!-- Recent Music & Video Views Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Recent Music & Video Views</h6>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th scope="col">Date</th>
                        <th scope="col">Video/Music</th>
                        <th scope="col">Viewer</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>16 Oct 2024</td>
                        <td>Song - "Breath"</td>
                        <td>Michael Smith</td>
                        <td>2:30</td>
                        <td>Watched</td>
                    </tr>
                    <tr>
                        <td>18 Oct 2024</td>
                        <td>Video - "Dream"</td>
                        <td>Sarah Lee</td>
                        <td>3:45</td>
                        <td>Watched</td>
                    </tr>
                    <tr>
                        <td>20 Oct 2024</td>
                        <td>Video - "End Game"</td>
                        <td>David Brown</td>
                        <td>3:30</td>
                        <td>Watched</td>
                    </tr>
                    <tr>
                        <td>22 Oct 2024</td>
                        <td>Song - "Hush"</td>
                        <td>Emily White</td>
                        <td>2:15</td>
                        <td>Watched</td>
                    </tr>
                    <tr>
                        <td>23 Oct 2024</td>
                        <td>Video - "Higher"</td>
                        <td>James Black</td>
                        <td>3:45</td>
                        <td>Watched</td>
                    </tr>
                    <tr>
                        <td>27 Oct 2024</td>
                        <td>Song - "Gorgeous"</td>
                        <td>Linda Green</td>
                        <td>3:20</td>
                        <td>Watched</td>
                    </tr>
                    <tr>
                        <td>01 Nov 2024</td>
                        <td>Video - "Aadat"</td>
                        <td>Mark Johnson</td>
                        <td>3:00</td>
                        <td>Watched</td>
                    </tr>
                    <tr>
                        <td>02 Nov 2024</td>
                        <td>Song - "Reputation"</td>
                        <td>Olivia Harris</td>
                        <td>3:15</td>
                        <td>Watched</td>
                    </tr>
                    <tr>
                        <td>04 Nov 2024</td>
                        <td>Song - "Rafta Rafta"</td>
                        <td>Paul Turner</td>
                        <td>2:56</td>
                        <td>Watched</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Recent Music & Video Views End -->





</body>
<?php
include("footer.php");
?>

</html>