<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Afya Njema Dispensary</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
	    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
    <body>
        <section>
            <div class="container">
                <div class="navbar">
                    <nav>
                <div class="logo">
                        <img src="..\css\logo.jpg">
                    </div>
                    <ul>
                        <li><a href="#">SignUp</a>
                        <div class="submenu1">
                        <ul>
                        <li><a href="..\Admin\adminSignUp.php">Admin</a></li>
                        <li><a href="..\Patient\patientSignUp1.php">Patient</a></li>
                        <li><a href="../Doctor/doctorSignUp1.php">Doctor</a></li>
                        <li><a href="../PharmaceuticalCompany/pharmaceuticalCSignUp.php">Pharma Co.</a></li>
                        <li><a href="../Pharmacy/pharmacySignUp.php"> Pharmacy</a></li>
                    </ul> </div>                   
                    </li>
                        <li><a href="#">Login</a>
                    <div class="submenu2">
                    <ul>
                    <li><a href="..\Admin\adminLogin.php">Admin</a></li>
                        <li><a href="..\Patient\patientLogin.php">Patient</a></li>
                        <li><a href="../Doctor/doctorLogin.php">Doctor</a></li>
                        <li><a href="../PharmaceuticalCompany/pharmaceuticalCLogin.php">Pharma Co.</a></li>
                        <li><a href="../Pharmacy/pharmacyLogin.php"> Pharmacy</a></li>
                    </ul>
</div>
                    </li>

                    </ul>
                </nav>
                        </ul>                    
                </div>
                <h1 class="header">Afya Njema Dispensary</h1>
            <div class="row">
                <div class="col-2">
                    <h1>Your One Stop Dispensary<br> For All Your Medical Needs</h1>
		            <p>Health Care is an essential need and through Afya Njema<br>we aim to provide it to your personal liking.</p>
                    <p>Have a personalized page</p>
                    <a href="userRegistration.html" title="Register" target="_blank" class="btn1">Join Us</a>           
                </div>
                <div class="col-2">
                    <img src="../css/landinPageImg1.png">
                </div>
            </div>
            </div>
        </section>

<!---- BENEFITS ------->

        <section>
            <div class="services">
                <div class="small-container">           
                    <div class="row">
                    <div class="col-3">
                        <img class="mySlides" src="../css/describeSymptoms.png" width="450px" height="300px">
                        <img class="mySlides" src="../css/deliverMedication.png" width="450px" height="300px">
                        <img class="mySlides" src="../css/sellMedication.png" width="450px" height="300px">
                        <button class="btn" onclick="plusDivs(-1)">&#10094;</button>
                        <button class="btn" onclick="plusDivs(+1)">&#10095;</button>
                        <script>
                            var slideIndex = 1;
                            showDivs(slideIndex);
                            
                            function plusDivs(n) {
                              showDivs(slideIndex += n);
                            }
                            
                            function showDivs(n) {
                              var i;
                              var x = document.getElementsByClassName("mySlides");
                              if (n > x.length) {slideIndex = 1}
                              if (n < 1) {slideIndex = x.length}
                              for (i = 0; i < x.length; i++) {
                                x[i].style.display = "none";  
                              }
                              x[slideIndex-1].style.display = "block";  
                            }
                            </script>
                    </div> 
                    <div class="col-3">
                        <h1>Your Needs<br>We Provide</h1>
                        <div class="dropdown">
                            <span><h4><a href="userRegistration.html">1. Contact a Physician       </a></h4></span>
                            <div class="dropdown-content1">
                            <p>Registered patients are able to contact physicians to describe symptoms, receive prescriptions and order medication<br><span>Click to register</span></p>
                            </div>
                        </div>
                        <div class="dropdown">
                            <span><h4><a href="userRegistration.html">2. Deliver Medication</a></h4></span>
                            <div class="dropdown-content2">
                            <p>With Afya Njema, you can register as a delivery driver today and deliver order medication<br><span>Click to register</span></p>
                            </div>
                        </div>
                        <div class="dropdown">
                            <span><h4><a href="userRegistration.html">3. Sell Medication to Patients</a></h4></span>
                            <div class="dropdown-content3">
                            <p>Pharmacies can register with Afya Njema and sell medication to all our registered patients<br><span>Click to register</span></p>
                            </div>
                        </div>
                        <div class="dropdown">
                            <span><h4><a href="userRegistration.html">4. Treat Patients</a></h4></span>
                            <div class="dropdown-content4">
                            <p>With Afya Njema, registered physicians can treat patients by prescribing available medication and more<br><span>Click to register</span></p>
                            </div>
                        </div>
                    </div>              
            </div>
        </section>

<!---- TRUST LIST ------->

        <section>
            <div>
                <h1 class="title">In Partnership With</h1>
            </div>
            <div class="flex-container">
                <div><img src="../css/mydawa.png" height="200px" width="300px"></div>
                <div><img src="../css/cosmosltd.png" height="200px" width="300px"></div>
                <div><img src="../css/goodlife.png" height="200px" width="300px"></div>
                <div><img src="../css/malibupharm.png" height="200px" width="300px"></div>
            </div>
        </section>

<!---- FOOTER ------->   
<section>    
<div class="testimonial">
    <h1>Patient Stories</h1>
<img src="../css/testimonail.jpg">
</div>
                        </section>
        <section>
            <div class="small-container1">
                <div class="row1">
                    
                        <h3>Afya Njema Dispensary</h3>
                  
                </div>
                <div class="row2">
                    <div class=2.1>
                <h4>Contact us @:</h4>
                        <h5>0711122233/afyaN@gmail.com</h5>
                        </div>
                        <div class=2.2>
                            <h4>Blog:</h4>
                            <h5>afyaNjemaBlog.com</h5>
                        </div>
                </div>
            </div>
        </section>
    </body>
</html>