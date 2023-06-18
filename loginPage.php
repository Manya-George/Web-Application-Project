<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
    </head>
    <body>
        <form method="post" action="login.php">
            <h2>LOGIN</h2>

            <?php
            if (isset($_GET['error'])){?>
                <p class="error"><?php echo $_GET['error'];?></p>
            <?php } ?>
            

            <label for="uName">Username:</label><br>
            <input type="text" id="uname" name="uname" ><br>
          
            <label for="pWord">Password:</label><br>
            <input type="password" id="password" name="pword" ><br><br>

            <button type="submit">Login</button>
        </form>
    </body>
</html>