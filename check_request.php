<?php
ob_start();

 session_start();
 include('./includes/db.php');
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  ob_end_flush();

            
  } else{
   

?>
<?php  include_once('./includes/user_header.php');  ?>
<?php  include_once('./includes/user_nav.php');  ?>
 

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
<?php  include_once('./includes/user_sidebar.php');  ?>

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


                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Hello card</h5>
                                                        <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option" style="width: 35px;">
                                                                <li class=""><i class="icofont icofont-simple-left"></i></li>
                                                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                                                <li><i class="icofont icofont-refresh reload-card"></i></li>
                                                                <li><i class="icofont icofont-error close-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <p>
                                                            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                            enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                                            nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                                            in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                                            nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                                                            sunt in culpa qui officia deserunt mollit anim id est laborum."
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <!-- end of conatiner -->
           

<?php } include_once('./includes/user_footer.php') ?>