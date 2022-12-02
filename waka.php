<?php
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
    header("location:dashboard.php");
}
require 'connector/jik.php';
    if(isset($_POST["login"])){
        $mail=$_POST['email'];
        $pass=$_POST['pass'];
        // $try="delete from regtest where email='$mail' and password='$pass'";
       
        // if (mysqli_query($connect,$try)) {
    
        //     header("Location:dragons.html");
        //    }else{
        //        echo("Fail");
        //    }
        // }




        $okay="select * from regtest where email='$mail' and password='$pass'";
        $result = mysqli_query($connect,$okay);
        $num_rows = mysqli_num_rows($result) ;
            
          if ($num_rows == 1 ) {
              
                $_SESSION['email'] = $email;
                
                while($user = mysqli_fetch_assoc($result)){
                    $_SESSION["logged_in"] = true;
                    $_SESSION["user_id"] = $user['IDno'];
                    $_SESSION["first_name"] = $user['firstname'];
                    $_SESSION['last_name'] = $user['lastname'];
                    $_SESSION['phone'] = $user['PhoneNo'];
                    $_SESSION['Email'] = $user['email'];
                    

            //    $user_data =  mysqli_fetch_assoc( mysqli_query($connect,$try));
            header("location:dashboard.php");
                    
        }
          }
          else {
              //php alert

            //    echo '<script>alert("ÏNCORRECT ENTRY DETAILS!")</script>';
            echo'INCORRECT ENTRY DETAILS!!';
                

            // function pop($mess){
            //     echo "<script>alert('$mess');</script>";
            // }
            // pop("INCORRECT ENTRY DETAILS!!");
                 
          }
        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="" style="background-color: dimgray;">
     
<form action="" class="row-6" method="POST">
    <div class="text-center mt-3 mb-5">
       <b><u><h1>LOG IN</h1></u></b>
    </div>
    <div class="container border col-md-6" style="background-color: rgb(140, 204, 152); ;">
        <div class="row-6">
            <div class="col-md-6 offset-md-3" style="height: 250px;">
                <div class="signup-form"> 
                            <label class="mt-6">Email</label>
                            <input type="email" id="Email" placeholder="***@gmail.com" name="email" class="form-control" required autofocus>
                            <div class="mb-3 col-md-12 input-container">
                                <i class="fa fa-key icon"></i>
                                <label>PassWord</label>
                                <input type="password" name="pass" id="Password" placeholder="PassWord" class="form-control" required autofocus  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain atleast one number and one uppercase and lowercase letter,and atleast 6 or more characters">
                                <input type="checkbox" onclick="Confirm()">Show Password 
                            </div>
                            <p><button type="submit" class="btn btn-block text-right shadow" name="login" style="margin-right:30px; color: rgb(189, 226, 43); background-color: rgb(92, 13, 63);">
                                LOG IN
                            </button>
                            <button type="reset" class="btn btn-danger text-dark shadow "> <span class="glyphicon glyphicon-trash"> Delete</span></button>
                                </p>
                        </div>
                </div>

            </div>

        </div>

    </div>
</div>
    <script src="js/bootstrap.min.js"></script> 
      

      <script type="text/javascript">

      function Confirm(){
           var a=document.getElementById("Password");
           if(a.type==="password"){
               a.type="text";
           }else{
               a.type="password";
           }
        }
       
    //     function success(){
            
    //         var w=document.getElementById("Email").value;
    //         var x=document.getElementById("Password").value;
    //         if((w=="unlistedme79@gmail.com" || w=="fkuria596@gmail.com") && x=="#Unlisted02"){
    //         alert("Log In Successful. \nPlease wait for redirecting...");
    //         window.open("dragons.html");
           
    //     }else{
    //         alert("Log In Failed.")
    //     }
    // } 
    </script>
</form>
</form>
<P><P>
    <div class="text-center mt-5" style="font-family:Georgia, 'Times New Roman', Times, serif;">
       <h5> Do You Have An Account? If Not
           <a href="strap.php" class="text-center"><h5><b> Sign Up Here</b></h5></a>
    </h5></div>
</P></P>
</body>
</html>