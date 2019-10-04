<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once "config.php";
$CourseName   = "";
$courseCode =  "";
$createdBy = "";
$dateValue = date('Y-m-d');;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if (empty(trim($_POST["courseName"]))) {
  $courseName_err = "Please enter courseName.";
 } else {
  $_SESSION["courseName"] = $CourseName = trim($_POST["courseName"]);
 }
 if (empty(trim($_POST["courseCode"]))) {
  $courseCode_err = "Please enter your courseCode.";
 } else {
  $_SESSION["courseCode"] =  $courseCode = trim($_POST["courseCode"]);
 }
 if (empty(trim($_POST["createdBy"]))) {
 } else {
  $createdBy = trim($_POST["createdBy"]);
 }
 if (empty(trim($_POST["dateValue"]))) {
  $dateValue_err = "Please select a Valid Date.";
 } else {
  // $dateValue = trim($_POST[" dateValue"]);
  $dateValue = date('Y-m-d', strtotime($_POST['dateValue']));
 }



  $check_for_newRecord_sql = "select CourseName from coursedetails where CourseName='$CourseName'";
  $result = mysqli_query($link, $check_for_newRecord_sql );
  if(mysqli_num_rows($result)>0) {
    // that means the courseCode already exist
    // hence run update query
    $oldrecordupdate_sql = "update coursedetails SET CourseName = '$CourseName', courseCode = '$courseCode', createdBy = '$createdBy', timeStamp = '$dateValue' where  CourseName='$CourseName'";
    $flag = mysqli_query($link, $oldrecordupdate_sql);
    
    // update in the courseganttchart table also
    if(!$flag) echo mysqli_error();
  } else {
    // Insert the new course details
  $newrecord_sql = "INSERT INTO coursedetails (`CourseName`, `courseCode`, `createdBy`, `timeStamp` ) values ('$CourseName', '$courseCode', '$createdBy', '$dateValue')";
  $flag = mysqli_query($link, $newrecord_sql);

  // // insert in the courseganttchart table also

  if(!$flag) echo @mysqli_error();
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
<br>
<br>
<br>
<br>
<br>  
<div class="container" style="padding: 80 80 80 80;">
<div class="page-header" style="display:inline;">
    <h4><b style="font-size:33px;">Please enter your course details.
    </b>
    </h4><a style="float:right;" href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    <br>
<br>
<br>  
</div>
<form action="#" onsubmit="alert('Record Successful.');" class="form-group" method="POST">
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="input-group col-lg-8 col-md-8">
  <div class="input-group-prepend">
    <span class="input-group-text">Course Code</span>
  <input type="text" placeholder="Enter course code" name="courseCode" class="form-control" id="coursecodeentry"  value="<?php echo @$_SESSION["courseCode"]; ?>">
  </div>
</div><br>
<div class="input-group  col-lg-8 col-md-8">
  <div class="input-group-prepend">
    <span class="input-group-text">Course Name</span>
  <input type="text" placeholder="Enter course name" name="courseName" class="form-control" id="coursenameentry" value="<?php echo @$_SESSION["courseName"]; ?>">
  </div>
</div><br>
<div class="input-group  col-lg-8 col-md-8">
  <div class="input-group-prepend">
    <span class="input-group-text">  Created By</span>
  <input type="text" name="createdBy" class="form-control" id="" value=" <?php echo htmlspecialchars($_SESSION["username"]); ?>">
  </div>
</div>
</div>

<div class="col-lg-6 col-md-6">
<div class="">
        <div class="row">
        <div class="">Modify Date (yyyy-mm-dd):
        <input id="datepicker" style="margin-top:5px;" class="input-group date form-control"  placeholder="Select course entry date" name="dateValue" value="<?php echo date('Y-m-d'); ?>" />
        </div>
</div>
</div>
</div>
</div><br><br>
<button type="submit" onClick="return empty()" class="btn btn-primary">Submit</button>
</form>
<button class="btn btn-success" onclick="location.href = 'main.php'">Proceed</button>
</div>
<script>
        // $('#datepicker').datepicker({
        //     uiLibrary: 'bootstrap',
        //     format: 'mm/dd/yyyy',
        //     startDate: '-3d',
        //     beforeShowYear: '2019'
        // });

        function empty() {
            var x;
            x = document.getElementById("coursecodeentry").value;
            if (x == "") {
                alert("Please enter a vaild code");
                return false;
            };

            var y;
            y = document.getElementById("coursenameentry").value;
            if (y == "") {
                alert("Please enter a valid module name");
                return false;
            };
        }
</script> 
</body>
</html>