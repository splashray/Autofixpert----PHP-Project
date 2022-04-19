<?php
ob_start();
 session_start();
 include('../includes/db.php');
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  ob_end_flush();

  } else{
      
//Code for Updation 

if(isset($_POST['update']))
{
    $username=$_POST['username'];
    $pcontact=$_POST['contact'];

    $userid=$_SESSION['id'];

    $msg=mysqli_query($conn,"UPDATE users SET username='$username',phone='$pcontact' where id='$userid'") ;
    if(!$msg){
        die("QUERY FAILED". mysqli_error($conn));
    }
       else if($msg)
        {
            echo "<script>alert('Profile updated successfully');</script>";
            echo "<script type='text/javascript'> document.location = 'settings.php'; </script>";
        }
}



          // Query to update password  start here
            
          if(isset($_POST['change-password'])) {

            $oldpassword=md5($_POST['currentpassword']); 
            $newpassword=md5($_POST['newpassword']);

            $sql=mysqli_query($conn,"SELECT password FROM users where password='$oldpassword'");
            $num=mysqli_fetch_array($sql);
                if($num>0)
                {
                $userid=$_SESSION['id'];
                $ret=mysqli_query($conn,"update users set password='$newpassword' where id='$userid'");
                echo "<script>alert('Password Changed Successfully !!');</script>";
                echo "<script type='text/javascript'> document.location = 'settings.php'; </script>";
                }
                else
                {
                echo "<script>alert('Old Password not match !!');</script>";
                echo "<script type='text/javascript'> document.location = 'settings.php'; </script>";
                }
     }

    // Query to update password ends here

  
?>

<script language="javascript" type="text/javascript">
function valid()
{
if(document.changepassword.newpassword.value!= document.changepassword.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.changepassword.confirmpassword.focus();
return false;
}
return true;
}
</script>

<?php  include_once('./include/admin_header.php');  ?>
<?php  include_once('./include/admin_nav.php');  ?>
 

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
<?php  include_once('./include/admin_sidebar.php');  ?>

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
                                                    <h4>Finished Service Requests</h4>
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
                                                        <li class="breadcrumb-item"><a href="service_request.php">Go to All Request </a>
                                                        </li>
                                                       
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-header end -->


                                    <!-- container start here -->


 <!-- Page-body start -->
 <div class="page-body">
                                    
                                        
                                    <!-- Contextual classes table starts -->
                                    <div class="card">
                                        <div class="card-header ">
                                        <h5>Finished Service Requests Available Are Listed Below</h5>
                                            <span> click the Actions to Edit Finished Request </span>
                                            <div class="card-header-right">    <ul class="list-unstyled card-option">        <li><i class="icofont icofont-simple-left "></i></li>        <li><i class="icofont icofont-maximize full-card"></i></li>        <li><i class="icofont icofont-minus minimize-card"></i></li>        <li><i class="icofont icofont-refresh reload-card"></i></li>        <li><i class="icofont icofont-error close-card"></i></li>    </ul></div>
                                        </div>

                                <div class="col-xl-12 col-xl-12">
                                    <div class="card project-task">
                                        <div class="card-header">
                                     
                                        </div>
                                        <div class="card-block p-b-10">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Sno.</th>
                                                            <th>Request-Ref</th>
                                                            <th>Services</th>
                                                            <th>Request Type</th>
                                                            <th>Name</th>
                                                            <th>Vehicle-Num</th>
                                                            <th>Email</th>
                                                            <th>Phone</th>	
                                                            <th>Date</th>	
                                                            <th>Time</th>	
                                                            <th>Message	</th>
                                                            <th>Address	</th>
                                                            <th>Status</th>
                                                            <th>Delete</th>
                                                            <th>Actions</th>

                                                        </tr>
                                                    </thead>

                                                    <tfoot>
                                                        <tr>
                                                            <th>Sno.</th>
                                                            <th>Request-Ref</th>
                                                            <th>Services</th>
                                                            <th>Request Type</th>
                                                            <th>Name</th>
                                                            <th>Vehicle-Num</th>
                                                            <th>Email</th>
                                                            <th>Phone</th>	
                                                            <th>Date</th>	
                                                            <th>Time</th>	
                                                            <th>Message	</th>
                                                            <th>Address	</th>
                                                            <th>Status</th>
                                                            <th>Delete</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>

                                                    <tbody>
                                            <?php 
                                                $query = "SELECT * FROM appointment WHERE status= 'Completed Request' ";
                                                $select_ser = mysqli_query($conn,$query);
                                                $cnt=1;
                                                while($row = mysqli_fetch_assoc($select_ser)){ 
                                                    $id = $row['id'];
                                            ?>
                                                        <tr class="table-hover">
                                                        <td><?php echo $cnt; ?></td>
                                                            <td> <?php echo $row["request_ref"]; ?> </td>	
                                                            <td> <?php echo $row["services"]; ?>  </td>	
                                                            <td> <?php echo $row["request_type"]; ?> </td>	
                                                            <td> <?php echo $row["name"]; ?> </td>	
                                                            <td> <?php echo $row["vehicle_num"]; ?> </td>	
                                                            <td> <?php echo $row["email"]; ?> </td>	
                                                            <td> <?php echo $row["phone"]; ?> </td>	
                                                            <td> <?php echo $row["date"]; ?> </td>	
                                                            <td> <?php echo $row["time"]; ?> </td>	
                                                            <td> <?php echo $row["message"]; ?> </td>
                                                            <td> <?php echo $row["address"]; ?> </td>	
                                                            <td> <?php echo $row["status"]; ?> </td>

                                                            <td>
                                                                <button class="btn btn-danger" >
                                                                    <a href="service_request.php?delete=<?php echo $id   ?>"  onClick="return confirm('Do you really want to delete Request?');" > Delete </a>
                                                                </button>
                                                            </td>
                                                            <td>
            <a href="service_request.php?IN-Progess=<?php echo $id; ?>"  onClick="return confirm('Do you really want to in-progress the order?');" > IN-Progress Request </a>
                        <br><br>
            <a href="service_request.php?Completed=<?php echo $id; ?>"  onClick="return confirm('Do you really want to complete the order?');" > Complete Request </a>
                        <br><br>
            <a href="service_request.php?pending=<?php echo $id; ?>"  onClick="return confirm('Do you really want to pend the order?');" > Pend Request </a>
            </td>
                                                            
                                                            </td>

                                                            </tr>

                                                            <?php $cnt=$cnt+1; }?>


                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of task -->
 <?php 

if(isset($_GET['IN-Progess'])){
    $order_id =  $_GET['IN-Progess'];
    
    $query = "UPDATE appointment SET status = 'IN-Progress Request' where id =$order_id";

    $app_query = mysqli_query($conn,$query); 
    echo "<script type='text/javascript'> document.location = 'finished.php'; </script>";

    }
     ///////////////////////////////////////////////////////////////////

     if(isset($_GET['Completed'])){
        $order_id =  $_GET['Completed'];
        
        $query = "UPDATE appointment SET status = 'Completed Request' where id =$order_id";
    
        $app_query = mysqli_query($conn,$query); 
        echo "<script type='text/javascript'> document.location = 'finished.php'; </script>";
    
        }
    ///////////////////////////////////////////////////////////////////

     if(isset($_GET['pending'])){
        $order_id =  $_GET['pending'];
        
        $query = "UPDATE appointment SET status = 'pending Request' where id =$order_id";
    
        $app_query = mysqli_query($conn,$query); 
        echo "<script type='text/javascript'> document.location = 'finished.php'; </script>";
    
        }
    /////////////////////////////////////////////////////////////////////
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $query = "DELETE FROM appointment WHERE id ='$id'";
    $delete_query = mysqli_query($conn, $query);
    echo "<script type='text/javascript'> document.location = 'service_request.php'; </script>";
}
    //////////////////////////////////////////////////////////////////
if(isset($_POST['add'])){

                $request_ref= $_POST['request_ref'];	
                $services	= $_POST['services'];
                $request_type= $_POST['request_type'];
                $name	= $_POST['name'];
                $vehicle_num= $_POST['vehicle_num'];
                $email	= $_POST['email'];
                $phone	= $_POST['phone'];
                $date	= $_POST['date'];
                $time	= $_POST['time'];
                $message= $_POST['message'];	
                $address= $_POST['address'];	


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
            $msg .="VALUES('$ref_no','$services','$request_type','$name','$vehicle_num','$email','$phone','$date','$time','$message','$address') ";

            $order_query = mysqli_query($conn,$msg);
            if(!$order_query){
                die("Query Failed". mysqli_error($conn));
            }
         
            if($order_query)
            {
                echo "<script>alert('Request successfully Added');</script>";
                echo "<script type='text/javascript'> document.location = 'service_request.php'; </script>";
            }
 }

?>

                                
 

<!-- ###################################################################################### -->






                                            </div>


                                            </div>
                                            <!-- end edit details -->


                                               
                                            </div>
                                        </div>
                                    </div>



                                    <!-- end of conatiner -->
           

<?php } include_once('./include/admin_footer.php') ?>

