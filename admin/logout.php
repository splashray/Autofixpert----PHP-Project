<?php
ob_start();

session_start();

unset($_SESSION['id']) ;
unset($_SESSION['user']);

session_destroy();
header("Location: ./index.php");
ob_end_flush();

exit(0);


?>