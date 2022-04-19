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
                                                <li class="breadcrumb-item"><a href="submit_request.php">Send another Request</a>
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

                            while ($customer = mysqli_fetch_object($display_query)) {
                            //  $ref = $customer['request_ref'];


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
                                                                            echo $customer->request_ref;   
                                                                        ?>


                                                                    </p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                            <!-- <a href="check_request.php?id=" class="viewModal">
                                                                    <p class="d-inline-block m-r-20">Click Here</p>
                                                            </a> -->

                                                                <button class="btn btn-primary"  data-toggle="modal" data-target="#myModal" id="<?php echo $customer->request_ref; ?>" onclick="showDetails(this);">Details </button>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of task --> <?php  }  ?>




<!-- Modal -->
<div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
               Request Information
            </h4>
         </div>
         
         <div class = "modal-body">
                        <p>Mechanical Service: <span id="ms"> </span></p>
                        <p>Request Type: <span id="rt"><?php  ?></span></p>
                        <p>Vehicle Plate No: <span id="vhn"><?php  ?></span></p>
                        <p>Date: <span id="dat"><?php  ?></span></p>
                        <p>Time: <span id="ti"><?php  ?></span></p>
                        <p>Email: <span id="em"><?php ?></span></p>
                        <p>Phone: <span id="phone"></span></p>
                        <p>Address: <span id="add"><?php  ?> </span></p>
                        <p>Additional Message: <span id="msg"><?php  ?> </span></p>
                        <p>Status: <span id="sta"><?php  ?> </span></p> 

         </div>
         
         
         
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div><!-- /.modal -->


                        <?php }
                    include_once('./includes/user_footer.php') ?>




<script> 


function showDetails(button){
    var request_ref = button.id;
    //ajax call

    $.ajax({
			url:"request.php",
			method:"GET",
			data:{"request_ref": request_ref},
			success:function(response) {
                var customer = JSON.parse(response);
                $("#ms").text(customer.services);
                $("#rt").text(customer.request_type);
                $("#vhn").text(customer.vehicle_num);
                $("#dat").text(customer.date);
                $("#ti").text(customer.time);
                $("#em").text(customer.email);
                $("#phone").text(customer.phone);
                $("#add").text(customer.address);
                $("#msg").text(customer.message);
                $("#sta").text(customer.status);
                $("#myModalLabel").text(customer.request_ref);
            }

        });
}
</script>