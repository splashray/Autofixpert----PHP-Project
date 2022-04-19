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
                                                    <h4>Mechanics List</h4>
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
                                                        <li class="breadcrumb-item"><a href="mechanics.php">CRUD Mechanics </a>
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
                                            <h5>Mechanics Available Are Listed Below</h5>
                                            <span> click the Actions to Edit Mechanics  </span>
                                            <div class="card-header-right">    <ul class="list-unstyled card-option">        <li><i class="icofont icofont-simple-left "></i></li>        <li><i class="icofont icofont-maximize full-card"></i></li>        <li><i class="icofont icofont-minus minimize-card"></i></li>        <li><i class="icofont icofont-refresh reload-card"></i></li>        <li><i class="icofont icofont-error close-card"></i></li>    </ul></div>
                                        </div>

      	<div class="col-10">
      		<a href="#" data-toggle="modal" data-target="#add_product_modal" class="btn btn-primary btn-sm">Add Mechanics</a>
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
                                                            <th>Mechanic Name</th>
                                                            <th>Mechanic Contact</th>
                                                            <th>Mechanic Email</th>
                                                            <th>Date Created</th>
                                                            <th>Status</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>

                                                    <tfoot>
                                                        <tr>
                                                            <th>Sno.</th>
                                                            <th>Mechanic Name</th>
                                                            <th>Mechanic Contact</th>
                                                            <th>Mechanic Email</th>
                                                            <th>Date Created</th>
                                                            <th>Status</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>

                                                    <tbody>
                                            <?php 
                                                $query = "SELECT * FROM Mechanics";
                                                $select_ser = mysqli_query($conn,$query);
                                                $cnt=1;
                                                while($row = mysqli_fetch_assoc($select_ser)){ 
                                                    $mech_id = $row['mech_id'];
                                            ?>
                                                        <tr class="table-hover">
                                                        <td><?php echo $cnt; ?></td>
                                                            <td> <?php echo $row["mechanic_name"]; ?> </td>
                                                            <td> <?php echo $row["mechanic_contact"]; ?> </td>
                                                            <td> <?php echo $row["mechanic_email"]; ?> </td>
                                                            <td> <?php echo $row["date_created"]; ?> </td>
                                                            <td> <?php echo $row["status"]; ?> </td>

                                                            <td>
                                                            <button class="btn btn-danger" >
                                                                <a href="mechanics.php?delete=<?php echo $mech_id   ?>"  onClick="return confirm('Do you really want to delete Mechanic?');" > Delete </a>
                                                            </button>

                                                            <button  class="btn btn-success editbtn" > Edit </button>
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
    $mech_id = $_GET['delete'];

    $query = "DELETE FROM mechanics WHERE mech_id ='$mech_id'";
    $delete_query = mysqli_query($conn, $query);
    echo "<script type='text/javascript'> document.location = 'mechanics.php'; </script>";
}

if(isset($_POST['add'])){
    $mechName = $_POST['mname'];
    $mechCon = $_POST['mcon'];
    $mechEmail = $_POST['mem'];
    $date = $_POST['date'];
    // $status = $_POST['status'];

    $msg  = "INSERT into mechanics(mechanic_name,mechanic_contact,mechanic_email,date_created) ";
    $msg .="VALUES('$mechName','$mechCon','$mechEmail','$date') ";

            $order_query = mysqli_query($conn,$msg);
            if(!$order_query){
                die("Query Failed". mysqli_error($conn));
            }
         
            if($order_query)
            {
                echo "<script>alert('Mechanic successfully Added');</script>";
                echo "<script type='text/javascript'> document.location = 'mechanics.php'; </script>";
            }
 }

?>

                                
      
<!-- Add Product Modal start -->


<div class="modal fade" id="add_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Mechanic</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add-product-form"  method="post">
        	<div class="row">

        		<div class="col-12">
        			<div class="form-group">
		        		<label>Mechanic Name</label>
                        <input type="text" name="mname" class="form-control" placeholder="Enter Mechanic Name" required>
		        	</div>
        		</div>

                <div class="col-12">
        			<div class="form-group">
		        		<label>Mechanic Contact </label>
                        <input type="text" name="mcon" class="form-control" placeholder="Enter Mechanic Contact" required>
		        	</div>
        		</div>

                <div class="col-12">
        			<div class="form-group">
		        		<label>Mechanic Email </label>
                        <input type="email" name="mem" class="form-control" placeholder="Enter Mechanic Email" required>
		        	</div>
        		</div>

                <div class="col-12">
        			<div class="form-group">
		        		<label>Date Created </label>
                        <input type="date" data-date-inline-picker="true" name="date" class="form-control" placeholder="Enter Date"  required />		        	</div>
        		</div>

                <!-- <div class="col-12">
        			<div class="form-group">
		        		<label>Status </label>
                        <input type="text" name="status" class="form-control" placeholder="Enter Status" required>
		        	</div>
        		</div> -->


        		<div class="col-12">
        			<button type="submit" class="btn btn-primary" name="add">Add Mechanic</button>
        		</div>
        	</div>
        	
        </form>

      </div>
    </div>
  </div>
</div>
<!-- Add Product Modal end -->


<!-- ###################################################################################### -->

<?php

if(isset($_POST['update'])){

    $id = $_POST['mech_id'];

    $mname = $_POST['mname'];
    $mcon = $_POST['mcon'];
    $mem = $_POST['mem'];
    $status = $_POST['status'];

    $query =mysqli_query($conn,"UPDATE mechanics SET mechanic_name='$mname', mechanic_contact='$mcon', mechanic_email='$mem', status='$status' WHERE mech_id='$id'");
    if($query)
            {
                echo "<script>alert('Mechanic successfully Updated');</script>";
                echo "<script type='text/javascript'> document.location = 'mechanics.php'; </script>";
            }

}

?>


<!-- edit mechanic Modal start -->

<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Mechanic</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post">
        	<div class="row">

            <input type="hidden" name="mech_id"  id="id" >

        		<div class="col-12">
        			<div class="form-group">
		        		<label>Mechanic Name</label>
                        <input type="text" name="mname" id="mename" class="form-control" placeholder="Enter Mechanic Name" required>
		        	</div>
        		</div>

                <div class="col-12">
        			<div class="form-group">
		        		<label>Mechanic Contact </label>
                        <input type="text" name="mcon" id="mecon" class="form-control" placeholder="Enter Mechanic Contact" required>
		        	</div>
        		</div>

                <div class="col-12">
        			<div class="form-group">
		        		<label>Mechanic Email </label>
                        <input type="email" name="mem" id="meema" class="form-control" placeholder="Enter Mechanic Email" required>
		        	</div>
                </div>

                <div class="col-12">
        			<div class="form-group">
		        		<label>  Status </label>
                        <select name="status" class="form-control"  required />
                        <option value=''>Choose Status Type </option>
                        <option value='Unavailable'> Unavailable </option>
                        <option value='Available'>Available </option>
                        </select>
		        	</div>
        		</div>


        		<div class="col-12">
        			<button type="submit" class="btn btn-primary" name="update">Update Mechanic</button>
        		</div>
        	</div>
        	
        </form>

      </div>
    </div>
  </div>
</div>
<!-- edit mechanic Modal end -->

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

        $('#id').val(data[0]);
        $('#mename').val(data[1]);
        $('#mecon').val(data[2]);
        $('#meema').val(data[3]);
        $('#sta').val(data[5]);





    });

});





</script>