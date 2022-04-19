<?php
ob_start();
 session_start();
 include('../includes/db.php');
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  ob_end_flush();

  } else{

  
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
                                <div class="col-md-12 col-xl-6">
                                    <div class="card project-task">
                                        <div class="card-header">
                                     
                                        </div>
                                        <div class="card-block p-b-10">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Sno.</th>
                                                            <th>Services</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>

                                                    <tfoot>
                                                        <tr>
                                                            <th>Sno.</th>
                                                            <th>Services</th>
                                                            <th>Actions</th>
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
                                                        <tr class="table-hover">
                                                        <td><?php echo $cnt; ?></td>
                                                            <td> <?php echo $services; ?> </td>
                                                            <td>
                                                                <button class="btn btn-danger" >
                                                                <a href="services.php?delete=<?php echo $services_id   ?>"  onClick="return confirm('Do you really want to delete Service?');" > Delete </a>
                                                                </button>

                                                                <button type="button" class="btn btn-success editbtn"> Edit
                                                                </button>
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
                                
      
<!-- Add service Modal start -->
<div class="modal fade" id="add_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Service</h5>
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
<!-- Add service Modal end -->

<!-- ###################################################################################### -->

<?php 


if(isset($_POST['update'])){

    $id = $_POST['update_id'];
    $services = $_POST['services'];

    $query =mysqli_query($conn,"UPDATE services SET services='$services' WHERE id='$id'");
    if($query)
            {
                echo "<script>alert('Service successfully Updated');</script>";
                echo "<script type='text/javascript'> document.location = 'services.php'; </script>";
            }

}
?>
<!-- edit service Modal start -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id=""  method="post">
        	<div class="row">

                <input type="hidden" name="update_id" id="update_id">

        		<div class="col-12">
        			<div class="form-group">
		        		<label>Services </label>
                        <input type="text" name="services" id="services" class="form-control" placeholder="Enter Services " value="<?php if(isset($_POST['services'])){ echo $services; } ?>">
		        	</div>
        		</div>

        		<div class="col-12">
        			<button type="submit" class="btn btn-primary" name="update">Update Service</button>
        		</div>
        	</div>
        	
        </form>

      </div>
    </div>
  </div>
</div>
<!-- edit service Modal end -->

<!-- ###################################################################################### -->


                                            </div>
                                            </div>
                                            <!-- end edit details -->
                                               
                                            </div>
                                        </div>
                                    </div>

                                    <!-- end of conatiner -->     

<?php } include_once('./include/admin_footer.php') ?>


<script>

$(document).ready(function () {
    $('.editbtn').on('click', function(){

        $('#editmodal').modal('show');

        $tr= $(this).closest('tr');

        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        console.log(data);

        $('#update_id').val(data[0]);
        $('#services').val(data[1]);



    });

});






</script>


<!-- Change Oil	
Engine Tune up	
Overall Checkup	
Tire Replacement
Engine Repair
Battery Replace
Tow Truck -->
	

