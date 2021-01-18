<?php

include 'connection.php';
if ( !empty($_POST['DeptName']) && !empty($_POST['DeptNo']) && !empty($_POST['CourseType'])) {
    $name = $_POST['DeptName'];
    $dno = $_POST['DeptNo'];
    $courseType = $_POST['CourseType'];
   
} else {
    header("Location:department.php");
   // die();
}




$sql="insert into department values  ($dno,'$name','$courseType')";


$ret = pg_query($db, $sql);
if(!$ret) {
   echo pg_last_error($db);
} else {

        header("Location:department.php");
    
  
}


pg_close($db);

?>