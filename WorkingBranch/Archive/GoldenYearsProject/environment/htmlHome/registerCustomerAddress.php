<?php
//@reference [entire page]  https://stackoverflow.com/questions/47716397/php-echo-print-on-html-forms-on-same-page/47717164#47717164 & Bankole, J; Darel, A; Feeney, K; Moore, C
// Create connection
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

if(count($_POST)>0){//Check if there are variables passed in $ _POST
    $address_street  = !empty($_POST['address_street']) ? $_POST['address_street'] : ""; /* not null */
    $address_street2 = !empty($_POST['address_street2']) ? $_POST['address_street2'] : "";
    $address_city    = !empty($_POST['address_city']) ? $_POST['address_city'] : ""; /* not null */
    $address_county  = !empty($_POST['address_county']) ? $_POST['address_county'] : ""; /* not null */
    $address_eircode = !empty($_POST['address_eircode']) ? $_POST['address_eircode'] : "";
    $address_country = !empty($_POST['address_country']) ? $_POST['address_country'] : ""; /* takes values from inputs */
    $address_geo_latitude = null;
    $address_geo_longtitude = null;

    /* Field Required */
    $aFieldRequired = [
        $address_street,
        $address_city,
        $address_county,
        $address_eircode, /* required, otherwise will throw error */
    ];
    /* End */

    /* Check Filled Fields */
    $bFieldRequired = false;
    foreach($aFieldRequired as $aField){
        if(trim($aField) == ""){
            $bFieldRequired = true;
            break;
        }
    }
    /* END */

    $successDB = false;
    if(!$bFieldRequired){//Insert in db only if the mandatory fields are filled.
        $sql = "INSERT INTO Address(address_id, address_street, address_street2, address_city, address_county, address_eircode, address_country, address_geo_latitude, address_geo_longtitude)
VALUES ('', '$address_street', '$address_street2', '$address_city', '$address_county', '$address_eircode', '$address_country', '$address_geo_latitude', '$address_geo_longtitude')";
        /* adds values into database */
        
        $successDB = $db->query($sql);
    }
}
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
    
    <!-- -->
    <script>
        /* @reference: http://jsfiddle.net/rathoreahsan/vzmnJ/ & https://stackoverflow.com/questions/6957443/how-to-display-div-after-click-the-button-in-javascript */
        function showDiv() {
            document.getElementById('welcomeDiv').style.display = "block";
        }
        
        
        /*
        //Not needed
        function hideSubmit() {
           var x = document.getElementById("submit");
            if (x.style.display === "none") {
                x.style.display = "block";
           } else {
                x.style.display = "none";
            }
        }
        */ 

    </script>

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
                    <a class="nav-link" href="../htmlHome/index.php">Home <span class="sr-only">(current)</span></a>
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
                    <a class="nav-link" href="../htmlEducation/education.php">Education</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../htmlHome/registerIndex.php" style="position: right: 0;">Register</a>
                </li>
            </ul>

        </div>
    </nav>
        
    <main role="main">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3"><img src="../img/Heading.gif" alt="Golden Years"></h1>
                <p>About Golden Years</p>
                <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p> -->
            </div>
        </div>
        <div class="container main-container" >
            <center>
                            <h2>Your address details</h2>
                            <p>
                            Please enter your address.
                            <br>
                            <b><u>***PLEASE ONLY ENTER 0-9, A-Z AND a-z, NO SPECIAL CHARACTERS***</u></b>
                            </p>

            <div class="form">
               
                    <form action="" method="post">
                        <p>
                            <label for="address_street">Street*</label>
                            <br>
                            <input type="text" name="address_street" id="address_street" required>
                        
                        <hr />
                        
                            <label for="address_street2">Street 2</label>
                            <br>
                            <input type="text" name="address_street2" id="address_street2">
                        
                        <hr />
                         
                            <label for="address_city">City*</label>
                            <br>
                            <input type="text" name="address_city" id="address_city" required>
                        
                        <hr />
                        
                            <label for="address_county">County*</label>
                            <br>
                            <select name="address_county">
                                <option value="(not entered)">Please select</option>
                                <option value="Antrim" selected>Antrim</option>
                                <option value="Armagh">Armagh</option>
                                <option value="Carlow">Carlow</option>
                                <option value="Cavan">Cavan</option>
                                <option value="Clare">Clare</option>
                                <option value="Cork">Cork</option>
                                <option value="Derry">Derry</option>
                                <option value="Donegal">Donegal</option>
                                <option value="Down">Down</option>
                                <option value="Dublin 1">Dublin 1</option>
                                <option value="Dublin 2">Dublin 2</option>
                                <option value="Dublin 3">Dublin 3</option>
                                <option value="Dublin 4">Dublin 4</option>
                                <option value="Dublin 5">Dublin 5</option>
                                <option value="Dublin 6">Dublin 6</option>
                                <option value="Dublin 6W">Dublin 6W</option>
                                <option value="Dublin 7">Dublin 7</option>
                                <option value="Dublin 8">Dublin 8</option>
                                <option value="Dublin 9">Dublin 9</option>
                                <option value="Dublin 10">Dublin 10</option>
                                <option value="Dublin 11">Dublin 11</option>
                                <option value="Dublin 12">Dublin 12</option>
                                <option value="Dublin 13">Dublin 14</option>
                                <option value="Dublin 15">Dublin 16</option>
                                <option value="Dublin 16">Dublin 16</option>
                                <option value="Dublin 17">Dublin 17</option>
                                <option value="Dublin 18">Dublin 18</option>
                                <option value="Dublin 20">Dublin 20</option>
                                <option value="Dublin 22">Dublin 22</option>
                                <option value="Dublin 24">Dublin 24</option>
                                <option value="Dublin">Co. Dublin</option>
                                <option value="Fermanagh">Fermanagh</option>
                                <option value="Galway">Galway</option>
                                <option value="Kerry">Kerry</option>
                                <option value="Kildare">Kildare</option>
                                <option value="Kilkenny">Kilkenny</option>
                                <option value="Laois">Laois</option>
                                <option value="Leitrim">Leitrim</option>
                                <option value="Limerick">Limerick</option>
                                <option value="Longford">Longford</option>
                                <option value="Louth">Louth</option>
                                <option value="Mayo">Mayo</option>
                                <option value="Meath">Meath</option>
                                <option value="Monaghan">Monaghan</option>
                                <option value="Offaly">Offaly</option>
                                <option value="Roscommon">Roscommon</option>
                                <option value="Sligo">Sligo</option>
                                <option value="Tipperary">Tipperary</option>
                                <option value="Tyrone">Tyrone</option>
                                <option value="Waterford">Waterford</option>
                                <option value="Westmeath">Westmeath</option>
                                <option value="Wexford">Wexford</option>
                                <option value="Wicklow">Wicklow</option>
                            </select>
                        
                        <hr />
                        
                            <label for="address_eircode">Eircode<br><small>Please remember your Eircode exactly as you have typed it. It's required for the next page.</small></label>
                            <br>
                            <input type="text" name="address_eircode" id="address_eircode" required>
                        
                        <hr />
                        
                            <label for="address_country">Country</label>
                            <br>
                            <input type="text" name="address_country" id="address_country" value="Ireland">
                            
                        <hr />

                            <!--
                             <label for="address_geo_latitude">Latitude</label>
                             <br>
                             <input type="float" name="address_geo_latitude" id="address_geo_latitude">
                        
                        <hr />
                        
                             <label for="address_geo_longtitude">Longitude</label>
                             <br>
                             <input type="float" name="address_geo_longtitude" id="address_geo_longtitude">
                        
                        <hr /> -->
                        
                          <!--  <input type="submit" class="submit" value="Submit"> -->
                    <?php
                    if(!isset($bFieldRequired)){
                        echo ("<input type='submit' class='submit' value='Submit'>"); /* Sumbit button here, so it's hidden when the form is correctly filled and sent correctly*/
                        echo ("");
                    }
                    else if(isset($bFieldRequired) && $bFieldRequired){
                        echo ("<input type='submit' class='submit' value='Submit'>");
                        echo ("Required fields not completed"); /* This throws an error if required fields are not entered */
                    }
                    else if (isset($successDB) && !$successDB){
                        echo ("<input type='submit' class='submit' value='Submit'>");
                        echo ("Could not enter data: ".$db->error); /* This throws an error if there's an issue with the database */
                    }
                    else if (isset($successDB) && $successDB){
                        /*header( 'Location: ../htmlHome/registerCustomer.php' ); /* Header not allowed here */
                        echo ("Thank you. Address submitted!");
                        echo ("<br><a class='btn btn-secondary' href='../htmlHome/registerCustomer.php' role='button'>CONTINUE &raquo;</a>");
                    } /* This is shown when the user enters the required fields and is sent to the database successfully
                            A button also appreas if this happens */
                    ?>
                    </form>
                    

                </center>
            </div>       
        </div>
        <!-- /container -->

    </main>

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
