<?php
ob_start();

 session_start();
 include('./includes/db.php');
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  ob_end_flush();

            
  } else{


    if(isset($_POST['submits']))
    {
    $service=$_POST['optservices'];
    $request=$_POST['optrequest'];
    $name=$_POST['name'];
    $vnum=$_POST['vnum'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $date=$_POST['date'];
    $time=$_POST['time'];
    $address=$_POST['address'];
    $message=$_POST['info'];
  
    
    $service = mysqli_real_escape_string($conn, $service);
    $request = mysqli_real_escape_string($conn, $request);
    $name = mysqli_real_escape_string($conn, $name);
    $vnum = mysqli_real_escape_string($conn, $vnum);
    $email = mysqli_real_escape_string($conn, $email);
    $phone = mysqli_real_escape_string($conn, $phone);
    $date = mysqli_real_escape_string($conn, $date);
    $time = mysqli_real_escape_string($conn, $time);
    $address = mysqli_real_escape_string($conn, $address);
    $message = mysqli_real_escape_string($conn, $message);
    
    $data = 0;
                                      
    $ref_no = mt_rand(1,99999999);
    $i= 1;

        while($i== 1){
            $check = mysqli_query($conn,"SELECT * FROM appointment where request_ref ='$ref_no' ")->num_rows;
            if($check > 0){
            $ref_no = mt_rand(1,99999999);
            }else{
                $i = 0;
            }
        }
        $data .= " , request_ref = '$ref_no' ";
    
       
                    $msg  = "INSERT into appointment(request_ref,services,request_type,name,vehicle_num,email,phone,date,time,message,address) ";
                    $msg .="VALUES('$ref_no','$service','$request','$name','$vnum','$email','$phone','$date','$time','$message','$address') ";

                     $order_query = mysqli_query($conn,$msg);
                     if(!$order_query){
                         die("Query Failed". mysqli_error($conn));
                     }
                    
                if($order_query)
                {
                    echo "<script>alert('Request successfully Booked');</script>";
                    echo "<script type='text/javascript'> document.location = 'check_request.php'; </script>";
                }
            
    }
        
         
   

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
                                                    <h4>Submit Requests</h4>
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
                                                        <li class="breadcrumb-item"><a href="submit_request.php">Submit Your Request</a>
                                                        </li>
                                                       
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-header end -->


                                   
                                <!-- Page-body start -->
                                <div class="page-body">
                                    
                                        
                                    <!-- Contextual classes table starts -->
                                    <div class="card">
                                        <div class="card-header ">
                                            <h5>Ensure your Services details are all Correct...</h5>
                                            <span> <a href="change-personal-details.php"> Add additional details about your vehicle for more clarity  </a> </span>
                                            <div class="card-header-right">    <ul class="list-unstyled card-option">        <li><i class="icofont icofont-simple-left "></i></li>        <li><i class="icofont icofont-maximize full-card"></i></li>        <li><i class="icofont icofont-minus minimize-card"></i></li>        <li><i class="icofont icofont-refresh reload-card"></i></li>        <li><i class="icofont icofont-error close-card"></i></li>    </ul></div>
                                        </div>

                                      
                                         <!-- Tooltips on textbox card start -->
                                               
                                                <div class="card-block tooltip-icon button-list">

                                                    <form method="post">

                                                <div class="input-group">
                                                        <span class="input-group-addon" id="name"><i class="ti-layout-media-right"></i></span>
                                                        <select name="optservices" id="services" class="form-control" title="Enter Services" data-toggle="tooltip" required />
                                                        <option value=''>Choose Mechanical Service </option>
                                <?php
                                    
                                    $query = "SELECT * FROM services";
                                    $fetch_ser = mysqli_query($conn,$query);

                                    while($row = mysqli_fetch_assoc($fetch_ser)){
                                        $id = $row['id'];
                                        $service = $row['services'];
                                    

                                            echo "<option value='{$service}'>{$service}</option>";

                                        } ?>
                                                 </select>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="request"><i class="ti-shopping-cart"></i></span>
                                                        <select name="optrequest" id="request" class="form-control" title="Enter Request Type" data-toggle="tooltip" required />
                                                        <option value=''>Choose Request Type </option>
                                                        <option value='Pick-up'>Pick Up </option>
                                                        <option value='Drop-off'>Drop Off </option>

                                                        </select>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="name"><i class="icofont icofont-user-alt-3"></i></span>
                                                        <input type="text" name="name" class="form-control" placeholder="Enter Your Name" title="Enter your name" data-toggle="tooltip" required/>
                                                    </div>
                                                    
                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="vhn"><i class="ti-car"></i></span>
                                                        <input type="phone" name="vnum" class="form-control" placeholder="Enter Your Vehicle Plate Number" title="Enter Your Vehicle Plate Number" data-toggle="tooltip" required />
                                                     </div>
                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="email"><i class="icofont icofont-ui-email"></i></span>
                                                        <input type="email" name="email" class="form-control" value="<?php if(isset($_SESSION['email'])){ echo  $_SESSION['email']; } ?>" readonly />
                                                    </div>

                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="phone"><i class="ti-mobile"></i></span>
                                                        <input type="phone" name="phone" class="form-control" placeholder="Enter your Phone Number" title="Enter your Phone Number" data-toggle="tooltip" required />
                                                    </div>

                                                   
                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="date"><i class="ti-alarm-clock"></i></span>
                                                        <input type="date" data-date-inline-picker="true" name="date" class="form-control" placeholder="Enter Date" title="Enter Date" data-toggle="tooltip" required />
                                                    </div>

                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="time"><i class="ti-time"></i></span>
                                                        <input type="time" data-time-inline-picker="true" name="time" class="form-control" placeholder="Enter Time" title="Enter Time" data-toggle="tooltip" required />
                                                    </div>

                                                    <h6 align="center">Your Address </h6>

                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="address"><i class="ti-direction"></i></span>
                                                        <textarea  name="address" rows="5" class="form-control" title="Enter Your Address" data-toggle="tooltip" required > </textarea>
                                                    </div>

                                                    <h6 align="center">Enter Addtional Informations </h6>

                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="info"><i class="ti-comments"></i></span>
                                                        <textarea  name="info" rows="5" class="form-control" title="Enter Addtional Informations" data-toggle="tooltip" required > </textarea>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary" name="submits">Submit Request 
                                                    </button>

                                                    </form>
                                                </div>
                                            </div>
                                            <!-- Tooltips on textbox card end -->






                                        </div>
                                    </div>
                                    <!-- Contextual classes table ends -->
                                    


                                </div>
                                <!-- Page-body end -->
           

<?php } include_once('./includes/user_footer.php') ?>