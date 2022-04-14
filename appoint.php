<?php

if(isset($_POST['submit']))
{
$service=$_POST['services'];
$name=$_POST['name'];
$vnum=$_POST['vnum'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$date=$_POST['date'];
$time=$_POST['time'];
$message=$_POST['message'];

$service = mysqli_real_escape_string($conn, $service);
$name = mysqli_real_escape_string($conn, $name);
$vnum = mysqli_real_escape_string($conn, $vnum);
$email = mysqli_real_escape_string($conn, $email);
$phone = mysqli_real_escape_string($conn, $phone);
$date = mysqli_real_escape_string($conn, $date);
$time = mysqli_real_escape_string($conn, $time);
$message = mysqli_real_escape_string($conn, $message);
  
   
                $msg=mysqli_query($conn,"INSERT into appointment(services,name,vehicle_num,email,phone,date,time,message) VALUES('$service','$name','$vnum','$email','$phone','$date','$time','$message')");
    
            if($msg)
            {
                echo "<script>alert('Appointment successfully Booked');</script>";
                echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
            }
        
}
    
     
    ?>



<section id="appoints" class="ftco-appointment ftco-section ftco-no-pt ftco-no-pb img" style="background-image:url(images/4.jpg)">
<!-- <div class="overlay"></div> -->
<div class="container">
<div class="row d-md-flex justify-content-end">
<div class="col-md-12 col-lg-6 half p-3 py-5 pl-lg-5 ftco-animate heading-section heading-section-white fadeInUp ftco-animated">
<h2 class="mb-4">Book a Service Request</h2>
<span class="subheading">Competent and Professional Mechanical Engineers Available</span>
<form  class="appointment" method="post">
<div class="row">
<div class="col-md-12">
<div class="form-group">
<div class="form-field">
<div class="select-wrap">
<div class="icon"><span class="fa fa-chevron-down"></span></div>

<?php
$type = $conn->query("SELECT * FROM services ");
			
?>
<select name="services" id="service" class="form-control">
<option value="">Select services</option>
<?php while($row = $type->fetch_assoc()){ ?>
<option value="<?php echo $row['id'] ?>" > <?php echo $row['services'] ?> </option>
<?php } ?>
                   
</select>
</div>
</div>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<input type="text" name="name" class="form-control" placeholder="Your Name">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<input type="text"name="vnum" class="form-control" placeholder="Vehicle number">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<input type="email" name="email" class="form-control" placeholder="Your email">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<input type="number" name="phone" class="form-control" placeholder="Your Contact Number">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<div class="input-wrap">
<div class="icon"><span class="fa fa-calendar"></span></div>
<input type="text" name="date" class="form-control appointment_date" placeholder="Date">
</div>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<div class="input-wrap">
<div class="icon"><span class="fa fa-clock-o"></span></div>
<input type="text" name="time" class="form-control appointment_time ui-timepicker-input" placeholder="Time" autocomplete="off">
</div>
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message/Address"></textarea>
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<input type="submit" name="submit" value="Send Request" class="btn btn-dark py-3 px-4">
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</section>