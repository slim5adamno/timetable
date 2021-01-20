<?php
include 'connection.php';

if($_GET['course_id'])
{
    $id=$_GET['course_id'];

}
else{
    die();
}

$sql="delete from course where cno=$id";

$ret = pg_query($db, $sql);
if(!$ret) {
    echo pg_last_error($db);
} else {


    header("Location:addcourse.php");

}

pg_close($db);
?>