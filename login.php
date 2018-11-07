<?php
   ob_start();
   session_start();
?>



<html lang = "en">
   
   <head>
      <title>Login</title>
      
      
      <link rel="stylesheet" href="style.css">
      
   </head>
	
   <body>
   <span class="loggedAs">
    <?php if(isset($_SESSION['username'])) echo "Jesteś zalogowany jako: ".$_SESSION['username']; ?>
</span>
      <h2>Enter Username and Password</h2> 
      <div class = "container form-signin">
         
         <?php
            $msg = '';
            if(!isset($_SESSION['username'])){
            if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
                //$conn = new mysqli("localhost", 'root', '', "projektphp");
                try{
                //$conn = new mysqli("localhost", 'hkalinowski', 'hkalinowski', "hkalinowski");
                $conn = new mysqli("localhost", 'root', '', "hkalinowski");
                }
                catch(exeption $e){
                    $conn = new mysqli("localhost", 'root', '', "hkalinowski");
                }
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 
                $sql = "SELECT username, password FROM users WHERE username='{$_POST['username']}'&&password='{$_POST['password']}'";
                $result = $conn->query($sql);

                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = $row['username'];
                  $_SESSION["data"]=[];
                  echo 'You have entered valid use name and password';
                    }
                 else {
                    $msg = 'Wrong username or password';
                }
                $conn->close();
            }
        }else{
            $msg="Użytkownik jest zalogowany";
        }
            
         ?>
      </div> <!-- /container -->
      
      <div class = "container">
      
         <form class = "form-signin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            <input type = "text" class = "form-control" 
               name = "username" placeholder = "username" 
               required autofocus><br/>
            <input type = "password" class = "form-control"
               name = "password" placeholder = "password" required>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "login">Login</button>
         </form>
			
         Click here to clean <a href = "logout.php" tite = "Logout">Session.
         
      </div> 
      
   </body>
</html>