<?php
ob_start();

session_start();

unset($_SESSION['id']) ;
unset($_SESSION['email']);

session_destroy();
header("Location: sign-in.php");
ob_end_flush();

exit(0);


?>