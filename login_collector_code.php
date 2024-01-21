<?php
session_start();
$con = mysqli_connect('localhost','root','','gec-project');
$username=$_POST['username'];
$password=$_POST['password'];

$query1 = "select * from collector where username= '$username' && password= '$password'";
$result = mysqli_query($con, $query1);
$row=mysqli_fetch_array($result);

$n = mysqli_num_rows($result);

if($n == 1)
{
    $_SESSION['username'] = $row['username'];
    header("Location:Admin.php");
}
else{
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Invalid Credentials');
    window.location.href='login_collector.php';
    </script>");
    }
?>