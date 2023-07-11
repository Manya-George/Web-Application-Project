<?php
session_start();
include_once "connect.php";
if(isset($_POST['login'])){
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
    header("Location: pharmacyLogin.php?error=Username is required");
    exit();
}else if(empty($pword)){
    header("Location: pharmacyLogin.php?error=Password is required");
    exit();
}else {
    $sql="Select* from Pharmacy where username='$uname' AND passwords='$pword'";

    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)===1){
       $row=mysqli_fetch_assoc($result);
       if($row['username']===$uname && $row['passwords']=== $pword)
       {
        $_SESSION['username']=$row['username'];
        $_SESSION['password']=$row['password'];
        $_SESSION['orgName']=$row['orgName'];
        header("Location: pharmacyHomePage.php");
        
       }else{
        header("Location: pharmacyLogin.php?error=Incorrect username or password");
    exit();
    }
    } else{
        header("Location: pharmacyLogin.php?error=Incorrect username or password");
    exit();
    }
}

}else{
    header("Location: pharmacyLogin.php");
    exit();

}
}
?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
        <title>Login Page</title>
    </head>
    <body>
    <div class="l">
    <img src="../css/avatar.jpg" class="avatar">
        <form method="post" action="">
            <h1>PHARMACY LOGIN</h1>

            <?php
            if (isset($_GET['error'])){?>
                <p class="error"><?php echo $_GET['error'];?></p>
            <?php } ?>
            

            <label for="uName">Username:</label><br>
            <input type="text" id="uname" name="uname" ><br>
          
            <label for="pWord">Password:</label><br>
            <input type="password" id="password" name="pword" ><br><br>

            <input type="submit" name="submit" value="Login"> 
        </form>
            </div>
    </body>
</html>