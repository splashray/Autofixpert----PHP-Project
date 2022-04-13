<?php
include_once('includes/db.php');

if(isset($_POST['submits']))
{
   
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$nin=$_POST['nin'];
$address=$_POST['address'];
$password=md5($_POST['password']);

$fname = mysqli_real_escape_string($conn, $fname);
$mname = mysqli_real_escape_string($conn, $mname);
$lname = mysqli_real_escape_string($conn, $lname);
$email = mysqli_real_escape_string($conn, $email);
$phone = mysqli_real_escape_string($conn, $phone);
$nin = mysqli_real_escape_string($conn, $nin);
$address = mysqli_real_escape_string($conn, $address);
$password = mysqli_real_escape_string($conn, $password);
  
   
    $sql=mysqli_query($conn,"select id from borrowers where email='$email'");
    $row=mysqli_num_rows($sql);
    
        if($row>0){
        echo "<script>alert('Email id already exist with another account. Please try with other email id');</script>";
            } else{
                $msg=mysqli_query($conn,"INSERT into borrowers(firstname,middlename,lastname,contact_no,address,email,password,tax_id) VALUES('$fname','$mname','$lname','$phone','$address','$email','$password','$nin')");
    
            if($msg)
            {
                echo "<script>alert('Registered successfully');</script>";
                echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
            }
        }
}
    
     
    ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./css/index.css">
    <title>SunPaid</title>
</head>

<body>
    <div class="loginUI">
        <section class="headTitle">
        <h1>AutoFixpert</h1>
            <p>AutoFixpert is  the Solution</p>
        </section>
        <main>
            <h2>Sign Up</h2>
            <form id="sign-up" method="post">
                <label><span>First Name:</span>
                    <div class="inputHolder">
                        <input type="text" placeholder="FirstName" name="fname" />
                        <i class="icon fa-solid fa-person"></i>
                    </div>
                </label>
                <label>
                    <span>Middle Name:</span>
                    <div class="inputHolder">
                        <input type="text" placeholder="MiddleName" name="mname" />
                        <i class="icon fa-solid fa-person"></i>
                    </div>
                </label>
                <label>
                    <span>Last Name:</span>
                    <div class="inputHolder">
                        <input type="text" placeholder="LastName" name="lname" />
                        <i class="icon fa-solid fa-person"></i>
                    </div>
                </label>
                <label>
                    <span>Email:</span>
                    <div class="inputHolder">
                        <input type="email" placeholder="Input your Email" name="email" />
                        <i class="icon fa-regular fa-envelope"></i>
                    </div>
                </label>
                <label>
                    <span>Phone Number:</span>
                    <div class="inputHolder">
                        <input type="tel" placeholder="Phone No." name="phone"/>
                        <i class="icon fa-solid fa-phone"></i>
                    </div>
                </label>
                <label>
                    <span>NIN Number:</span>
                    <div class="inputHolder">
                        <input type="text" placeholder="NIN ID" name="nin" />
                        <i class="icon fa-regular fa-id-card"></i>
                    </div>
                </label>
                <label>
                    <span>Your Address:</span>
                    <textarea placeholder="Your Address" name="address" ></textarea>
                </label>
                <label>
                    <span>Password:</span>
                    <div class="inputHolder">
                        <input type="password" placeholder="Input your Password" name="password" />
                        <i class="icon fa-solid fa-key"></i>
                    </div>
                </label>

                <button type="submit" name="submits"> SIGN UP </button>
            </form>
            <p class="signUp">Already have an account? <a href="./signIn.php" class="signUpLink">Login</a></p>
        </main>
    </div>
</body>

</html>