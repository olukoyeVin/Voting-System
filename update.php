
<?php
require 'connector/conn/conn1/jik.php';
// $sia="select * from regtest";
//  $fpl=mysqli_query($connect,$sia);
//   // if(mysqli_num_rows($pool)==1){
// while($row=mysqli_fetch_array($fpl)){

//     $voters['fname']=$row['firstname'];
//     $voters['lname']=$row['lastname'];
//     $voters['Idno']=$row['IDno'];
//     $voters['Email']=$row['email'];
//     $sql="select * from regtest";
//     $img=$row['image'];


// }





 if (isset($_POST['submit'])) {
     $today=$_POST['pass'];
    $First=$_POST['Fname'];
    $Last=$_POST['Lname'];
    $id=$_POST['ID'];
    $Phone=$_POST['number'];
    $Email=$_POST['email'];
    $Password=$_POST['pass'];
    $Image=$_FILES['myfile']['name'];
   
    $query = "update regtest set firstname='$First', lastname='$Last', Idno='$id',PhoneNo='$Phone',email='$Email',image='$Image' where password='$today' ";

   if (mysqli_query($connect,$query)) {
    
    header("Location:dashboard.php");
   }else{
    header("Location:update.php");
   }

 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="text-center col-md-6">

<form action="" method="POST" enctype="multipart/form-data" >
    <div>
        <div class=" mb-2">
            <b><u><h1 class="container  col-md-8" style="margin-left: 450px;">Edit Profile</h1></u></b>
        </div>
     <div class="container border bg-secondary  text-dark text-center shadow col-md-8" style="margin-left: 450px;">
        
            <div class="col-md-6 offset-md-3">
                <!-- <div class="signup-form"> -->
                        <div class="row">
                            <div class="col-md-6">
                                <label>FirstName</label>
                                <input type="text" name="Fname" id="fname" class="form-control text-capitalize " placeholder="" required autofocus pattern="[A-Za-z]+" title="Enter Name">
                                
                                
                                <!-- <textarea name="" id="" cols="23" rows="2">
                                <?php echo($voters['Email']);?>
                                </textarea> -->


                            </div>
                            <div class="col-md-6">
                                <label>LastName</label>
                                <input type="text" name="Lname" id="lname" class="form-control text-capitalize" required autofocus pattern="[A-Za-z]+" title="Enter Name">
                            </div>
                            <label class="mt-3">Phone No.</label>
                            <input type="tel" id="phone" name="number" class="form-control mb-3" pattern="[0-9]+" title="Numbers Only">
                            <label> ID Number</label>
                            <input type="id" name="ID" id="id" class="form-control mb-3" required autofocus pattern="[0-9]+" title="Numbers Only">
                            <label>Email</label>
                            <input  type="email" name="email" placeholder="***@gmail.com" id="email" class="form-control mb-3">
                            <div class="mb-3 col-md-12 input-container">
                                <label>PassWord</label>
                                <input type="password" name="pass" id="PassWord" placeholder="PassWord" class="form-control" required autofocus  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain atleast one number and one uppercase and lowercase letter,and atleast 6 or more characters">
                                <input type="checkbox" onclick="Visible()">Show Password 
                                <br>
                                <label> </label>
                                    <input type="file" id="file" name="myfile"  required>
                                <br>
                            </div>
                            <!-- <div class=" col-md-12">
                                <label>Confirm PassWord</label>
                                <input type="password" name="Cpass" id="Cpass" class="form-control mb-3"   placeholder="Confirm Password" required autofocus pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain atleast one number and one uppercase and lowercase letter,and atleast 6 or more characters">
                                <input type="checkbox"  class="mb-3" onclick="ConPass()">Show Confirm -->
                            <!-- </div> 
                            <div class="checkbox mt-2">
                                <label>
                                    <input name="remember" type="checkbox" class="mt-1" value="Remember Me"> Remember Me
                                </label> -->
                               <p> <!-- <a href="mailto:kuriamichael463@gmail.com" class="text-dark">send to </a> --></p>
                            </div>
                           <p><button type="submit" class="btn btn-primary text-dark" name="submit" style="margin-right: 30px ;">
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
    //   function  Validate(){
    //       var lio=document.getElementById("PassWord").value;
    //       var kio=document.getElementById("Cpass").value;
    //       if(lio != kio){
    //           alert("PassWords do not match.");
    //           window.open("strap.php");
    //       }
    //      return true;
    //   }
    

       function Visible(){
           var x=document.getElementById("PassWord");
           if(x.type==="password"){
               x.type="text";
           }else{
               x.type="password";
           }
       }
       
    //    function ConPass(){
    //        var y=document.getElementById("Cpass");
    //        if(y.type==="password"){
    //            y.type="text";
    //        }else{
    //            y.type="password";
    //        }
    //    }
    </script>
</form>
<P><p>
    <!-- <div class="text-center text-dark" style="font-size: larger; font-style:italic; font-family: Verdana, Geneva, Tahoma, sans-serif;" >
       <b><h5> You Already Have An Account?</b>
           <a href="waka.php" class="text-center"><h5><b> Log In Here</b></h5></a>
    </h5></div> -->
</P>
</body>
</html>