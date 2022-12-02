<?php
require ("connector/conn/conn1/jik.php");
session_start();
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in']==false){
    header("Location: admin.php");

}


// $one=$_POST["im"];
$oil="select * from regtest";
 $pool=mysqli_query($connect,$oil);
  // if(mysqli_num_rows($pool)==1){
while($row=mysqli_fetch_array($pool)){

    $voter['fname']=$row['firstname'];
    $voter['lname']=$row['lastname'];
    $voter['Idno']=$row['IDno'];
    $voter['Email']=$row['email'];
    $sql="select * from regtest where email='".$voter['Email']."'";
    $img=$row['image'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voters Details</title>
</head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<body style="background-color: greenyellow;">
<div style="text-align: center;" >
<h1><u><b>VOTERS DETAILS.</b></u></h1></div>
  <div style="text-align: center;">As The Admin, You Are Able To View The Personal Details Of The Voters.
  <li class="waves-effect waves-light " style="text-align:right">
                                        <a href="adminout.php">
                                            <i class="ti-layout-sidebar-left"></i> Logout
                                        </a>
                                    </li> 
  <br>
    There's The Display:</div>
    
    <div class="col-md-6 offset-md-3 text-center table-center">
                                                <div class="card table-card ">
                                                    <div class="card-header">
                                                        <h5>Personal Details</h5>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                                <li><i class="fa fa-window-maximize full-card"></i></li>
                                                                <li><i class="fa fa-minus minimize-card"></i></li>
                                                                <li><i class="fa fa-refresh reload-card"></i></li>
                                                                <li><i class="fa fa-trash close-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="table-responsive">
                                                        <table border="5" style="margin-left: 150px;">
        <div >
    <tr>
    <th> Image</th>
        <th>Fname</th>
        <th>Lname</th>
        <th>Idno</th>
        <th>Email</th>
    </tr>
    <?php 
    $query = mysqli_query($connect,"SELECT * FROM regtest");
    while($voter = mysqli_fetch_assoc($query)){
        ?>
    <tr>
        <td>
        <?php 
    echo '<img src="images/'.$voter['image'].'" class="d-flex align-self-center img-radius" style=height="100px"; width="100px">'; 
    ?>
        </td>
        <td>    
        <?php echo($voter['firstname']);?>
            
        </td>
        <td>
        <?php echo($voter['lastname']);?>
        </td>
        <td>
        <?php echo($voter['IDno']);?>
        </td>
        <td>
        <?php echo($voter['email']);?>
        </td>
    </tr>
    <?php } ?>
    
   
    </table>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
</body>

</html>