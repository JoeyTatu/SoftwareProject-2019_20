    <?php
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "c9";
    $dbport = 3306;

    // Create connection
    $db = new mysqli($servername, $username, $password, $database, $dbport);
    // Check connection
    if ($db->connect_error) {
        //die('Could not connect: ' . mysql_error());
        header( 'Location: ../error.php' ) ;
    } 
    
    if(count($_POST)>0){
        $uname  = !empty($_POST['uname']) ? $_POST['uname'] : ""; /* gets username from login input */
        $psw    = !empty($_POST['psw']) ? $_POST['psw'] : ""; /* gets password from login input */

        
        $aFieldRequired = [
            $uname,
            $psw, /* required fields, if not completed, results in error */
        ];
        
        $bFieldRequired = false;
        foreach($aFieldRequired as $aField){
            if(trim($aField) == ""){
                $bFieldRequired = true;
                break;
            }
		}
		
		$successDB = false;
		$valid = false;
        if(!$bFieldRequired){
    		$query = "SELECT first_name, last_name, password FROM Customer WHERE customer_id = $uname";
            $result= $db->query($query);
            $row= $result->fetch_assoc(); /* Getting name and password, where username matches database entry*/
            
            $fname = $row["first_name"]; /* set variable fname from database */
            $lname = $row["last_name"]; /* set variable lname from database */
            $logged_in_name = $fname." ".$lname; /* puts first name and last name together as one variable */
            $password = $row["password"]; /* set variable password from database */
            
        
            if($password == $psw){
                $valid = true;
            }
            $successDB = true;
        }
	}
    
    
?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico" /> <!-- @reference: https://community.c9.io/t/customize-title-icon-favicon/10839 -->
    <!--<link rel="stylesheet" href="css/golden.css" type="text/css" />-->
    <!--<link rel="stylesheet" href="css/responsive.css" type="text/css" />--><!--<link rel="stylesheet" href="css/responsive.css" type="text/css" />-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/golden.css" type="text/css" />
    <!-- <link rel="stylesheet" href="../css/register.css" type="text/css" /> -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/popper.js"></script>


    <title>Golden Years</title>
    

    <script>
        var angle = 0;

        function galleryspin(sign) {
            spinner = document.querySelector("#spinner");
            if (!sign) { angle = angle + 45; }
            else { angle = angle - 45; }
            spinner.setAttribute("style", "-webkit-transform: rotateY(" + angle + "deg); -moz-transform: rotateY(" + angle + "deg); transform: rotateY(" + angle + "deg);");
        }
        
    </script>
</head>

