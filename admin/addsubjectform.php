<?php

include 'connection.php';
if (isset($_POST['SC']) && isset($_POST['SN']) && isset($_POST['TNAME']) &&  isset($_POST['SEM']) && isset($_POST['COURSE']) && isset($_POST['STYPE'])) {
    $sname =strtoupper($_POST['SN']);
    $subcode = $_POST['SC'];
    $sem =strtoupper($_POST['SEM']);
    $course =strtoupper($_POST['COURSE']);
    $stype = strtoupper($_POST['STYPE']);
    $teacher_name =strtoupper($_POST['TNAME']);
  
} else {

    die();
}


  
$sql="select tid from teacher where name='$teacher_name'";


$ret = pg_query($db, $sql);
if(!$ret) {
   echo pg_last_error($db);
} else {
    $id =pg_fetch_row($ret);
  
}


$sql="insert into subjects values  ('$subcode','$sname','$sem','$stype',$id[0])";



$ret = pg_query($db, $sql);
if(!$ret) {
   echo pg_last_error($db);
} else {
    
       
        header("Location:course.php");
    
  
}


pg_close($db);

?>