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
                                                    <h4>Services List</h4>
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
                                                        <li class="breadcrumb-item"><a href="settings.php">CRUD Services </a>
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
                                            <h5>Services Offered Are Listed Below</h5>
                                            <span> click the Actions to Edit Services  </span>
                                            <div class="card-header-right">    <ul class="list-unstyled card-option">        <li><i class="icofont icofont-simple-left "></i></li>        <li><i class="icofont icofont-maximize full-card"></i></li>        <li><i class="icofont icofont-minus minimize-card"></i></li>        <li><i class="icofont icofont-refresh reload-card"></i></li>        <li><i class="icofont icofont-error close-card"></i></li>    </ul></div>
                                        </div>

      	<div class="col-10">
      		<a href="#" data-toggle="modal" data-target="#add_product_modal" class="btn btn-primary btn-sm">Add Services</a>
      	</div>

                                                                        
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table">
                        <thead>

                                        <tr>
                                   <th>Sno.</th>
                                  <th>Services Categories</th>
                                  <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tfoot>
                                        <tr>
                                  <th>Sno.</th>
                                  <th>Services Categories</th>
                                  <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
            <?php 
        $query = "SELECT * FROM services";
        $select_ser = mysqli_query($conn,$query);
        $cnt=1;
        while($row = mysqli_fetch_assoc($select_ser)){ 
            $services_id = $row['id'];
            $services = $row['services'];

            ?>

            <tr class="table-active">
            <td><?php echo $cnt; ?></td>
            <td> <?php echo $services; ?> </td>
            <td>
                <a href="services.php?edit=<?php echo $services_id  ?>"  data-toggle="modal" data-target="#edit_product_modal" > <i class="ti-pencil"></i> </a>  <br><br>

                <a href="services.php?delete=<?php echo $services_id   ?>"  onClick="return confirm('Do you really want to delete');" > <i class="ti-trash"></i> </a>

            </td>
            </tr>

            <?php $cnt=$cnt+1; }?>
            </tbody>
                    </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Contextual classes table ends -->

<?php 


if(isset($_GET['delete'])){
    $the_services_id = $_GET['delete'];

    $query = "DELETE FROM services WHERE id = {$the_services_id}";
    $delete_query = mysqli_query($conn, $query);
    echo "<script type='text/javascript'> document.location = 'services.php'; </script>";
}

if(isset($_POST['add'])){
    $the_service = $_POST['services'];

    $msg  = "INSERT into services(services) ";
    $msg .="VALUES('$the_service') ";

            $order_query = mysqli_query($conn,$msg);
            if(!$order_query){
                die("Query Failed". mysqli_error($conn));
            }
         
            if($order_query)
            {
                echo "<script>alert('Service successfully Added');</script>";
                echo "<script type='text/javascript'> document.location = 'services.php'; </script>";
            }
 }

?>

<!-- Add Product Modal start -->


<div class="modal fade" id="add_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Services Categories</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add-product-form"  method="post">
        	<div class="row">

        		<div class="col-12">
        			<div class="form-group">
		        		<label>Services </label>
                        <input type="text" name="services" class="form-control" placeholder="Enter Services " value="<?php if(isset($_POST['services'])){ echo $services; } ?>">
		        	</div>
        		</div>

        		<div class="col-12">
        			<button type="submit" class="btn btn-primary" name="add">Add Service</button>
        		</div>
        	</div>
        	
        </form>

      </div>
    </div>
  </div>
</div>
<!-- Add Product Modal end -->






<?php

if(isset($_GET['edit'])){
    $services_id = $_GET['edit'];

    // $query = "UPDATE FROM services WHERE id = {$services_id}";
    // $upd_query = mysqli_query($conn, $query);
    // echo "<script type='text/javascript'> document.location = 'services.php'; </script>";

$query = "SELECT * FROM services WHERE id = $services_id ";
$select_services_id = mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($select_services_id)){
	$services = $row['services'];

?>


<!-- edit Product Modal start -->


<div class="modal fade" id="edit_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Services Categories</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add-product-form"  method="post">
        	<div class="row">

        		<div class="col-12">
        			<div class="form-group">
		        		<label>Services </label>
                        <input type="text" name="services" class="form-control" placeholder="Enter Services " value="<?php if(isset($_POST['services'])){ echo $services; } ?>">
		        	</div>
        		</div>

        		<div class="col-12">
        			<button type="submit" class="btn btn-primary" name="edit">Edit Service</button>
        		</div>
        	</div>
        	
        </form>

      </div>
    </div>
  </div>
</div>
<!-- edit Product Modal end -->
<?php  }}?>

































                                            </div>


                                            </div>
                                            <!-- end edit details -->


                                               
                                            </div>
                                        </div>
                                    </div>



                                    <!-- end of conatiner -->
           

<?php } include_once('./include/admin_footer.php') ?>