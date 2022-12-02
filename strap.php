
<?php
require 'connector/jik.php';

 if (isset($_POST['submit'])) {
    $first=$_POST['Fname'];
    $last=$_POST['Lname'];
    $ID=$_POST['ID'];
    $phone=$_POST['number'];
    $email=$_POST['email'];
    $password=$_POST['pass'];
    $query = "insert into regtest values ('$first','$last','$ID','$phone','$email','$password')";

   if (mysqli_query($connect,$query)) {
    
    header("Location:waka.php");
   }else{
       echo("Fail");
   }
   $myfile = fopen("registration_backup.txt","w")or die("Unable to open file!");
   fwrite($myfile,$first);
   fwrite($myfile,$last);
   fwrite($myfile,$ID);
   fwrite($myfile,$phone);
   fwrite($myfile,$email);
   fclose($myfile);

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="text-center col-md-6" style="background-image:url('download.jpeg')">

<form action="" method="POST" >
    <div>
        <div class=" mb-5">
            <b><u><h1 class="container  col-md-6">Register</h1></u></b>
        </div>
     <div class="container border bg-secondary  text-dark text-center shadow col-md-6">
        <div class="row-6">
            <div class="col-md-6 offset-md-3">
                <div class="signup-form">
                        <div class="row">
                            <div class="col-md-6">
                                <label>FirstName</label>
                                <input type="text" name="Fname" id="fname" class="form-control text-capitalize " required autofocus pattern="[A-Za-z]+" title="Enter Name">
                            </div>
                            <div class="col-md-6">
                                <label>LastName</label>
                                <input type="text" name="Lname" id="lname" class="form-control text-capitalize" required autofocus pattern="[A-Za-z]+" title="Enter Name">
                            </div>
                            <label>Phone No.</label>
                            <input type="tel" id="phone" name="number" class="form-control mb-2" pattern="[0-9]+" title="Numbers Only">
                            <label> ID Number</label>
                            <input type="id" name="ID" id="id" class="form-control mb-2" required autofocus pattern="[0-9]+" title="Numbers Only">
                            <label>Email</label>
                            <input  type="email" name="email" placeholder="***@gmail.com" id="email" class="form-control mb-2">
                            <div class="mb-3 col-md-12 input-container">
                                <label>PassWord</label>
                                <input type="password" name="pass" id="PassWord" placeholder="PassWord" class="form-control" required autofocus  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain atleast one number and one uppercase and lowercase letter,and atleast 6 or more characters">
                                <input type="checkbox" onclick="Visible()">Show Password 
                            </div>
                            <div class=" col-md-12">
                                <label>Confirm PassWord</label>
                                <input type="password" name="Cpass" id="Cpass" class="form-control mb-2"   placeholder="Confirm Password" required autofocus pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain atleast one number and one uppercase and lowercase letter,and atleast 6 or more characters">
                                <!-- <input type="checkbox"  class="mb-3" onclick="ConPass()">Show Confirm -->
                            </div>
                            <div class="checkbox mt-2">
                                <label>
                                    <input name="remember" type="checkbox" class="mt-3" value="Remember Me"> Remember Me
                                </label>
                               <p> <!-- <a href="mailto:kuriamichael463@gmail.com" class="text-dark">send to </a> --></p>
                            </div>
                           <p><button type="submit" class="btn btn-primary text-dark" onclick="Validate()" name="submit" style="margin-right: 30px ;">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-danger btn-md">Delete</button>  </p>
                        </div>  
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script> 
      
      <script type="text/javascript">
      function  Validate(){
          var lio=document.getElementById("PassWord").value;
          var kio=document.getElementById("Cpass").value;
          if(lio != kio){
              alert("PassWords do not match.");
              window.open("strap.php");
          }
         return true;
      }
    

       function Visible(){
           var x=document.getElementById("PassWord");
           if(x.type==="password"){
               x.type="text";
           }else{
               x.type="password";
           }
       }
       
       function ConPass(){
           var y=document.getElementById("Cpass");
           if(y.type==="password"){
               y.type="text";
           }else{
               y.type="password";
           }
       }
    </script>
</form>
<P><p>
    <div class="text-center text-dark" style="font-size: larger; font-style:italic; font-family: Verdana, Geneva, Tahoma, sans-serif;" >
       <b><h5> You Already Have An Account?</b>
           <a href="waka.php" class="text-center"><h5><b> Log In Here</b></h5></a>
    </h5></div>
</P>
</body>
</html>