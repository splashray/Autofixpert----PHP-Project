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
                             $ref = $row['request_ref'];


                            ?>

                                <!-- end of conatiner -->
                                <div class="col-md-12 col-xl-6">
                                    <div class="card project-task">
                                        <div class="card-header">
                                     
                                        </div>

                                        <div class="card-block p-b-10">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th> Reference No</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="task-contain">
                                                                    <h6 class="bg-c-blue d-inline-block text-center">M</h6>


                                                                    <p class="d-inline-block m-l-20">
                                                                        <?php
                                                                        if (isset($ref)) {
                                                                            echo $ref;     
                                                                        }
                                                                        ?>


                                                                    </p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                            <a href="check_request.php?id=<?php echo $ref; ?>" class="viewModal">
                                                                    <p class="d-inline-block m-r-20">Click Here</p>
                                                                </a>
                                                                <div class=" d-inline-block">
                                                                  
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




            <!-- THE MODAL WINDOW -->
            <div id="checkModal" class="checkModal">
                <div id="overlay" class="overlay">
                </div>
                <div class="modalMssg">
                    <h3>Request Details</h3>     
                <?php

                // if(isset($_GET['view'])){
                // $ref = $_GET['id'];

                //Check the value for $ref in the click link 
                // the value is actually my own refvalue from the form i submitted
                // so help me find a way to generate a value from 112 to show as the value of this my $ref below so that it will be the key value for checking and fetching from the database.


                $ref = 51599105;
                $query = "SELECT * FROM  appointment WHERE request_ref = '$ref' ";
                $display_query = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($display_query)) 
                {
                ?>          
                    <div class="mssgHolder">
                        <p>Mechanical Service: <span>
                            <?php if($row['services'] == 1): ?>
                                <span class="badge badge-warning"> Engine Repair </span>
                            <?php elseif($row['services'] == 2): ?>
                                <span class="badge badge-info"> Battery Replace</span>
                            <?php elseif($row['services'] == 3): ?>
                                <span class="badge badge-primary"> Change Tire</span>
                            <?php elseif($row['services'] == 4): ?>
                                <span class="badge badge-success">Tow Truck</span>
                            <?php elseif($row['services'] == 5): ?>
                                <span class="badge badge-danger">Driving-School</span>
                            <?php endif; ?>
                        </span></p>
                        <p>Request Type: <span><?php echo $row['request_type']; ?></span></p>
                        <p>Vehicle Plate No: <span><?php echo $row['vehicle_num']; ?></span></p>
                        <p>Date: <span><?php echo $row['date']; ?></span></p>
                        <p>Time: <span><?php echo $row['time']; ?></span></p>
                        <p>Email: <span><?php echo $row['email']; ?></span></p>
                        <p>Phone: <span><?php echo $row['phone']; ?></span></p>
                        <p>Address: <span><?php echo $row['address']; ?> </span></p>
                    </div>
                </div> <?php } ?>
               
            </div>
            <!-- END OF MODAL WINDOW -->





                        <?php }
                    include_once('./includes/user_footer.php') ?>