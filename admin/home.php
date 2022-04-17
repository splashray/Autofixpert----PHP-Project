<?php
ob_start();

 session_start();
 include('../includes/db.php');
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  ob_end_flush();

            
  } else{
   

?>

<?php  include_once('../includes/user_header.php'); ?>
<?php  include_once('../includes/user_nav.php');  ?>
 

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
<?php  include_once('../includes/user_sidebar.php');  ?>

                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">

                            <div class="main-body">
                                <div class="page-wrapper">

                                <div class="page-body">
                                        <div class="row">


            <?php

            $query=mysqli_query($conn,"SELECT * FROM services");
           $totalservices=mysqli_num_rows($query);

            ?>
                                            <!-- card1 start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card widget-card-1">
                                                    <div class="card-block-small">
                                                        <i class="icofont icofont-pie-chart bg-c-blue card1-icon"></i>
                                                        <span class="text-c-blue f-w-600">Submit Service</span>
                                                        <h4>
                                                            <?php
                                                             echo $totalservices; 
                                                             ?>
                                                             Available</h4>
                                                        <div> <a href="submit_request.php">
                                                            <span class="f-left m-t-10 text-muted">
                                                                <i class="text-c-blue f-16 icofont icofont-warning m-r-10"></i>View Available Services
                                                            </span> </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card1 end -->


            <?php
            // $uemail= $_SESSION['email'];

            // $order = mysqli_query($con, "SELECT * FROM  orders WHERE order_email = '$uemail' ");
            // $totalorders = mysqli_num_rows($order);


            ?>
                                            <!-- card1 start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card widget-card-1">
                                                    <div class="card-block-small">
                                                        <i class="icofont icofont-ui-home bg-c-pink card1-icon"></i>
                                                        <span class="text-c-pink f-w-600">Check Request</span>
                                                        <h4>
                                                            <?php 
                                                            // echo $totalorders; 
                                                             ?>
                                                     5 Requests</h4>
                                                        <div> <a href="check_request.php">
                                                            <span class="f-left m-t-10 text-muted">
                                                                <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>View Your Requests
                                                            </span> </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card1 end -->
                                            <!-- card1 start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card widget-card-1">
                                                    <div class="card-block-small">
                                                        <i class="icofont icofont-warning-alt bg-c-green card1-icon"></i>
                                                        <span class="text-c-green f-w-600">Pricing</span>
                                                        <h4>Coming Soon</h4>
                                                        <div>
                                                            <span class="f-left m-t-10 text-muted">
                                                                <i class="text-c-green f-16 icofont icofont-tag m-r-10"></i>Pay and checkOut 
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card1 end -->

                                            
                                            <!-- card1 start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card widget-card-1">
                                                    <div class="card-block-small">
                                                        <i class="icofont icofont-ui-home bg-c-pink card1-icon"></i>
                                                        <span class="text-c-yellow f-w-600"> Settings</span>
                                                        <h4>
                                                        Update Info  <h4>
                                                        <div> <a href="settings.php">
                                                            <span class="f-left m-t-10 text-muted">
                                                             <i class="text-c-yellow f-16 icofont icofont-refresh m-r-10"></i>Click Here
                                                            </span>   </a> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card1 end -->
<!-- dashboard box ends -->

<?php }
include_once('../includes/user_footer.php') ?>