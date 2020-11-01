<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon"  type="image/x-icon" href="img/favicon-01.png" />
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <title>Wolfz</title>
</head>
<body>

<div class="login-form">
        <div class="main-div">
            <form method="POST" action="#">
                <h1>LOGIN</h1>               
                <div class="container">                    
                    <input type="text" placeholder="username" name="username" class="form-control"  required>                   
                    <input type="password" placeholder="password" name="password" class="form-control" required>                    
                    <button type="submit" class="btn btn-primary" name="submit">login</button>
                </div>                
            </form>
        </div>
    </div>

</body>
</html>

<?php
 require "config.php";
 require "models/user.php";

 session_start();

 if(isset($_POST['username']) && isset($_POST['password'])) {

    $rs = User::logIn($_POST['password'], $_POST['username'],$conn);

      if($rs->num_rows==1) {
          echo "You have successfully logged on.";
          $_SESSION['user_id'] = $rs->fetch_assoc()['id'];
          header('Location: home.php');
          exit();
      } else {
          echo '<script type="text/javascript">alert("The credentials you entered are wrong."); 
            window.location.href = "http://localhost/iteh-domaci/index.php";</script>';
          exit();
      }
 }
?>