<?php 
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
    header("location:private.php");
}
require ("connector/conn/conn1/jik.php");
if(isset($_POST['submit'])){
$user=$_POST['username'];
$password=$_POST['current'];
$odd="select * from admin where username='$user' and password='$password'";
$try = mysqli_query($connect,$odd);
$num_rows = mysqli_num_rows($try) ;
    
  if ($num_rows == 1) {
      
        while($user = mysqli_fetch_assoc($try)){
            $_SESSION['logged_in'] = true;
            $_SESSION['user'] = $user['username'];
            $_SESSION['pass'] = $user['password'];
            header("Location:private.php");
        }
    }
        else{
            echo "Incorrect Details";
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator</title>
</head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<body class="bg-secondary">


<form name="frm" method="post" action=""
        onSubmit="">
        <div style="width: 500px;">
            <table border="15" style="margin-left: 450px;margin-top: 150px;" cellpadding="10" cellspacing="0"
                width="500" align="center" class="tblSaveForm border-dark shadow bg-success">
                <tr class="tableheader">
                    <td colspan="2"><b><u>Admin Login</u></b></td>
                </tr>
                <tr>
                    <td width="40%"><label>UserName</label></td>
                    <td width="60%"><input type="text"
                        name="username" id="user" class="txtField" /><span
                        class="required"></span></td>
                </tr>
                <tr>
                    <td width="40%"><label>Password</label></td>
                    <td width="60%"><input type="password"
                        name="current" id="pass" class="txtField" /><span
                        class="required"></span></td>
                        <td> <input type="checkbox" onclick="Visible()">show Password</td>
                </tr>
                
                <tr>
                    <td colspan=""><input type="submit" name="submit"
                        value="Submit" class="btn btn-primary" onclick="admin()"></td>
                    
                    <td colspan=""><input type="reset" name="submit"
                        value="Delete" class="btn btn-danger"></td>
                        
                    </tr>
                
            </table>
        </div>
    </form>
    
</body>
<script src="js/bootstrap.min.js"></script> 
      <script type="text/javascript">
        function Visible(){
           var x=document.getElementById("pass");
           if(x.type==="password"){
               x.type="text";
           }else{
               x.type="password";
           }
       } 
          
          
          
          </script>
</html>