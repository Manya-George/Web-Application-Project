<?php
session_start();
include_once "connect.php";
if(isset($_POST["uname"])&&isset($_POST["pword"])){

function validate($data){
$data=trim($data);
$data=stripslashes($data);
$data=htmlspecialchars($data);
return $data;
}    

$uname=validate($_POST["uname"]);
$pword=validate($_POST["pword"]);

if(empty($uname)){
    header("Location: loginPage.php?error=Username is required");
    exit();
}else if(empty($pword)){
    header("Location: loginPage.php?error=Password is required");
    exit();
}else {
    $sql="Select* from patientlogin where username='$uname' AND passwords='$pword'";

    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)===1){
       $row=mysqli_fetch_assoc($result);
       if($row['username']===$uname && $row['passwords']=== $pword)
       {
        $_SESSION['username']=$row['username'];
        $_SESSION['password']=$row['password'];
        header("Location: patientHomePage.php");
        
       }else{
        header("Location: loginPage.php?error=Incorrect username or password");
    exit();
    }
    } else{
        header("Location: loginPage.php?error=Incorrect username or password");
    exit();
    }
}

}else{
    header("Location: loginPage.php");
    exit();

}

?>