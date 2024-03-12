<?php
session_start();
setcookie("login","",time()-1);
// Destroying All Sessions
if(session_destroy())
{
// Redirecting To Home Page
header("Location: login.php");
}
?>