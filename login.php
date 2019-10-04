<?php
session_start();
// if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
//  header("location: welcome.php");
//  exit;
// }
require_once "config.php";
$username     = $password = "";
$username_err = $password_err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if (empty(trim($_POST["username"]))) {
  $username_err = "Please enter username.";
 } else {
  $username = trim($_POST["username"]);
 }
 if (empty(trim($_POST["password"]))) {
  $password_err = "Please enter your password.";
 } else {
  $password = trim($_POST["password"]);
 }
 if (empty($username_err) && empty($password_err)) {
  $sql    = "SELECT * FROM members WHERE uname = '$username' AND pwd = '$password' LIMIT 1";
  $result = mysqli_query($link, $sql);
  $count  = mysqli_num_rows($result);
  echo $count;
  if ($count > 0) {
   $row = mysqli_fetch_array($result, $count);
   echo 1;
   session_start();
   $_SESSION["loggedin"] = true;
   $_SESSION["id"]       = $row['id'];
   $_SESSION["username"] = $row['uname'];
   ;
   header("location: courserecords.php");
  } else {
   $password_err = "The password you entered was not valid.";
  }
  mysqli_close($link);
 }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body><br>
<br>
<br>
<br>
    <div class="container" style="padding: 90 90 90 90;">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p><br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group col-lg-4 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <!-- value="<?php echo $sernae; ?>" -->
                <input type="text" name="username" class="form-control" value="user1" >
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group col-lg-4 <?php echo (!empty($password_err)) ? 'has-error' : '';?>">
                <label>Password</label>
                <input type="password " name="password" class="form-control" value="pwd1">
                <span class="help-block"><?php echo $password_err;?></span>
            </div><br>
            <div class="form-group" style="padding-top:5px;">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>    
</body>
</html>