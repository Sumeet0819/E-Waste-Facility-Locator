<?php
{    
    $name=$_POST['name'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['password'];

    $conn = new mysqli('localhost','root','','gec-project');
    if($conn -> connect_error)
    {
        die('connection is failed : '.$conn -> connect_error);
    }
    else
    {
        $query ="SELECT username FROM collector WHERE username='$username'";
        $resulttt=mysqli_query($conn,$query);
        if(mysqli_num_rows($resulttt) !=0)
        {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('User already register');
                window.location.href='individual.php';
                </script>");
        }    
        else{
            $queryy ="SELECT email FROM collector WHERE email='$email'";
            $resultttt=mysqli_query($conn,$queryy);
            if(mysqli_num_rows($resultttt) !=0)
            {
                echo("<script LANGUAGE='JavaScript'>
                window.alert('email already register');
                window.location.href='pages-register.php';
                </script>");
            }
    else
        {
            $sql ="insert into collector(name, password, email, username)
            values('$name', '$password', '$email', '$username')";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
                header("Location:pages-login.php");
            }
            else
            {
                die(mysqli_error($conn));
            }
        }
    }
    }
}
?>