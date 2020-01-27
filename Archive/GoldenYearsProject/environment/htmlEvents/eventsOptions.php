<?php
session_start();

?>

<!DOCTYPE html>
<html>
  

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico" /> <!-- @reference: https://community.c9.io/t/customize-title-icon-favicon/10839 -->
    <link rel="stylesheet" href="../css/golden.css" type="text/css" />
    <link rel="stylesheet" href="../css/responsive.css" type="text/css" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <title>Golden Years</title>


    <!-- <script>
        var angle = 0;

        function galleryspin(sign) {
            spinner = document.querySelector("#spinner");
            if (!sign) { angle = angle + 45; }
            else { angle = angle - 45; }
            spinner.setAttribute("style", "-webkit-transform: rotateY(" + angle + "deg); -moz-transform: rotateY(" + angle + "deg); transform: rotateY(" + angle + "deg);");
        }
    </script> -->
</head>

    <style>
        input[type=text], select {
            width: 50%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        input[type=submit] {
            width: 50%;
            background-color: #F85A01;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        input[type=submit]:hover {
            background-color: #4CAF50;
        }
        
        .form {
            border-radius: 5px;
            background-color: #ffd699;
            padding: 20px;
        }
    </style>

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
                <li class="nav-item active">
                    <a class="nav-link" href="../htmlEvents/events.php">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../htmlEduication/education.php">Education</a>
                </li>
                
            </ul>
            
        </div>
    </nav>
    
    
      <div class="container main-container" >
    
        <main role="main" > 
        <!--this is for the container on each page.. <main role="main class="col-sm-9 ml-sm-auto col-md-10 pt-3"> this would cause the container to be to the right and have a column down the left side if that makes sense. Change this code to this to help your understanding. -->

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3"><img src="../img/Heading.gif" alt="Golden Years" width="1000" height="200"></h1>
                <p>This page is created for information purposes only. If you require medical assistance, please contact a health care professional.</p>
                <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
            </div>
        </div>
    

        
          <center>
            <h2>Event listings</h2>
          </center>
        <div class="form">
          <section class="row text-center placeholders">
            <div class="col-6 col-sm-3 placeholder">
              <img src="../img/events/events-playingcards.jpg" height="200" width="200" class="img-fluid rounded-circle" alt="OAP playing cards">
              <h4>Playing cards</h4>
              <div class="text-muted"></div>
            </div>
            <div class="col-6 col-sm-3 placeholder">
              <img src="../img/events/events-meal.jpg" height="200"  width="200" class="img-fluid rounded-circle" alt="OAP Woman having meal">
              <h4>Meals & night outs</h4>
              <span class="text-muted"></span>
            </div>
            <div class="col-6 col-sm-3 placeholder">
              <img src="../img/events/events-gym.jpg" height="200"width="200" class="img-fluid rounded-circle" alt="OAP man at the gym">
              <h4>Gym & Sports</h4>
              <span class="text-muted"></span>
            </div>
            <div class="col-6 col-sm-3 placeholder">
              <img src="../img/events/events-artclass.jpg" height="200"  width="200" class="img-fluid rounded-circle" alt="OAP group - art class">
              <h4>Art classes</h4>
              <span class="text-muted"></span>
            </div>
          </section>
          
          <p>&nbsp;</p>
          <hr />
          <p>&nbsp;</p>
          
          <center>
            <h2>Events currently available</h2>
            <!-- This needed to be hard coded, the group tried a lot to get it to retrieve it from the database,
            but it wasn't working -->
          </center>
          <p>&nbsp;</p>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Venue</th>
                  <th>Price</th>
                  <th>Link</th>
                </tr>
              </thead>
              <tbody>
              
                <tr>
                  <td>1</td>
                  <td>Line Dancing</td>
                  <td>Suitable for all ages. Please consider health for this activity as it is physically demanding</td>
                  <td>5</td>
                  <td>10.00</td>
                  <td><a class="btn btn-secondary" href="../htmlEvents/booking.php" onclick="<?php $_COOKIE['1'] = $event_id_number ?>" role="button">Book Event &raquo;</a></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Bingo</td>
                  <td>Suitable for all ages. Visuals and Audios available.</td>
                  <td>4</td>
                  <td>5.50</td>
                  <td><a class="btn btn-secondary" href="../htmlEvents/booking.phpl" onclick="<?php $_COOKIE['2'] = $event_id_number ?>"  role="button">Book Event &raquo;</a></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Chess Champiog</td>
                  <td>Enjoy chess? Love the thrill of competing? This is for you</td>
                  <td>3</td>
                  <td>25.00</td>
                  <td><a class="btn btn-secondary" href="../htmlEvents/booking.php" onclick="<?php $_COOKIE['3'] = $event_id_number ?>" role="button">Book Event &raquo;</a></td>
                </tr>
                <tr>
                  <tr>
                  <td>4</td>
                  <td>Night out</td>
                  <td>A meal in a hotel and dancing afterwards</td>
                  <td>2</td>
                  <td>60</td>
                  <td><a class="btn btn-secondary" href="../htmlEvents/booking.php"  onclick="<?php $_COOKIE['4'] = $event_id_number ?>" role="button">Book Event &raquo;</a></td>
                </tr>
                <tr>
                  <tr>
                  <td>5</td>
                  <td>Art Class</td>
                  <td>Art classes available locally</td>
                  <td>1</td>
                  <td>21.00</td>
                  <td><a class="btn btn-secondary" href="../htmlEvents/booking.php"  onclick()="<?php $_COOKIE['5'] = $event_id_number ?>" role="button">Book Event &raquo;</a></td>
                </tr>
                <tr>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>
    
    
</div>
</div>

    <!--Beginning of code for hidden login div-->
    <div id="id01" class="modal">
        <!-- Login button -->

        <form class="modal-content animate" action="register.php" method="post">
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
                <span class="psw">Forgot <a href="#">password?</a></span>
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
