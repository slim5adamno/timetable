<?php

include 'connection.php';
error_reporting(0);
if ( !empty($_POST['DeptName']) && !empty($_POST['DeptNo']) && !empty($_POST['CourseType'])&& !empty($_POST['StreamType'])) {
    $name = $_POST['DeptName'];
    $dno = $_POST['DeptNo'];
    $courseType = $_POST['CourseType'];
    $streamType = $_POST['StreamType'];
   
} else {
    header("Location:department.php");
   // die();
}




$sql="insert into department values  ($dno,'$name','$courseType','$streamType')";


$ret = pg_query($db, $sql);
if(!$ret) {
    header("Location:department.php");
   //echo pg_last_error($db);
} else {

        header("Location:department.php");
    
  
}


pg_close($db);

?>