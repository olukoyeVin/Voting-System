<?php
require "connector/conn/conn1/jik.php";
session_start();
if(isset($_POST['submit'])){
$try=$_POST["email"];



if (count($_POST) > 0) {
    $kati="SELECT * from regtest WHERE email='$try'";
    $result = mysqli_query($connect,$kati);
    $row = mysqli_fetch_array($result);
    if ($try== $row["email"] && $row["password"] == $_POST["currentPassword"]) {
        mysqli_query($connect, "UPDATE regtest set password='" . $_POST["newPassword"] . "' WHERE email='$try'");
        echo "Password Change"; 
        header("Location:waka.php");
    }elseif($try!=$row["email"]){
        // echo "'<script> alert ('No Available Address.\n Please Register.')</script>'";
        header("Location:strap.php");
    }
    else{
        echo "Current Password is not correct";
}}}
?>
<html>
<head>
<title>Change Password</title>
<link rel="stylesheet" href="css/bootstrap.min.css">

<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
	currentPassword.focus();
	document.getElementById("currentPassword").innerHTML = "required";
	output = false;
}
else if(!newPassword.value) {
	newPassword.focus();
	document.getElementById("newPassword").innerHTML = "required";
	output = false;
}
else if(!confirmPassword.value) {
	confirmPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "required";
	output = false;
}
if(newPassword.value != confirmPassword.value) {
	newPassword.value="";
	confirmPassword.value="";
	newPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "not same";
	output = false;
} 	
return output;
}
</script>
</head>
<body class="bg-success">
    <form name="frmChange" method="post" action=""
        onSubmit="return validatePassword()">
        <div style="width: 500px;">
            <table border="15" cellpadding="10" cellspacing="0"
                width="500" style="margin-top: 150px;margin-left: 450px;" class="border-dark  shadow tblSaveForm text-center">
                <tr class="tableheader">
                    <td colspan="2"><h4><u><b>Change Password</b></u></h4></td>
                </tr>
                <tr>
                    <td width="40%"><label>Email</label></td>
                    <td width="60%"><input type="email"
                        name="email" class="txtField" required /><span
                        id="email" class="required"></span></td>
                </tr>
                <tr>
                    <td width="40%"><label>Current Password</label></td>
                    <td width="60%"><input type="password"
                        name="currentPassword" class="txtField" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain atleast one number and one uppercase and lowercase letter,and atleast 6 or more characters" />
                        <span id="currentPassword" class="required"></span></td>
                </tr>
                <tr>
                    <td><label>New Password</label></td>
                    <td><input type="password" name="newPassword"
                        class="txtField" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain atleast one number and one uppercase and lowercase letter,and atleast 6 or more characters" /><span id="newPassword"
                        class="required" ></span></td>
                </tr>
                <td><label>Confirm Password</label></td>
                <td><input type="password" name="confirmPassword"
                    class="txtField" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain atleast one number and one uppercase and lowercase letter,and atleast 6 or more characters" />
                    <span id="confirmPassword"
                    class="required"></span></td>
                </tr>
                <tr>
                    <td colspan=""><input type="submit" name="submit"
                        value="Submit" class="btn btn-block btn-primary"></td>
                        <td colspan="2"><input type="reset" name="delete"
                        value="Delete" class="btn btn-danger text-dark"></td>
                </tr>
            </table>
        </div>
    </form>
</body>
</html>