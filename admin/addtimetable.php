<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'connection.php';
if (isset($_POST['SN']) && isset($_POST['TN']) && isset($_POST['CR']) && isset($_POST['TS'])) {
    $sname = $_POST['SN'];
    $tname = $_POST['TN'];
	$class= $_POST['CR'];
	$timeslot=$_POST['TS'];
	$day= $_SESSION['day'];
	$dept=$_SESSION['dept'];
	$sem=$_SESSION['sem'];
	$stype=$_SESSION['stype'];

	echo"Connected";
} else {

    echo "Disconnected";

}

$sq= "select sid from subjects where sname='$sname' and stype='$stype'";
$tq="select tid from teacher where name='$tname'";
$dq="select did from department where name='$dept'";
$sr=pg_query($db,$sq);
$tr=pg_query($db,$tq);
$dr=pg_query($db,$dq);
$sid = pg_fetch_row($sr);
$tid = pg_fetch_row($tr);
$did = pg_fetch_row($dr);
echo "Subject id is ".$sid[0];
echo "Teacher id is ".$tid[0];
$sql="insert into allot values ($did[0],'$sem',$sid[0],$tid[0],'$class','$timeslot','$day')";



$ret = pg_query($db, $sql);
if(!$ret) {
   echo pg_last_error($db);
} else {
    
       
		header("Location:gen-time-table.php");
}


pg_close($db);

?>