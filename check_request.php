<?php
ob_start();

session_start();
include('./includes/db.php');
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
    ob_end_flush();
} else {


?>
    <?php include_once('./includes/user_header.php');  ?>
    <?php include_once('./includes/user_nav.php');  ?>


    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <?php include_once('./includes/user_sidebar.php');  ?>

            <!-- THE MODAL WINDOW -->
            <div id="checkModal" class="checkModal">
                <div id="overlay" class="overlay"></div>
                <div class="modalMssg">
                    <h3>Request Details</h3>
                    <div class="mssgHolder">
                        <p>Mechanical Service: <span>Engine Oil</span></p>
                        <p>Request Type: <span>Engine Oil</span></p>
                        <p>Vehicle Plate No.: <span>Engine Oil</span></p>
                        <p>Date and Time: <span>Engine Oil</span></p>
                        <p>Address: <span>Engine Oil</span></p>
                    </div>
                </div>
            </div>
            <!-- END OF MODAL WINDOW -->

            <div class="pcoded-content">
                <div class="pcoded-inner-content">

                    <div class="main-body">
                        <div class="page-wrapper">


                            <!-- Page-header start -->
                            <div class="page-header card">
                                <div class="row align-items-end">
                                    <div class="col-lg-8">
                                        <div class="page-header-title">
                                            <i class="icofont icofont icofont icofont-file-document bg-c-pink"></i>
                                            <div class="d-inline">
                                                <h4>Check Requests</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="page-header-breadcrumb">
                                            <ul class="breadcrumb-title">
                                                <li class="breadcrumb-item">
                                                    <a href="home.php">
                                                        <i class="icofont icofont-home"></i>
                                                    </a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="check_request.php">Check All Requests</a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Page-header end -->


                            <!-- container start here -->


                            <?php

                            $uemail = $_SESSION['email'];

                            $query = "SELECT * FROM  appointment WHERE email = '$uemail' ";
                            $display_query = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_array($display_query)) {
                            ?>

                                <!-- end of conatiner -->
                                <div class="col-md-12 col-xl-6">
                                    <div class="card project-task">
                                        <div class="card-header">
                                            <!-- <div class="card-header-left ">
                                        <h5>Time spent : project &amp; task</h5>
                                    </div>
                                    <div class="card-header-right" >
                                        <ul class="list-unstyled card-option">
                                            <li><i class="icofont icofont-simple-left "></i></li>
                                            <li><i class="icofont icofont-maximize full-card"></i></li>
                                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                                            <li><i class="icofont icofont-refresh reload-card"></i></li>
                                            <li><i class="icofont icofont-error close-card"></i></li>
                                        </ul>
                                    </div> -->
                                        </div>

                                        <div class="card-block p-b-10">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Mechanical Request</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="task-contain">
                                                                    <h6 class="bg-c-blue d-inline-block text-center">U</h6>


                                                                    <p class="d-inline-block m-l-20">
                                                                        <?php
                                                                        if (isset($row['request_ref'])) {
                                                                            echo $row['request_ref'];
                                                                        }
                                                                        ?>


                                                                    </p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a href="#" class="viewModal">
                                                                    <p class="d-inline-block m-r-20">Click Here</p>
                                                                </a>
                                                                <div class="progress d-inline-block">
                                                                    <div class="progress-bar bg-c-blue" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:80%">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of task --> <?php
                                                    }
                                                        ?>


                        <?php }
                    include_once('./includes/user_footer.php') ?>