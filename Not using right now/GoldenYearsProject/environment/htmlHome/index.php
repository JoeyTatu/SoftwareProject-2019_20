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
                <li class="nav-item">
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
                <h1 class="display-3"><img src="../img/Heading.gif" class="img-responsive" alt="Golden Years" height="200px" width="1000px"></h1> <!--Don't know how to make this heading responsive-->
                <p>Welcome to Golden Years. This website is designed for people who are in their golden years and provides event creation and booking, as well as useful information.</p>
                <p><a class="btn btn-primary btn-lg" href="../htmlHome/about.html" role="button">About &raquo;</a></p>
            </div>
        </div>


            
            <!--start of cookies code-->
        <?php    $cookie_name = "status"; ?>
     
        
        <?php if(!isset($_COOKIE[$cookie_name])): ?>
        <!--if the cookie is not set then display the following-->
        
            <div class="row">

                <div class="col-md-4">
                    <h2>Sign Up</h2>
                    <p>Sign up here to avail of amazing deals. </p>
                    <p><a class="btn btn-secondary" href="#" role="button">Sign Up &raquo;</a></p>
                </div>

                <div class="col-md-4">
                    <h2>Login</h2>
                    <p>Click here to login if you are already a member. If you are not a member please sign up. </p>
                    <p><a class="btn btn-secondary" href="" role="button" onclick="setLoginCookie(); document.getElementById('id01').style.display='block'">Login &raquo;</a></p>
                </div>

                <div class="col-md-4">
                    <h2>Continue as Guest</h2>
                    <p>Click here if you would like to continue as a guest.</p>
                    <p><a class="btn btn-secondary" href="#" role="button" onclick="setGuestCookie();">Guest &raquo;</a></p>
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
                    <p><a class="btn btn-secondary" href="#" role="button">Register &raquo;</a></p>
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
            
            <?php endif; ?> 
            <!--this is just saying end of if statement-->
            
     

            <div class="row">

                <div class="col-md-9">

                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        
                        <div class="carousel-inner" role="listbox">
                            
                            <div class="carousel-item active">
                                <img class="d-block img-fluid" src="../img/carousel/bingo.jpg" alt="Bingo">
                                <div class="carousel-caption d-none d-md-block">
                                    <h3>...</h3>
                                    <p>...</p>
                                </div>
                            </div>
                            
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="../img/carousel/dancing.jpg" alt="Dancing">
                                <div class="carousel-caption d-none d-md-block">
                                    <h3>...</h3>
                                    <p>...</p>
                                </div>
                            </div>
                            
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="../img/carousel/meal.jpg" alt="Third slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h3>...</h3>
                                    <p>...</p>
                                </div>
                            </div>
                        </div>
                        
                        <!--need to add images/events. text. image size through gimp 800x400px -->
                        
                        
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                         </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                    </div>
                </div>

                <div class="col-md-3">

                    <hr />
                    <a class="btn btn-secondary" href="../htmlEvents/booking.php" role="button" />Book an event &raquo;</a>
                    <p>&nbsp;</p>
                    <p><img src = "../img/line_dancing.jpg" width="250" /></p>

                </div>

            </div>

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
    <!--End of Script to show hide the div-->


    <!--End of code for hidden login div-->

    <!--Beginning of PHP Cart Code-->
    <?php 
  
    if(isset($_POST['submit'])){ 
          
        foreach($_POST['quantity'] as $key => $val) { 
            if($val==0) { 
                unset($_SESSION['cart'][$key]); 
            }else{ 
                $_SESSION['cart'][$key]['quantity']=$val; 
            } 
        } 
          
    } 
  
?>
    

    
    
    
    <!--Cookie Code found at https://www.w3schools.com/js/js_cookies.asp-->
   <script> 
       function setGuestCookie() {
        var d = new Date();
        status="status";
        guest="guest";
        d.setTime(d.getTime() + (10*24*60*60*1000));
         var expires = "expires="+ d.toUTCString();
         document.cookie = status + "=" + guest + ";" + expires + ";path=/";
     }
    </script> 
    
    <script> 
       function setLoginCookie() {
        var d = new Date();
        status="status";
        login="login";
        d.setTime(d.getTime() + (10*24*60*60*1000));
         var expires = "expires="+ d.toUTCString();
         document.cookie = status + "=" + login + ";" + expires + ";path=/";
     }
     
     function getCookie(userStatus) {
    var state = userStatus + "=";
    
    var decodedCookie = decodeURIComponent(document.cookie);
    
    var ca = decodedCookie.split(';');
    
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
     
     
    </script> 


    <!--<footer class="footer"></footer>-->
    <footer class="footerInBottomBar container">
        <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> Golden Years</p>
    </footer>


</body>
</html>
