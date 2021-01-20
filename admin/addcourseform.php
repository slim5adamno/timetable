<?php

include 'connection.php';

if ( !empty($_POST['CourseType']) && !empty($_POST['DeptName']) && !empty($_POST['CourseNo'])&& !empty($_POST['CourseName'])) {
    $courseName = $_POST['CourseName'];
    $courseNo = $_POST['CourseNo'];
    $courseType = $_POST['CourseType'];
    $deptName = $_POST['DeptName'];

} else {
    //header("Location:addcourse.php");
     die();
}

$did=0;
$sql = pg_query($db,"select did from department where name='$deptName'");
if(!$sql){
    echo pg_last_error($sql);
}
else {
    $did = pg_fetch_row($sql);
}

$sql1 = "insert into course values  ($courseNo,'$courseName','$courseType',$did[0])";
$ret = pg_query($db, $sql1);
if (!$ret) {
    header("Location:addcourse.php");
    //echo pg_last_error($db);
} else {

        header("Location:addcourse.php");


}


pg_close($db);

?>