<?php

include 'connection.php';
if (isset($_POST['SC']) && isset($_POST['SN']) && isset($_POST['TNAME']) &&  isset($_POST['SEM']) && isset($_POST['COURSE']) && isset($_POST['STYPE'])) {
    $sname = $_POST['SN'];
    $subcode = $_POST['SC'];
    $sem = $_POST['SEM'];
    $course = $_POST['COURSE'];
    $stype = $_POST['STYPE'];
    $teacher_name = $_POST['TNAME'];
  
} else {

    die();
}


  
$sql="select did from department where name='$department'"; 


$ret = pg_query($db, $sql);
if(!$ret) {
   echo pg_last_error($db);
} else {
    $id =pg_fetch_row($ret);
  
}


$sql="insert into subjects values  ('$subcode','$sname','$sem',$id[0],'$stype')";



$ret = pg_query($db, $sql);
if(!$ret) {
   echo pg_last_error($db);
} else {
    
       
        header("Location:course.php");
    
  
}


pg_close($db);

?>