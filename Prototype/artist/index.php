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
        header( 'Location: ../error.html' ) ;
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
		
		$logged_in_name = "John Smtih";
// 		$successDB = false;
// 		$valid = false;
//         if(!$bFieldRequired){
//     		$query = "SELECT first_name, last_name, password FROM Customer WHERE customer_id = $uname";
//             $result= $db->query($query);
//             $row= $result->fetch_assoc(); /* Getting name and password, where username matches database entry*/
            
//             $fname = $row["first_name"]; /* set variable fname from database */
//             $lname = $row["last_name"]; /* set variable lname from database */
//             $logged_in_name = $fname." ".$lname; /* puts first name and last name together as one variable */
//             $password = $row["password"]; /* set variable password from database */
            
        
//             if($password == $psw){
//                 $valid = true;
            // }
            //  $successDB = true;
        // }
	}
    
    
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="https://img.favpng.com/22/1/23/appointment-icon-calendar-icon-date-icon-png-favpng-fMry73Y6w2NnApi7feJv1kkpb_t.jpg" /> <!-- @reference: https://community.c9.io/t/customize-title-icon-favicon/10839 -->
    <!--<link rel="stylesheet" href="css/golden.css" type="text/css" />-->
    <!--<link rel="stylesheet" href="css/responsive.css" type="text/css" />--><!--<link rel="stylesheet" href="css/responsive.css" type="text/css" />-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../css/register.css" type="text/css" /> -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/popper.js"></script>


    <title>Body Branding Bookings</title>
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
                    <a class="nav-link" href="../artist/index.php">Home <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../artist/profile">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../artist/page">Artist Page</a>
                        <!-- code for making the nav link text white when on page class="active"-->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../artist/appointments">Apointments</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="../artist/stock.php">Stock control</a>
                </li>
                <li class="nav-item">
                    <bull class="nav-link">&bull;</bull>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="document.getElementById('id01').style.display='block'" style="position: static; right: 15px;">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../htmlHome/registerIndex.php" style="position: static; right: 15px;">Register</a>
                </li>
                <li class="nav-item">
                    <small>
                    <?php
                    /*if(!isset($bFieldRequired)){ /* set variable lname from database */
                    /*    echo ("");
                    }
                    else if ((isset($successDB) && $successDB) && (isset($valid) && $valid)){ 
                        echo ("<font color='white'>Hello ".$logged_in_name."</font>"); /* shows e.g. "Hello John Smith" on successful login  */
                    /*}
                    else{ //failed login/passwords don't match/errors/etc
                        echo ("<font color='white'>Login failed. Try again.</font>"); /* catchall for errors with login */
                    /*}*/
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

        <center><!-- Main jumbotron for a primary marketing message or call to action -->
            <div class="jumbotron">
                <div class="container">
                    <h1 class="display-3"><img src="https://images.pexels.com/photos/955938/pexels-photo-955938.jpeg" height="400px" class="img-responsive" alt="3B - Artist Home page" height="600px" width=""></h1> <!--Don't know how to make this heading responsive-->
                    <h3>
                    <?php 
                        $logged_in_name = "John Smtih"; 
                        echo ("Welcome to your home menu, ".$logged_in_name);
                        ?>
                    </h3>
                    <!--<p><a class="btn btn-primary btn-lg" href="../htmlHome/about.html" role="button">About &raquo;</a></p>-->
                </div>
            </div>
        </center>


            
            <!--start of cookies code-->
        <!--<?php    $cookie_name = "status"; ?>-->
     
        
        <!--<?php if(!isset($_COOKIE[$cookie_name])): ?>-->
        <!--if the cookie is not set then display the following-->
        
            <div class="row">

                <div class="col-md-4">
                    <h2>Appointments</h2>
                    <p>Show and edit your appointments </p>
                    <p><a class="btn btn-secondary" href="../artist/appointments" role="button">Appointments</a></p>
                </div>

                <div class="col-md-4">
                    <h2>Artist's Page</h2>
                    <p>View and edit your public Artist's Page for your business</p>
                    <p><a class="btn btn-secondary" href="../artist/page" role="button">Artist's Page</a></p>
                </div>

                <div class="col-md-4">
                    <h2>Messages</h2>
                    <p>View and send messages to clients</p>
                    <p><a class="btn btn-secondary" href="#" role="button">Messages</a></p>
                </div>

            </div>
            
             <?php elseif(($_COOKIE[$cookie_name]) == "guest"): ?>
             <!--if the cookie is get as guest display the following-->
             
            
             
             <div class="row">
                 
            

                <div class="col-md-6">
                    <h2>Sign Up</h2>
                    <p>Sign up here to avail of amazing deals. </p>
                    <p><a class="btn btn-secondary" href="#" role="button">Sign Up &raquo;</a></p>
                </div>

                <div class="col-md-6">
                    <h2>Login</h2>
                    <p>Click here to login if you are already a member. If you are not a member please sign up. </p>
                    <p><a class="btn btn-secondary" href="#" role="button" onclick="setLoginCookie(); document.getElementById('id01').style.display='block'">Login &raquo;</a></p>
                </div>

            </div>
            
               <?php elseif(($_COOKIE[$cookie_name]) == "login"): ?>
               <!--if the cookie is set as login display teh following-->
               
                <div class="row">
                 
                <div class="col-md-4">
                    <center>
                    <p><a class="btn btn-secondary" href="#" role="button">Appointments &raquo;</a></p>
                    </center>
                </div>

                <div class="col-md-4">
                    <center>
                    <p><a class="btn btn-secondary" href="#" role="button" onclick="setLoginCookie(); document.getElementById('id01').style.display='block'">Login &raquo;</a></p>
                    </center>
                </div>

                <div class="col-md-4">
                    <center>
                    <p><a class="btn btn-secondary" href="#" role="button" onclick="setGuestCookie();">Continue as Guest &raquo;</a></p>
                    </center>
                </div>

            </div>
            
            <?php endif; 
            ?> 
            <!--this is just saying end of if statement-->
            
     

            

        </div>
        <!-- /container -->

    </main>

    <!--Beginning of code for hidden login div-->
    <div id="id01" class="modal">
        <!-- Login button -->

        <form class="modal-content animate" action="" method="post">
            <div class="imgcontainer">
                <!-- <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span> <!-- Hidden, so users see if they're logged in or not -->
            </div>
            <!-- this is the part of login you enter username and password-->
            <div class="container">
                <label><b>Username</b></label>
                <input type="text" placeholder="Enter User ID" name="uname" required>

                <label><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <button type="submit">Login</button>
                <input type="checkbox" checked="checked"> Remember me
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Close</button>
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


    <!--<footer class="footer"></footer>-->
    <footer class="footerInBottomBar container">
    </footer>


</body>
</html>
