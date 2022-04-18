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
                                                    <h4>Settings</h4>
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
                                                        <li class="breadcrumb-item"><a href="settings.php">Change Personal Details</a>
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
                                              

                                            <!-- start edit details -->
                                        <div class="card">

<div class="card-block">

<?php 

$id=$_SESSION['id'];
$query=mysqli_query($conn,"select * from users where id='$id'");
while($result=mysqli_fetch_array($query)):
    ?>

                <form method="post">

                    <br><br>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"name="username" id="fname" value ="<?php echo $result['username'];?>" required />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"><i class="zmdi zmdi-email"></i>Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control"name="email" id="email" value ="<?php echo $result['email']; ?>" readonly />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"><i class="zmdi zmdi-email"></i>Phone Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"name="contact" id="contact"  value = "<?php echo $result['phone']; ?>" pattern="[0-9]{11}" title="11 numeric characters only"  maxlength="11" required/>
                            </div>
                        </div>
   

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"><i class="zmdi zmdi-email"></i>Registered Date</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"name="regdate" id="regdate" value ="<?php echo $result['register_date']; ?>" readonly />
                            </div>
                        </div>
        

                            <div class="form-group form-button">
                                <button type="submit" class="btn btn-primary btn-block" name="update">Update Details</button>
                            </div>
                        
                                       
                    </form>  <br><br><br>
         
<?php
endwhile;
  ?>




<!-- password section -->


<form method="post" name="changepassword" onSubmit="return valid();" id="chgpass">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Current Password </label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="currentpassword" name="currentpassword" value="" required />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">New Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="newpassword" name="newpassword" value="" required />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Confirm New Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" required />
                            </div>
                        </div>



<div class="form-group form-button"><button type="submit" class="btn btn-primary btn-block" name="change-password">Change Password</button> </div>
                        
                      
</form>










</div>


</div>
<!-- end edit details -->


                                               
                                            </div>
                                        </div>
                                    </div>



                                    <!-- end of conatiner -->
           

<?php } include_once('./include/admin_footer.php') ?>