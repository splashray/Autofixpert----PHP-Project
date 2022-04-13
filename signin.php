<?php
session_start();
// error_reporting(0);
include_once('includes/db.php');
if(isset($_POST['login']))
{
$ret=mysqli_query($conn,"SELECT * FROM borrowers WHERE email='".$_POST['email']."' and password='".md5($_POST['password'])."'");
$num=mysqli_fetch_array($ret);
if($num>0)
{

$_SESSION['id']=$num['id'];
$_SESSION['email']=$num['email'];
header("location:home.php");
ob_end_flush();
}
else
{
echo "<script>alert('Invalid username or password');</script>";
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
    <link
        href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/index.css">
    <title>SunPaid</title>
</head>

<body>
    <div class="loginUI">
        <section class="headTitle">
            <h1>AutoFixpert</h1>
            <p>AutoFixpert is  the Solution</p>
        </section>
        <main class="signBtn">
            <h2>Log In</h2>
            <form method="post" >
                <label>
                    <span>Email:</span>
                    <div class="inputHolder">
                        <input type="email" placeholder="Input your Email" name="email" />
                        <i class="icon fa-regular fa-envelope"></i>
                    </div>
                </label>


                <label>
                    <span>Password:</span>
                    <div class="inputHolder">
                        <input type="password" placeholder="Input your Password" name="password" />
                        <i class="icon fa-solid fa-key"></i>
                    </div>
                </label>

                <button type="submit" name="login">LOG IN </button>

            </form>
            <p class="signUp">Don't have an account? Create <a href="./signUp.php"
                    class="signUpLink">account</a></p>
        </main>
    </div>
</body>

</html>