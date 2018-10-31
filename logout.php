<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   unset($_SESSION["data"]);
   
   echo 'You\'ll be redirected in about 5 secs. If not, click <a href="wherever.php">here</a>.';
   header('Refresh: 2; URL = login.php');
?>