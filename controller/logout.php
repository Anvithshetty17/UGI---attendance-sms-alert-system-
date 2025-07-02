<?php
 include '../config.php';
 $admin = new Admin;

 session_destroy();
 unset($_SESSION['t_id']);

 echo "<script>alert('Logout successful.see you next time !');window.location='../index.html';</script>";


?>
<?php

 session_destroy();
 unset($_SESSION['st_id']);

 echo "<script>alert('Logout successful.see you next time !');window.location='../index.html';</script>";


?>
<?php

 session_destroy();
 unset($_SESSION['a_no']);

 echo "<script>alert('Logout successful.see you next time !');window.location='../index.html';</script>";


?>