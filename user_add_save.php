<?php
include ('page_header.php');
include_once('db_inc.php');

session_start();
$userid=$_POST['userid'];
$username=$_POST['username'];
$userpassword=$_POST['userpassword'];
$usersyubetu=$_POST['usersyubetu'];

$sql = "INSERT INTO tb_user VALUES('$userid','$username','$userpassword','$usersyubetu')";
$rs = mysql_query($sql,$conn);


if(!$rs){
     die('エラー:' . mysql_error());
     }else{
     	echo'<h2>ユーザID:'. $userid . ' </h2>';
     	echo'<h2>ユーザネーム:'. $username . ' </h2>';
     	echo'<h2>ユーザパスワード:'. $userpassword . ' </h2>';
     	echo'<h2>ユーザ種別:'. $usersyubetu . ' </h2>';
     }













include ('page_footer.php');
?>