<body>
    <!--include jquery so that when screen shrinks there is a drop down menu on nav-->

        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#"></a>    <!--<img src"img/icon.gif" alt="Icon">-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <!--Give this a class or id to change the style-->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../htmlHome/index.php">Home <span class="sr-only"></span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../htmlHome/about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../htmlMedical/medical.php"> Medical Support</a>
                        <!-- code for making the nav link text white when on page class="active"-->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../htmlEvents/events.php">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../htmlEducation/education.php">Education</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="document.getElementById('id01').style.display='block'" style="position: right: 0;">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../htmlHome/registerIndex.php" style="position: right: 0;">Register</a>
                </li>
                <li class="nav-item">
                    <small>
                        <!-- This code shows the name of the user when they login, or if the login failed -->
                    <?php
                    if(!isset($bFieldRequired)){ /* set variable lname from database */
                        echo ("");
                    }
                    else if ((isset($successDB) && $successDB) && (isset($valid) && $valid)){ 
                        echo ("<font color='white'>Hello ".$logged_in_name."</font>"); /* shows e.g. "Hello John Smith" on successful login  */
                    }
                    else{ //failed login/passwords don't match/errors/etc
                        echo ("<font color='white'>Login failed. Try again.</font>"); /* catchall for errors with login  */
                    }
                    ?>
                    </small>
                </li>
            </ul>
            
                <div class="search">
                <!-- @reference: https://cse.google.com/cse/ -->
                <script>
              (function() {
                var cx = '010227779527468180863:jx9xqvncqh8';
                var gcse = document.createElement('script');
                gcse.type = 'text/javascript';
                gcse.async = true;
                gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(gcse, s);
              })();
            </script>
            <gcse:search></gcse:search>
            </div>
        </div>
    </nav>



    <div class="container main-container">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3"><img src="../img/Heading.gif" alt="Golden Years" height="200" width="1000"></h1>
                <p>This page is created to help you expand your knowlegde and seek education. Here are a few links to education options available suitable for the elderly.</p>
            </div>
        </div>
        <center>
                <h2><img src="../img/about-header.png" width="50%" alt="About Us"/></h2>
                <p>&nbsp;</p>
                <hr />
            </center>

        <div class="row">
            <center>
                <div class="col-12 col-lg-12">
                    <p> Golden Years is a website designed for people in the golden age of retirement who wish to remain active in the community and go to age-specific events. The website also provides medical and education information.</p>
            </center>
            </div>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <center>
                        <h2>Meet the Team</h2>
                        <p>Our Team have previously been Computing and Technology students, which extensive expertise in creating websites.</p>
                    </center>
                </div>
            </div>

            <div class="row">
                <div class="col-6 col-lg-6 about-box">
                    <h2>Keith Feeney</h2>
                    <img src="https://media.licdn.com/mpr/mpr/shrinknp_400_400/AAIA_wDGAAAAAQAAAAAAAAsUAAAAJDQ3MTQ3YzZiLTQwMDMtNDQ3NC04MmU0LWVhMmMzM2VlOTU3Ng.jpg" height="200px" width="200px">
                    <p>Keith has expiernece in HTML, CSS, XML, XSL, and various coding languages including Java and C#.</p>
                </div>


                <div class="col-6 col-lg-6 about-box">
                    <h2>Charlene Moore</h2>
                    <img src="https://media.licdn.com/media/AAIA_wDGAAAAAQAAAAAAAAyIAAAAJGZiNjVkYWJhLTBiMjctNGQzMS1hZmUxLTg0Mzc4OTMxNjA0Mw.jpg" height="200px" width="200px">
                    </center>
                    <p>Charlene has expierience with html, xml, css, Microsoft technologies and was part of the Entertainment Committe during her college life.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-4 col-lg-6 about-box">
                    <h2>Angela Darel</h2>
                    <img src="https://media.licdn.com/media/AAIA_wDGAAAAAQAAAAAAAAnwAAAAJGFkMDNhMzdmLWY5MmItNDk5NC1iZTc4LWViNjEyOTNmMDkxZg.jpg" height="200px" width="200px">
                    <p>Angela has expierence in Microsoft technologies, HTML & CSS, leadership, public speaking and organisatinal behaviour.</p>
                </div>

                <div class="col-6 col-lg-6 about-box">
                    <h2>Jessica Bankole</h2>
                    <img src="https://media.licdn.com/media/AAIA_wDGAAAAAQAAAAAAAAxmAAAAJDhjYjNiMTBiLTdkMWUtNDMzZi05ZjAxLTM4ZWMzYmE3Mzg1OQ.jpg" height="200px" width="200px">
                    <p>Jessica has expierience in Microsoft technologies as well as Social Media, Public Speaking, HTML and Management.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-12">
                    <center>
                        <h2>Where we are</h2>
                    </center>
                </div>
            </div>

            <div class="row">
                <div class="col-6 col-lg-6">


                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2382.1828266313573!2d-6.238025384006403!3d53.33998338288876!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48670eeb13a9dd27%3A0x8c0b7757e533c712!2sGoogle!5e0!3m2!1sen!2sie!4v1512736480940"
                        width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

                </div>
                
                <div class="col-6 col-lg-6">

                    <p>
                        <center>
                            <h4>&emsp;GOLDEN YEARS</h4>
                        </center>
                        <center> &emsp;&emsp;GOOGLE </center>
                        <center> &emsp;&emsp;GOOGLE DOCKS </center>
                        <center> &emsp;&emsp;BARROW STREET </center>
                        <center> &emsp;&emsp;DUBLIN 4 </center>
                        <center> &emsp;&emsp;D04 V4X7 </center>
                        <center> &emsp;&emsp;IRELAND </center>
                        <br>
                        <center> &emsp;&emsp;Telephone: <a href="tel:+35314123456" style="colour:white;">01 4123456</a> </center>
                        <center> &emsp;&emsp;Email: <a href="mailto:info@goldenyears.ie">info@goldenyears.ie</a></center>
                        <center> &emsp;&emsp;Skype: <a href="skype:info@goldenyears.ie">Skype</a> </center>
                    </p>

                </div>
            </div>

            <div class="row">
                <div class="col-6 col-lg-12 contact-heading">

                    <h2>Contact us</h2>
                    <p>Please fill out the contact form and we'll get back to you</p>
                </div>
            </div>
            
            <div class="col-12 col-lg-12 contact-form">
                <div id="after_submit"></div>
                <form id="contact_form" action="#" method="POST" enctype="multipart/form-data">

                    <label class="required" for="name">Your name:</label>
                    <input id="name" class="input" name="name" type="text" value="" size="20%" /><br />
                    <span id="name_validation" class="error_message"></span>

                    <label class="required" for="email">Your email:</label>
                    <input id="email" class="input" name="email" type="text" value="" size="20%" /><br />
                    <span id="email_validation" class="error_message"></span>
                    <label class="required message-label" for="message">Your message: <br></label>
                    <textarea id="message" class="input" name="message" rows="10" cols="115%"></textarea><br />
                    <span id="message_validation" class="error_message"></span> <br>
                    <input id="submit_button" type="submit" value="Send email"  />
                    
                </form>
            </div>

            




           
            <!-- /container -->

            </div>

            <!--Beginning of code for hidden login div-->
            <div id="id01" class="modal">
                <!-- Login button -->

                <form class="modal-content animate" action="../register.php" method="post">
                    <div class="imgcontainer">
                        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                    </div>
                    <!-- this is the part of login you enter username and password-->
                    <div class="container">
                        <label><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="uname" required>

                        <label><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="psw" required>

                        <button type="submit">Login</button>
                        <input type="checkbox" checked="checked"> Remember me
                    </div>

                    <div class="container" style="background-color:#f1f1f1">
                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                        <span class="psw"><a href="../forgotpassword.php">Forgot password?</a></span>
                    </div>
                </form>
            </div>

            <!--Beginning of Script to show hide the div        -->
            <script>
                // Get the modal
                var modal = document.getElementById('id01');

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
            </script>
            <!--End of Script to show hide the div-->


            <!--End of code for hidden login div-->


            <!--<footer class="footer"></footer>-->
            <footer class="footerInBottomBar container">
                <p>Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script> Golden Years</p>
            </footer>


</body>

</html>
