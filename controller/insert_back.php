
<?php
    include '../config.php';
    $admin = new Admin;

    if(isset($_POST['addstudent'])){
        $id=$_POST['id'];
        $name=$_POST['name'];
        $course=$_POST['course'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $password=$_POST['password'];
       
      

        $stmt=$admin->cud("INSERT INTO `students`(`st_id`, `st_name`, `st_dept`, `st_phone`, `st_email`, `password`) VALUES ('$id','$name','$course','$phone','$email','$password')","add");
    
        echo "<script>alert('Record saved successfully.');window.location='../dashboard/HOD_main.php';</script>";

    }


?>
<?php
   

    if(isset($_POST['addteacher'])){
        $name=$_POST['name'];
        $phone=$_POST['phone'];
        $course=$_POST['course'];
        $subject=$_POST['subject'];
        $password=$_POST['password'];
        $stmt=$admin->cud("INSERT INTO `teacher`(`t_name`, `t_phone`, `course`, `t_sub`, `password`) VALUES ('$name','$phone','$course','$subject','$password')","add");
    
        echo "<script>alert('Record saved successfully.');window.location='../dashboard/HOD_main.php';</script>";

    }


?>




<?php
    
    if(isset($_POST['addcourse'])){
        $name=$_POST['name'];
     
         

        $stmt=$admin->cud("INSERT INTO `course`(`c_name`) VALUES ('$name')","add");
    
        echo "<script>alert('Record saved successfully.');window.location='../dashboard/HOD_main.php';</script>";

    }


?>
<?php

    if(isset($_POST['addsubject'])){
        $subcode=$_POST['subcode'];
        $name=$_POST['name'];
        $course=$_POST['course'];


         

        $stmt=$admin->cud("INSERT INTO `subject`( `sub_code`,`sub_name`, `course`) VALUES ('$subcode','$name','$course')","add");
    
        echo "<script>alert('Record saved successfully.');window.location='../dashboard/HOD_main.php';</script>";
       
    }


?>
<?php
if(isset($_POST['loginteacher'])){
    
    $teacherid=$_POST['teacherid'];
    $password=$_POST['password'];
   
    $stmt=$admin->ret("SELECT * FROM `teacher` WHERE `t_id`='$teacherid' and `password`='$password'");
  
    $num=$stmt->rowCount();
    if($num>0){
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['t_id']=$row['t_id'];
            echo "<script>alert('Login successful !. Welcome {$row['t_name']}.');window.location='../attendance.php';</script> ";
    }
    else{
            echo"<script>alert('login unsuccessful !.');window.location='../index.html';</script> ";
        
    }
}
?>
<?php
if(isset($_POST['loginadmin'])){
    
    $adminid=$_POST['adminid'];
    $password=$_POST['password'];
   
    $stmt=$admin->ret("SELECT * FROM `admin` WHERE `a_no`='$adminid' and `a_password`='$password'");
  
    $num=$stmt->rowCount();
    if($num>0){
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['a_no']=$row['a_no'];
            echo "<script>alert('Login successful !. Welcome {$row['a_name']}.');window.location='../dashboard/HOD_main.php';</script> ";
    }
    else{
            echo"<script>alert('login unsuccessful !.');window.location='../index.html';</script> ";
        
    }
}
?>
<?php
if(isset($_POST['loginstudent'])){
    
    $studentid=$_POST['studentid'];
    $password=$_POST['password'];
   
    $stmt=$admin->ret("SELECT * FROM `students` WHERE `st_id`='$studentid' and `password`='$password'");
  
    $num=$stmt->rowCount();
    if($num>0){
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['st_id']=$row['st_id'];
            echo "<script>alert('Login successful !. Welcome {$row['st_name']}.');window.location='../dashboard/student_dash.php';</script> ";
    }
    else{
            echo"<script>alert('login unsuccessful !');window.location='../index.html';</script> ";
        
    }
}
?>