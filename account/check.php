<?php
include '../admin/functions.php';

connect_db();
check_db();

session_start();
$user_check=$_SESSION['username'];

$ses_sql = "SELECT username FROM pot_users WHERE username='$user_check' ";

$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_user=$row['username'];

if(!isset($user_check))
{
header("Location: index.php");
}
?>