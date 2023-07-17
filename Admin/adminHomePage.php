<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>   
         <link rel="stylesheet" type="text/css" href="..\css\style.css">
</head>
<body class=admin>
<section>
            <div class="container">
                <nav>
                    <div class="logo">
                        <img src="..\css\logo.jpg">
                    </div>
                    <ul>
                        <li><a href="#" class=active>Home</a></li>
                        <li><a href="patients.php">Patients</a></li>
                        <li><a href="doctors.php">Doctors</a></li>
                        <li><a href="pharmacists.php">Pharmacists</a></li>
                        <li><a href="edit.php">Account</a></li>
                        <li><a href=""><img src="../css/avatar.jpg"></a>
                        <div class="submenu">
                    <ul>
                        <li><h1><?php echo $_SESSION['username'];?></h1></li>
                        <li><a href="delete.php">Disable Account</a></li>
                    <li><a href="../Common/landingPage.php">Logout</a></li>
                    </ul>
</div>
                    </li>
                    </ul>
                </nav>
            </div>
        </section>
        <div class="words">
<h1>Overlook the Users</h1>
<a href="patients.php">Patients</a>
<a href="doctors.php">Doctors</a>
<a href="pharmacists.php">Pharmacists</a>
</div>

</body>
</html>




    
  
  
   
  

    
  
    
  
    
  
    
      
   