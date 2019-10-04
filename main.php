<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Monitor</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
body{
    background: beige;
}
.bar { }

.p1 { background: #381; font-weight:bolder; color:white;margin: 0px -4px; }
.p2 { background: #662; font-weight:bolder; color:white;margin: 0px -4px; }
.p3 { background: #943; font-weight:bolder; color:white;margin: 0px -4px; }
.p4 { background: #224; font-weight:bolder; color:white;margin: 0px -4px; }
.p5 { background: #505; font-weight:bolder; color:white;margin: 0px -4px; }
.p6 { background: #886; font-weight:bolder; color:white;margin: 0px -4px; }
.p7 { background: #167; font-weight:bolder; color:white;margin: 0px -4px; }
.p8 { background: #448; font-weight:bolder; color:white;margin: 0px -4px; }
.p9 { background: #729; font-weight:bolder; color:white;margin: 0px -4px; }

.ap1 { background: #381; font-weight:bolder; color:white;margin: 0px -4px; }
.ap2 { background: #662; font-weight:bolder; color:white;margin: 0px -4px; }
.ap3 { background: #943; font-weight:bolder; color:white;margin: 0px -4px; }
.ap4 { background: #224; font-weight:bolder; color:white;margin: 0px -4px; }
.ap5 { background: #505; font-weight:bolder; color:white;margin: 0px -4px; }
.ap6 { background: #886; font-weight:bolder; color:white;margin: 0px -4px; }
.ap7 { background: #167; font-weight:bolder; color:white;margin: 0px -4px; }
.ap8 { background: #448; font-weight:bolder; color:white;margin: 0px -4px; }
.ap9 { background: #729; font-weight:bolder; color:white;margin: 0px -4px; }

.del1 { background: #FF0000; font-weight:bolder; color:white; }
.del2 { background: #FF0000; font-weight:bolder; color:white; }
.del3 { background: #FF0000; font-weight:bolder; color:white; }
.del4 { background: #FF0000; font-weight:bolder; color:white; }
.del5 { background: #FF0000; font-weight:bolder; color:white; }
.del6 { background: #FF0000; font-weight:bolder; color:white; }
.del7 { background: #FF0000; font-weight:bolder; color:white; }
.del8 { background: #FF0000; font-weight:bolder; color:white; }
.del9 { background: #FF0000; font-weight:bolder; color:white; }

#display1, #display2, #display3 { 
  visibility:hidden;
 }

</style>
</head>
<body>
<div class="container" style="padding:80 80 80 80;">
<br>
<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once("config.php");

if (@$_SERVER["REQUEST_METHOD"] == "POST") {
$CourseName = $_POST['module'];

// accepting the actual values of the project phases
@$actual1 = $_POST["actual1"];
@$actual2 = $_POST["actual2"];
@$actual3 = $_POST["actual3"];
@$actual4 = $_POST["actual4"];
@$actual5 = $_POST["actual5"];
@$actual6 = $_POST["actual6"];
@$actual7 = $_POST["actual7"];
@$actual8 = $_POST["actual8"];
@$actual9 = $_POST["actual9"];

@$phase1 = $_POST["phase1"];
@$phase2 = $_POST["phase2"];
@$phase3 = $_POST["phase3"];
@$phase4 = $_POST["phase4"];
@$phase5 = $_POST["phase5"];
@$phase6 = $_POST["phase6"];
@$phase7 = $_POST["phase7"];
@$phase8 = $_POST["phase8"];
@$phase9 = $_POST["phase9"];

#######################################################################################################
// Check is this course a new one ?
// if new one then insert else update.
$check_for_newRecord_sql = "select courseName from courseganttchart where CourseName='$CourseName'";
$result = mysqli_query($link, $check_for_newRecord_sql );
if(mysqli_num_rows($result)>0) {
	// that means the courseName already exist
	// hence run update query
	$oldrecordupdate_sql = "update courseganttchart SET phase1 = '$phase1',  phase2 = '$phase2', phase3 = '$phase3', phase4 = '$phase4', phase5 = '$phase5', phase6 = '$phase6', phase7 = '$phase7', phase8 = '$phase8', phase9 = '$phase9', actual1 = '$actual1', actual2 = '$actual2', actual3 = '$actual3', actual4 = '$actual4', actual5 = '$actual5', actual6 = '$actual6', actual7 = '$actual7', actual8 = '$actual8', actual9 = '$actual9' 
    where CourseName='$CourseName' ";
    $flag = mysqli_query($link, $oldrecordupdate_sql);
    if(!$flag) echo mysqli_error();
    $existsbg = 'yellow';
} else {
######################################################################################################
// Insert the new course details
$newrecord_sql = "INSERT INTO courseganttchart (`CourseName`, `phase1`, `phase2`, `phase3`, `phase4`, `phase5`, `phase6`, `phase7`, `phase8`, `phase9`, `actual1`, `actual2`, `actual3`, `actual4`, `actual5`, `actual6`, `actual7`, `actual8`, `actual9` ) values ('$CourseName', '$phase1', '$phase2', '$phase3', '$phase4', '$phase5', '$phase6','$phase7', '$phase8', '$phase9', '$actual1', '$actual2', '$actual3', '$actual4', '$actual5', '$actual6', '$actual7', '$actual8', '$actual9')";

$flag = mysqli_query($link, $newrecord_sql);
if(!$flag) echo mysqli_error();
 $existsbg = 'white';
}


$fetchCoursenames_sql = "select * from courseganttchart where CourseName='$CourseName'";
$resultCourseNames = mysqli_query($link, $fetchCoursenames_sql);

if(mysqli_num_rows($resultCourseNames) > 0) {
$row = mysqli_fetch_array($resultCourseNames);

// for displaying real db data for actual input pox values
$actval1 = $row[2];
$actval2 = $row[4];
$actval3 = $row[6];
$actval4 = $row[8];
$actval5 = $row[10];
$actval6 = $row[12];
$actval7 = $row[14];
$actval8 = $row[16];
$actval9 = $row[16];

$ideal = 4;    // is indicating 4 units for ideal time slot

//  Using @ symbols to supress notices and warnings since our variables are undefined when the form first loads or form is not submitted.

for($i=2; $i<=18; $i=$i+2){  // traversing actual values from the db
    if ($row[$i] > 4) {
        @${delay.$i} = $row[$i] - 4;
        @${act.$i} = $row[$i];
    }elseif ($row[$i] <= 4){
        @${delay.$i} = 0;
        @${act.$i} = $row[$i];
    }
}
}
}
?>
<h4>Welcome <?php echo htmlspecialchars($_SESSION["username"]); ?><button style="float:right;" class="btn btn-danger" onclick="location.href = 'logout.php'">LogOut</button></h4>
<form class ="form-group"action="#"  method="POST">

<div style="display: inline;">
<select class="btn btn-outline-secondary dropdown-toggle" name="module" id="selectmodule">
<option value="" id="selectoptions">Select a module from the list</option>
<?php
require_once("config.php");

$courseName_sql  = "SELECT * FROM coursedetails";
$result = mysqli_query($link, $courseName_sql);
$row=mysqli_fetch_array($result) ;

while($row=mysqli_fetch_array($result)) {
    echo '<option value="'.$row['CourseName'].'">'. $row['CourseName']. '</option>';
}
?> 
</select>
</div><br><br>
<br>
<span id="displayFormCourseName"   class="card-header"><b>Module Name:</b> <?php echo @$CourseName;?></span><br>
<br>
<span style="background-color:<?php echo @$existsbg;?>;">
<input  style="display:inline-block;" class="input-group-text" type="checkbox" value="1" name="phase1" id="yourBox1">Phase1 &nbsp;&nbsp;<input type="text" class="form-control col-lg-3" style="display:inline;" name="actual1" id="yourText1"  value="<?php echo @$actval1;?>"disabled><br>
</span>
<span style="background-color:<?php echo @$existsbg;?>;">
<input  style="display:inline-block;" class="input-group-text" type="checkbox" value="1" name="phase2" id="yourBox2">Phase2 &nbsp;&nbsp;<input type="text" class="form-control col-lg-3" style="display:inline;" name="actual2" id="yourText2"  value="<?php echo @$actval2;?>"disabled><br>
</span>
<span style="background-color:<?php echo @$existsbg;?>;">
<input  style="display:inline-block;" class="input-group-text" type="checkbox" value="1" name="phase3" id="yourBox3">Phase3 &nbsp;&nbsp;<input type="text" class="form-control col-lg-3" style="display:inline;" name="actual3" id="yourText3"  value="<?php echo @$actval3;?>" disabled><br>
</span>
<span style="background-color:<?php echo @$existsbg;?>;">
<input  style="display:inline-block;" class="input-group-text" type="checkbox" value="1" name="phase4" id="yourBox4">Phase4 &nbsp;&nbsp;<input type="text" class="form-control col-lg-3" style="display:inline;" name="actual4" id="yourText4" value="<?php echo @$actval4;?>"disabled><br>
</span>
<span style="background-color:<?php echo @$existsbg;?>;">
<input  style="display:inline-block;" class="input-group-text" type="checkbox" value="1" name="phase5" id="yourBox5">Phase5 &nbsp;&nbsp;<input type="text" class="form-control col-lg-3" style="display:inline;" name="actual5" id="yourText5"  value="<?php echo @$actval5;?>"disabled><br>
</span>
<span style="background-color:<?php echo @$existsbg;?>;">
<input  style="display:inline-block;" class="input-group-text" type="checkbox" value="1" name="phase6" id="yourBox6">Phase6 &nbsp;&nbsp;<input type="text" class="form-control col-lg-3" style="display:inline;" name="actual6" id="yourText6"  value="<?php echo @$actval6;?>"disabled><br>
</span>
<span style="background-color:<?php echo @$existsbg;?>;">
<input  style="display:inline-block;" class="input-group-text" type="checkbox" value="1" name="phase7" id="yourBox7">Phase7 &nbsp;&nbsp;<input type="text" class="form-control col-lg-3" style="display:inline;" name="actual7" id="yourText7"  value="<?php echo @$actval7;?>"disabled><br>
</span>
<span style="background-color:<?php echo @$existsbg;?>;">
<input  style="display:inline-block;" class="input-group-text" type="checkbox" value="1" name="phase8" id="yourBox8">Phase8 &nbsp;&nbsp;<input type="text" class="form-control col-lg-3" style="display:inline;" name="actual8" id="yourText8" value="<?php echo @$actval8;?>"disabled><br>
</span>
<span style="background-color:<?php echo @$existsbg;?>;">
<input  style="display:inline-block;" class="input-group-text" type="checkbox" value="1" name="phase9" id="yourBox9">Phase9 &nbsp;&nbsp;<input type="text" class="form-control col-lg-3" style="display:inline;" name="actual9" id="yourText9" value="<?php echo @$actval9;?>"disabled><br><br>
</span>

<button class="btn btn-primary" id="savedata" onClick="return empty()" type="submit">Save Data</button>
<button class="btn btn-secondary" type="button" onclick="GenerateGanttChart()" value="GenerateGanttChart">GenerateGanttChart</button>
<!-- <button class="btn btn-secondary" type="button" onclick="NewModule()" value="NewModule">Select another module</button> -->
</form>
<br>
<!-- drawing the ideal gantt chart --> 
<span id="display3"   class="card-header"><b>Module Name:</b> <?php echo @$CourseName;?></span><br><br>
<div class="bar" id="display1">
    <span class="p1" style="padding: 5px 40px;"><?php echo @$ideal; ?></span>
    <span class="p2" style="padding: 5px 40px;"><?php echo @$ideal; ?></span>
    <span class="p3" style="padding: 5px 40px;"><?php echo @$ideal; ?></span>
    <span class="p4" style="padding: 5px 40px;"><?php echo @$ideal; ?></span>
    <span class="p5" style="padding: 5px 40px;"><?php echo @$ideal; ?></span>
    <span class="p6" style="padding: 5px 40px;"><?php echo @$ideal; ?></span>
    <span class="p7" style="padding: 5px 40px;"><?php echo @$ideal; ?></span>
    <span class="p8" style="padding: 5px 40px;"><?php echo @$ideal; ?></span>
    <span class="p9" style="padding: 5px 40px;"><?php echo @$ideal; ?></span>
</div>
<br>


<!-- this code should run only when we click on generate gantt chart -->
<span if you are not able to show it here, then show it on next page --> 
<div class="bar" id="display2">
    <span class="ap1" style="position:relative;padding: 5px <?php if(@$act2>4){echo @$ideal*10;}else{echo @$act2*10;}?>px;">
    <?php  if(@$act2<4 & @$act2!=0){echo @$act2;}elseif(@$act2!=0){ echo @$ideal;} ?></span>
    <span class="del1" style="position:relative;padding: 5px <?php echo @$delay2*10;?>px;"><?php if(!@$delay2){}else{echo @$delay2;} ?></span>

    <span class="ap2" style="position:relative;padding: 5px <?php if(@$act4>4){echo @$ideal*10;}else{echo @$act4*10;}?>px;">
    <?php if(@$act4<4 & @$act4!=0 ){echo @$act4;}elseif(@$act4!=0){ echo @$ideal;} ?></span>
    <span class="del2" style="position:relative;padding: 5px <?php echo @$delay4*10;?>px;"><?php if(!@$delay4){}else{echo @$delay4;} ?></span>

     <span class="ap3" style="position:relative;padding: 5px  <?php if(@$act6>4){echo @$ideal*10;}else{echo @$act6*10;}?>px;">
     <?php if(@$act6<4 & @$act6!=0){echo @$act6;}elseif(@$act6!=0){ echo @$ideal;} ?></span>
     <span class="del3" style="position:relative;padding: 5px <?php echo @$delay6*10;?>px;"><?php if(!@$delay6){}else{echo @$delay6;} ?></span>
    
    <span class="ap4" style="position:relative;padding: 5px  <?php if(@$act8>4){echo @$ideal*10;}else{echo @$act8*10;}?>px;">
    <?php if(@$act8<4 & @$act8!=0){echo @$act8;}elseif(@$act8!=0){ echo @$ideal;} ?></span>
    <span class="del4" style="position:relative;padding: 5px <?php echo @$delay8*10;?>px;"><?php if(!@$delay8){}else{echo @$delay8;} ?></span>

    <span class="ap5" style="position:relative;padding: 5px  <?php if(@$act10>4){echo @$ideal*10;}else{echo @$act10*10;}?>px;">
    <?php if(@$act10<4 & @$act10!=0){echo @$act10;}elseif(@$act10!=0){ echo @$ideal;} ?></span>
    <span class="del5" style="position:relative;padding: 5px <?php echo @$delay10*10;?>px;"><?php if(!@$delay10){}else{echo @$delay10;} ?></span>

    <span class="ap6" style="position:relative;padding: 5px  <?php if(@$act12>4){echo @$ideal*10;}else{echo @$act12*10;}?>px;">
    <?php if(@$act12<4 & @$act12!=0){echo @$act12;}elseif(@$act12!=0){ echo @$ideal;} ?></span>
    <span class="del6" style="position:relative;padding: 5px <?php echo @$delay12*10;?>px;"><?php if(!@$delay12){}else{echo @$delay12;} ?></span>

    <span class="ap7" style="position:relative;padding: 5px  <?php if(@$act14>4){echo @$ideal*10;}else{echo @$act14*10;}?>px;">
    <?php if(@$act14<4 & @$act14!=0){echo @$act14;}elseif(@$act14!=0){ echo @$ideal;} ?></span>
    <span class="del7" style="position:relative;padding: 5px <?php echo @$delay14*10;?>px;"><?php if(!@$delay14){}else{echo @$delay14;} ?></span>

    <span class="ap8" style="position:relative;padding: 5px  <?php if(@$act16>4){echo @$ideal*10;}else{echo @$act16*10;}?>px;">
    <?php if(@$act16<4 & @$act16!=0){echo @$act16;}elseif(@$act16!=0){ echo @$ideal;} ?></span>
    <span class="del8" style="position:relative;padding: 5px <?php echo @$delay16*10;?>px;"><?php if(!@$delay16){}else{echo @$delay16;} ?></span>

    <span class="ap9" style="position:relative;padding: 5px  <?php if(@$act18>4){echo @$ideal*10;}else{echo @$act18*10;}?>px;">
    <?php if(@$act18<4 & @$act18!=0){echo @$act18;}elseif(@$act18!=0){ echo @$ideal;} ?></span>
    <span class="del9" style="position:relative;padding: 5px <?php echo @$delay18*10;?>px;"><?php if(!@$delay18){}else{echo @$delay18;} ?></span>
</div>
<script type="text/javascript">
function GenerateGanttChart(){
document.getElementById('display1').style.visibility='visible';
document.getElementById('display2').style.visibility='visible';
document.getElementById('display3').style.visibility='visible';
// document.getElementById('savedata').disabled= true;
}

// function NewModule(){
// document.getElementById('savedata').disabled= false;
// document.location.reload();
// // document.getElementById('selectmodule').click();
// document.getElementById('selectmodule').options.item(0).value = "Please select a course from the list";
// }
function logout(){
    window.location.replace("logout.php");
}

document.getElementById('yourBox1').onchange = function() {
    document.getElementById('yourText1').disabled = !this.checked;
};
document.getElementById('yourBox2').onchange = function() {
    document.getElementById('yourText2').disabled = !this.checked;
};
document.getElementById('yourBox3').onchange = function() {
    document.getElementById('yourText3').disabled = !this.checked;
};
document.getElementById('yourBox4').onchange = function() {
    document.getElementById('yourText4').disabled = !this.checked;
};
document.getElementById('yourBox5').onchange = function() {
    document.getElementById('yourText5').disabled = !this.checked;
};
document.getElementById('yourBox6').onchange = function() {
    document.getElementById('yourText6').disabled = !this.checked;
};
document.getElementById('yourBox7').onchange = function() {
    document.getElementById('yourText7').disabled = !this.checked;
};
document.getElementById('yourBox8').onchange = function() {
    document.getElementById('yourText8').disabled = !this.checked;
};
document.getElementById('yourBox9').onchange = function() {
    document.getElementById('yourText9').disabled = !this.checked;
};

function empty() {
    var x;
    x = document.getElementById("selectmodule").value;
    if (x == "") {
        alert("Please select a module from the list");
        return false;
    };
}

</script>
</div>
</body>
</html>
