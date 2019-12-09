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
        die('Out apologies. Golden Years is currently unavailable.');
        
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
    <!--<link rel="stylesheet" href="css/responsive.css" type="text/css" />-->
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
                <li class="nav-item ">
                    <a class="nav-link" href="../htmlHome/index.php">Home <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../htmlHome/about.php">About</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../htmlMedical/medical.php"> Medical Support</a>
                        <!-- code for making the nav link text white when on page class="active"-->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../htmlEvents/events.php">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../htmlEducation/education.php">Education</a>
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



          <div class="container main-container" >

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3"><img src="../img/Heading.gif" alt="Golden Years" height="200" width="1000"></h1>
                <p>This page is created for information purposes only. If you require medical assistance, please contact a health care professional.</p>
                <p><a class="btn btn-primary btn-lg" href="../htmlMedical/medicalSupport.html" role="button">Learn more &raquo;</a></p>
            </div>
        </div>

        <div class="container main-container" >
            
            <center>
                <h2><img src="../img/med-header.png" width="50%" alt="Medical Support"/></h2>
                <p>&nbsp;</p>
                <hr />
            </center>
 <div class="row">
            <div class="col-6 col-lg-4">
              <h2>Heart Condition</h2>
              <p>If you have a heart conidition please click the button to see what exercises help you ensure you live a healthy lifestyle.</p>
              <p><a class="btn btn-secondary" href="https://www.aurorahealthcare.org/patients-visitors/blog/fun-activities-that-are-heart-healthy"  target="_blank" role="button">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="col-6 col-lg-4">
              <h2>Doctor Appointments</h2>
              <p>If you are feeling unwell or you wish to seek medical advice, please click View Details for nore information </p>
              <p><a class="btn btn-secondary" href="http://www.hse.ie/eng/health/az/" target="_blank" role="button">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="col-6 col-lg-4">
              <h2>Broken Limb</h2>
              <p>If you are receiving treatment for a broken bone, please visit this link. </p>
              <p><a class="btn btn-secondary" href="https://www.irishtimes.com/news/health/how-serious-is-pelvic-fracture-in-70-year-old-1.795020" target="_blank" role="button">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="col-6 col-lg-4">
              <h2>Wheelchair User</h2>
              <p>Don't let the fact you are in a wheelchair stop you from enjoying life at its finest. Please click the button to learn more on what is available for wheelchair users. </p>
              <p><a class="btn btn-secondary" href="https://blog.themobilityresource.com/blog/post/10-awesome-date-ideas-for-wheelchair-users" target="_blank" role="button">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="col-6 col-lg-4">
              <h2>Visual Impairment</h2>
              <p>This is is for you if you have a visual impairment, such as wearing glasses </p>
              <p><a class="btn btn-secondary" href="https://www.specsavers.ie/offers/free-eye-test-with-prsi" target="_blank" role="button">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="col-6 col-lg-4">
              <h2>Hearing Impairment</h2>
              <p>If you are hard of hearing or wear a hearing aid, please visit this link for more information.</p>
              <p><a class="btn btn-secondary" href="http://www.citizensinformation.ie/en/health/health_services/dental_aural_and_optical_services/aural_services.html" target="_blank" role="button">View details &raquo;</a></p>
            </div><!--/span-->
          </div><!--/row-->

        </div>
        <!-- /container -->

    </main>

    <!--Beginning of code for hidden login div-->
    <div id="id01" class="modal">
        <!-- Login button -->

        <form class="modal-content animate" action="" method="post">
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
        <p>Copyright &copy; <script>document.write(new Date().getFullYear())</script> Golden Years</p>
    </footer>


</body>



</html>
