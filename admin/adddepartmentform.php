<?php

include 'connection.php';
if (isset($_POST['DeptName']) && isset($_POST['DeptNo'])) {
    $name = $_POST['DeptName'];
    $dno = $_POST['DeptNo'];
   
} else {

    die();
}




$sql="insert into department values  ($dno,'$name')";


$ret = pg_query($db, $sql);
if(!$ret) {
   echo pg_last_error($db);
} else {
    
       
        header("Location:department.php");
    
  
}


pg_close($db);

?>