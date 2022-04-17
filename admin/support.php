<?php
ob_start();

 session_start();
 include('./includes/db.php');
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  ob_end_flush();

            
  } else{
    if(isset($_POST['support'])){
   
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        
        $query = "INSERT INTO message(name, email, subject, message) ";
        $query .= "VALUES('{$name}','{$email}','{$subject}','{$message}' ) ";
        
        $msg_query = mysqli_query($conn,$query);
        if(!$msg_query){
            die("Query Failed". mysqli_error($conn));
        }
        echo "<script>alert('Message Sent and Recieved');</script>";
        echo "<script type='text/javascript'> document.location = 'support.php'; </script>";
        
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
                                                    <h4>Support</h4>
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
                                                        <li class="breadcrumb-item"><a href="support.php">Contact Support</a>
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
                                            <h5>You can message our support online...</h5>
                                            <span>  Or either send or call our support </span>
                                            <div class="card-header-right">    <ul class="list-unstyled card-option">        <li><i class="icofont icofont-simple-left "></i></li>        <li><i class="icofont icofont-maximize full-card"></i></li>        <li><i class="icofont icofont-minus minimize-card"></i></li>        <li><i class="icofont icofont-refresh reload-card"></i></li>        <li><i class="icofont icofont-error close-card"></i></li>    </ul></div>
                                        </div>


                                        <div class="card-block tab-icon">
                                                        <!-- Row start -->
                                                        <div class="row">
                                                            <div class="col-lg-12 col-xl-6">
                                                                <!-- <h6 class="sub-title">Tab With Icon</h6> -->
                                                                <!-- Nav tabs -->
                                                                <ul class="nav nav-tabs md-tabs " role="tablist">
                                                                   
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" data-toggle="tab" href="#profile7" role="tab"><i class="icofont icofont-ui-user "></i>Contact Support</a>
                                                                        <div class="slide"></div>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" data-toggle="tab" href="#messages7" role="tab"><i class="icofont icofont-ui-message"></i>Send Us Messages</a>
                                                                        <div class="slide"></div>
                                                                    </li>
                                                                   
                                                                </ul>
                                                                <!-- Tab panes -->
                                                                <div class="tab-content card-block">
                                                                    
                                                                    <div class="tab-pane" id="profile7" role="tabpanel">
                                                                        <p class="m-0">
                                                                        <h5> Call Us</h5>
                  <p>+2349012345678  </p>

                  
                  <h5>Email Us</h5>
                  <p>info@autofixpert.com.ng</p>

                  <h5>Our Physical address</h5>
                  <p>Kwara State  <br> Polytechnic, <br> Ilorin Kwara State <br></p>
                                                                        </p>
                                                                    </div>
                                                                    <div class="tab-pane" id="messages7" role="tabpanel">
                                                                        <p class="m-0 center" id ="big">





            <form action="" method="post"  >
              <div class="row">
                <div class="col form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              
              <div class="text-center"><button type="submit" class="btn btn-primary" name="support">Send Message</button></div>
            </form>
              
              










                                                                        </p>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <!-- Row end -->
                                                    </div>
                                                </div>
                                                <!-- Tab variant tab card start -->
                                        











                                    </div>
                                    <!-- Contextual classes table ends -->
                                    


                                </div>
                                <!-- Page-body end -->



                                    <!-- end of conatiner -->
           

<?php }include_once('./includes/user_footer.php') ?>