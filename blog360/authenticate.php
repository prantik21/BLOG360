<?php
session_start();
$con = mysqli_connect("localhost","root","","blog360");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


  if($_REQUEST['action']=='login'){
    $email=$_REQUEST['email'];
    $pass=$_REQUEST['pass'];

    $query = "SELECT * FROM `users` WHERE email='$email' and password='".md5($pass)."'";
    $result = mysqli_query($con,$query);
    $rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['email'] = $email;
      setcookie("login","1",time()+86400*15);
            // Redirect user to index.php
            header("Location: admin/dashboard.php");
         }else{
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login Again</a></div>";
	}


  }
  elseif($_REQUEST['action']=='register'){

    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $pass=$_REQUEST['pass'];


    $query = "INSERT INTO users(name, email, password)
    VALUES ('$name','$email','".md5($pass)."')";
            $result = mysqli_query($con,$query);
            if($result){
                echo "<div class='form'>
    <h3>You are registered successfully.</h3>
    <br/>Click here to <a href='index.php'>Home</a></div>";
            }





  }else{

  }

