<?php
include('./includes/db.php');

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



$service = mysqli_real_escape_string($conn, $service);
$request = mysqli_real_escape_string($conn, $request);
$name = mysqli_real_escape_string($conn, $name);
$vnum = mysqli_real_escape_string($conn, $vnum);
$email = mysqli_real_escape_string($conn, $email);
$phone = mysqli_real_escape_string($conn, $phone);
$date = mysqli_real_escape_string($conn, $date);
$time = mysqli_real_escape_string($conn, $time);


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

   
                $msg  = "INSERT into appointment(request_ref,services,request_type,name,vehicle_num,email,phone,date,time) ";
                $msg .="VALUES('$ref_no','$service','$request','$name','$vnum','$email','$phone','$date','$time') ";

                 $order_query = mysqli_query($conn,$msg);
                 if(!$order_query){
                     die("Query Failed". mysqli_error($conn));
                 }
                
            if($order_query)
            {
                echo "<script>alert('Request successfully Booked');</script>";
                echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
            }
        
}
    
    
     
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/index.css">
    <title>Autofixpert</title>
    <link rel="icon" type="image/x-icon" href="./images/THE AUTO FIXPERT.svg">
</head>

<body>

    <!-- SCROLL TO TOP ELEMENT -->
    <div id="scroll">
        <i class="fa-solid fa-arrow-alt-circle-up"></i>
    </div>

    <!-- HERO CONTENT -->

    <div id="container" class="container">
        <!-- DONT TOUCH -->
        <div class="custom-shape-divider-bottom-1650229515">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path d="M1200 120L0 16.48 0 0 1200 0 1200 120z" class="shape-fill"></path>
            </svg>
        </div>
        <!-- DONT TOUCH ABOVE -->

        <!-- NAVIGATION -->
        <nav id="nav">
            <p><img style="width: 10%; height: 10%; background-color: white; border-radius: 10px;"
                    src="./images/THE AUTO FIXPERT.svg" alt=""> Auto<span>Fixpert</span></p>
            <div>
                <section id="navTargets">
                    <a href="#autofix">AutoFix</a>
                    <a href="#services">Services</a>
                    <a href="#request">Request</a>
                    <a href="#footer">About</a>
                </section>
                <a href="./sign-in.php" target="_blank">SignIn</a>
                <a href="./sign-up.php" target="_blank">SignUp</a>
                <span id="dropdown"><i class="fa-solid fa-bars-staggered"></i></span>
            </div>
        </nav>
        <div class="hero">
            <h3>We care about your car</h3>
            <h1><span><span style="color: white;">Auto</span>Fixpert</span> is the solution</h1>
            <a href="#request"><i class="fa-solid fa-paper-plane"></i> Send Request</a>
        </div>
    </div>

    <!-- WELCOME CONTENT -->

    <div id="autofix" class="welcome">
        <div class="img"></div>
        <div class="welcomeText">
            <h4 style="color: goldenrod;">WELCOME TO AUTOFIXPERT</h4>
            <div class="textContent">
                <h2>We set trends by giving our clients vehicles the best experience as it can get.</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt natus exercitationem consequatur
                    cupiditate? Sapiente impedit obcaecati adipisci, sed fugiat suscipit doloribus neque voluptas vitae
                    consequuntur, deserunt modi quidem illum explicabo?
                </p>
                <!-- OBJECTIVES -->
                <div class="bio">
                    <div id="bio1" class="bioHead active">Our Mission</div>
                    <div id="bio2" class="bioHead ">Our Vision</div>
                    <div id="bio3" class="bioHead ">Our Value</div>
                </div>
                <p id="bioText1" class="bioText activeText">Our Mission dolor sit amet consectetur adipisicing elit.
                    Sunt natus exercitationem consequatur
                    cupiditate? Sapiente impedit obcaecati adipisci, sed fugiat suscipit doloribus neque voluptas vitae
                    consequuntur, deserunt modi quidem illum explicabo?
                </p>
                <p id="bioText2" class="bioText">Our Vision dolor sit amet consectetur adipisicing elit. Sunt natus
                    exercitationem consequatur
                    cupiditate? Sapiente impedit obcaecati adipisci, sed fugiat suscipit doloribus neque voluptas vitae
                    consequuntur, deserunt modi quidem illum explicabo?
                </p>
                <p id="bioText3" class="bioText">Our Value dolor sit amet consectetur adipisicing elit. Sunt natus
                    exercitationem consequatur
                    cupiditate? Sapiente impedit obcaecati adipisci, sed fugiat suscipit doloribus neque voluptas vitae
                    consequuntur, deserunt modi quidem illum explicabo?
                </p>
            </div>
        </div>
    </div>

    <!-- SERVICES CONTENT -->

    <div id="services" class="services">
        <h2>Our Services</h2>
        <div class="servicesCard">
            <div>
                <i class="fa-solid fa-oil-can"></i>
                <section>
                    <h3>Oil Change</h3>
                    <p>them to change their dark, dirty oil and get rid of any Oil Smell Inside the Car
                    We help our clients to Buy the Right Oil and get the best Oil Filter for their vehicle.</p>
                </section>
            </div>
            <div>
                <i class="fa-solid fa-car-battery"></i>
                <section>
                    <h3>Vehicle Batteries</h3>
                    <p>We help our clients to Buy the Right Oil and get the best Oil Filter for their vehicle. We help
                        them to change their dark, dirty oil and get rid of any Oil Smell Inside the Car</p>
                </section>
            </div>
            <div>
                <i class="fa-solid fa-truck-pickup"></i>
                <section>
                    <h3>Tow Truck</h3>
                    <p>We help our clients to Buy the Right Oil and get the best Oil Filter for their vehicle. We help
                        them to change their dark, dirty oil and get rid of any Oil Smell Inside the Car</p>
                </section>
            </div>
            <div>
                <i class="fa-solid fa-ring"></i>
                <section>
                    <h3>Tyre Change</h3>
                    <p>We help our clients to Buy the Right Oil and get the best Oil Filter for their vehicle. We help
                        them to change their dark, dirty oil and get rid of any Oil Smell Inside the Car</p>
                </section>
            </div>
            <div>
                <i class="fa-solid fa-gears"></i>
                <section>
                    <h3>Engine Repair</h3>
                    <p>We help our clients to Buy the Right Oil and get the best Oil Filter for their vehicle. We help
                        them to change their dark, dirty oil and get rid of any Oil Smell Inside the Car</p>
                </section>
            </div>
            <div>
                <i class="fa-solid fa-fill-drip"></i>
                <section>
                    <h3>Car Maintenance</h3>
                    <p>We help our clients to Buy the Right Oil and get the best Oil Filter for their vehicle. We help
                        them to change their dark, dirty oil and get rid of any Oil Smell Inside the Car</p>
                </section>
            </div>
        </div>

    </div>

    <!-- REQUEST FORM -->

    <div id="request" class="request">
        <div class="requestDetails">
            <div>
                <h2>Book a Service Request</h2>
                <h4 style="text-transform: uppercase;">Competent and Professional Mechanical Engineers Available</h4>
            </div>
            <form action="" method="post">
                <div>

                   

                    <select name="optservices" required />
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

                    <select name="optrequest" id="">
                        <option value="">Select request type</option>
                        <option value="pick-up">Pick Up</option>
                        <option value="drop-off">Drop Off</option>
                    </select>
                </div>

                <div>
                    <label>
                        <input type="text" name="name" id="" placeholder="Your Name" required>
                    </label>
                    <label>
                        <input type="text" name="vnum" id="" placeholder="Vehicle Number" required>
                    </label>
                </div>
                <div>
                    <label>
                        <input type="email" name="email" id="" placeholder="Your Email" required>
                    </label>
                    <label>
                        <input type="tel" name="phone" id="" placeholder="Contact No." required>
                    </label>
                </div>
                <div>
                    <label>
                        <sub style="text-align: left;">Date</sub>
                        <input type="date" name="date" id="" required>
                    </label>
                    <label>
                        <sub>Time</sub>
                        <input type="time" name="time" id="" required>
                    </label>
                </div>
                <button type="submit" name="submits" >SEND REQUEST</button>
            </form>
        </div>
    </div>

    <!-- FOOTER SECTION -->

    <footer id="footer" style="color: white; padding: 2%;">
        <div class="company">
            <h2>Auto<span style="color: goldenrod;">Fixpert</span></h2>
            <small>We are company driven towards our client satisfaction.</small>
        </div>
        <div class="services">
            <h3>Services</h3>
            <small><a href="#services"><i class="fa-brands fa-servicestack"></i> Oil Change</a></small>
            <small><a href="#services"><i class="fa-brands fa-servicestack"></i> Vehicle Batteries</a></small>
            <small><a href="#services"><i class="fa-brands fa-servicestack"></i> Tow Truck</a></small>
            <small><a href="#services"><i class="fa-brands fa-servicestack"></i> Tyre Change</a></small>
            <small><a href="#services"><i class="fa-brands fa-servicestack"></i> Engine Repair</a></small>
            <small><a href="#services"><i class="fa-brands fa-servicestack"></i> Car Maintenance</a></small>
        </div>
        <div class="contact">
            <h3>Contact Info</h3>
            <small><i class="fa-solid fa-location-dot"></i> Kwara State Polytechnic</small>
            <small><a href="mailto:info@autofixpert.com.ng"><i class="fa-solid fa-at"></i>info@autofixpert.com.ng</a></small>
            <small><a href="tel:+2349012345678"><i class="fa-solid fa-phone"></i> +2349012345678</a></small>
        </div>
        <div class="openingDays">
            <h3>Business Hours</h3>
            <h4><i style="color: goldenrod;" class="fa-solid fa-calendar-week"></i> OPENING HOURS</h4>
            <small>Monday - Friday: 8am to 8pm</small>
            <small>Weekends: 9am to 6pm</small>
        </div>
    </footer>

    <script src="./js/index.js"></script>
</body>

</html>