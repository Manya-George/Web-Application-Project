<?php
session_start();
include_once "DBConnectionCode.php";
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
    header("Location: adminLogin.php?error=Username is required");
    exit();
}else if(empty($pword)){
    header("Location: adminLogin.php?error=Password is required");
    exit();
}else {
    $sql="Select * from Admins where username='$uname' AND passwords='$pword'";

    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)===1){
       $row=mysqli_fetch_assoc($result);
       if($row['username']===$uname && $row['passwords']=== $pword)
       {
        $_SESSION['username']=$row['username'];
        $_SESSION['password']=$row['password'];
        header("Location: adminHomePage.php");
        
       }else{
        header("Location: adminLogin.php?error=Incorrect username or password");
    exit();
    }
    } else{
        header("Location: adminLogin.php?error=Incorrect username or password");
    exit();
    }
}

}else{
    header("Location: adminLogin.php");
    exit();

}
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
    </head>
    <body>
        <form method="post" action="">
            <h2>ADMIN LOGIN</h2>

            <?php
            if (isset($_GET['error'])){?>
                <p class="error"><?php echo $_GET['error'];?></p>
            <?php } ?>
            

            <label for="uName">Username:</label><br>
            <input type="text" id="uname" name="uname" ><br>
          
            <label for="pWord">Password:</label><br>
            <input type="password" id="password" name="pword" ><br><br>

            <button name="login" type="submit" value="login">Login</button>
        </form>
    </body>
</html>