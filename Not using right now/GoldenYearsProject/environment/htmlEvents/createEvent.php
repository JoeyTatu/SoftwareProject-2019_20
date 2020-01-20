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
    
    if(count($_POST)>0){ 
        $event_title            = !empty($_POST['event_title']) ? $_POST['event_title'] : "";
        $event_desc             = !empty($_POST['event_desc']) ? $_POST['event_desc'] : ""; 
        $event_type_id          = !empty($_POST['event_type_id']) ? $_POST['event_type_id'] : ""; 
        $venue_id               = !empty($_POST['venue_id']) ? $_POST['venue_id'] : ""; 
        $event_time_hour        = !empty($_POST['event_time_hour']) ? $_POST['event_time_hour'] : ""; 
        $event_time_min         = !empty($_POST['event_time_min']) ? $_POST['event_time_min'] : ""; 
        $event_date             = !empty($_POST['event_date']) ? $_POST['event_date'] : ""; 
        $is_transport_provided  = !empty($_POST['is_transport_provided']) ? $_POST['is_transport_provided'] : ""; 
        $transport_id           = !empty($_POST['transport_id']) ? $_POST['transport_id'] : "";    
        $can_pay_cash           = !empty($_POST['can_pay_cash']) ? $_POST['can_pay_cash'] : ""; 
        $price                  = !empty($_POST['price']) ? $_POST['price'] : ""; 
        $business_id            = !empty($_POST['business_id']) ? $_POST['business_id'] : ""; /* takes values from inputs */
        
        $aFieldRequired = [
            $event_title,
            $event_type_id,
            $event_time_hour,
            $event_date,
            $can_pay_cash,
            $price,
            $business_id, /* required, otherwise will throw error */
        ];
        
        $bFieldRequired = false;
        foreach($aFieldRequired as $aField){
            if(trim($aField) == ""){
                $bFieldRequired = true;
                break;
            }
    }
    
        $successDB = false;
    if(!$bFieldRequired){//Insert in db only if the mandatory fields are filled.
        $sql = "INSERT INTO Event(event_id, event_title, event_desc, event_type_id, venue_id, event_time_hour, event_time_min, event_date, is_transport_provided, transport_id, can_pay_cash, price, business_id)
        VALUES ('', '$event_title', '$event_type_id', '$event_desc', '$venue_id', '$event_time_hour', '$event_time_min', '$event_date', '$is_transport_provided', '$transport_id', '$can_pay_cash', '$price', '$business_id')";
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
        
        
        /* @reference: https://stackoverflow.com/questions/6978631/how-to-set-date-format-in-html-date-input-tag */
        function mydate()
        {
              //alert("");
            document.getElementById("dt").hidden=false;
            document.getElementById("ndt").hidden=true;
            }
            function mydate1()
            {
             d=new Date(document.getElementById("dt").value);
            dt=d.getDate();
            mn=d.getMonth();
            mn++;
            yy=d.getFullYear();
            document.getElementById("ndt").value=yy+"-"+mn+"-"+dt /* yyyy-mm-dd is the format MySQL uses */
            document.getElementById("ndt").hidden=false;
            document.getElementById("dt").hidden=true;
        } /* This is for entering a date into the database, it needs to be yyyy-mm-dd, and this converts it from the systym default */
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
                <li class="nav-item active">
                    <a class="nav-link" href="../htmlEvents/events.php">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../htmlEducation/education.php">Education</a>
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
                            <h2>Create a new Event</h2>
                            <p>
                            This section is for creating a new event.
                            </p>

            <div class="form">
               
                    <form action="" method="post">
                        
                            <label for="event_title">Title of your event*</label>
                            <br>
                            <input type="text" name="event_title" id="event_title">
                            
                            <hr />
                            
                            <label for="event_desc">Description*</label>
                            <br>
                            <input type="text" name="event_desc" id="event_desc">
                            
                            <hr />
                        
                            <label for="event_type_id">Event Type*</label>
                            <br>
                            <select name="event_type_id">
                                <option value="" selected>--Please select</option>
                                <option value="1">Medical</option>
                                <option value="2">Event</option>
                                <option value="3">Education</option>
                            </select>
                            
                            <hr />
                            
                            <label for="venue_id">Venue</label>
                            <br>
                            <select name="venue_id">
                                <option value="" selected>--Please select</option>
                                <option value="1" >The Convention Centre</option>
                                <option value="2" >The Chocolate Factory Arts Centre</option>
                                <option value="3" >Aviva Stadium</option>
                                <option value="4" >No 25 Fitzwilliam Place</option>
                                <option value="5" >Smock Alley theatre, 1662</option>
                                <option value="6" >Griffith Conference Centre</option>
                                <option value="7" >Vicar Steet</option>
                                <option value="8" >Royal Hospital Kilmainham</option>
                                <option value="9" >Croke Park</option>
                                <option value="10" >Whelans</option>
                            </select>

                            <hr/>

                            <label for="event_time_hour">Event Time (Hour)*</label>
                            <br>
                            <select name="event_time_hour">
                                <option value="" selected>--Please select</option>
                                <option value="00">00 / 12 midnight</option>
                                <option value="01">01 / 1am</option>
                                <option value="02">02 / 2am</option>
                                <option value="03">03 / 3am</option>
                                <option value="04">04 / 4am</option>
                                <option value="05">05 / 5am</option>
                                <option value="06">06 / 6am</option>
                                <option value="07">07 / 7am</option>
                                <option value="08">08 / 8am</option>
                                <option value="09">09 / 9am</option>
                                <option value="10">10 / 10am</option>
                                <option value="11">11 / 11am</option>
                                <option value="12">12 / 12 noon</option>
                                <option value="13">13 / 1pm</option>
                                <option value="14">14 / 2pm</option>
                                <option value="15">15 / 3pm</option>
                                <option value="16">16 / 4pm</option>
                                <option value="17">17 / 5pm</option>
                                <option value="18">18 / 6pm</option>
                                <option value="19">19 / 7pm</option>
                                <option value="20">20 / 8pm</option>
                                <option value="21">21 / 9pm</option>
                                <option value="22">22 / 10pm</option>
                                <option value="23">23 / 11pm</option>
                            </select>
                            
                            <hr />

                            <label for="event_time_min">Event Time (minute)*</label>
                            <br> 
                            <select name="event_time_min">
                                <option value="" selected>--Please select</option>
                                <option value="00">:00</option>
                                <option value="05">:05</option>
                                <option value="10">:10</option>
                                <option value="15">:15</option>
                                <option value="20">:20</option>
                                <option value="25">:25</option>
                                <option value="30">:30</option>
                                <option value="35">:35</option>
                                <option value="40">:40</option>
                                <option value="45">:45</option>
                                <option value="50">:50</option>
                                <option value="55">:55</option>
                            </select>
                            
                            <hr />

                            <label for="event_date">Date*</label>
                            <br>
                            <input type="date" id="dt" name="event_date"onchange="mydate1();" hidden/>
                            <input type="text" id="ndt" name="event_date" onclick="mydate();" hidden />
                            <input type="button" Value="Date Picker" onclick="mydate();" />
                            
                            <hr />

                            <label for="is_transport_provided">Is Transport included with this Event?</label>
                            <br>
                            <select name="is_transport_provided">
                                <option value="" selected>--Please select</option>
                                <option value="true" >Yes</option>
                                <option value="false">No</option>
                            </select>
                            
                            <hr />

                            <label for="transport_id">Transport Service</label>
                            <br>
                            <select name="transport_id">
                                <option value="" selected>--Please select</option>
                                <option value="1" >(none)</option>
                                <option value="2" >Dublin Bus</option>
                                <option value="3" >Bus Éireann</option>
                                <option value="4" >Dualway</option>
                                <option value="5" >Allied Coaches</option>
                                <option value="6" >Go-Ahead</option>
                                <option value="7" >Molan Coaches</option>
                                <option value="8" >Budget Bus</option>
                            </select>
                            
                            <hr />

                            <label for="can_pay_cash">Can the Customer pay at the Event entrance?</label>
                            <br>
                            <select name="can_pay_cash">
                                <option value="" selected>--Please select</option>
                                <option value="true">Yes</option>
                                <option value="false">No</option>
                            </select>
                            
                            <hr />
                            
                            <label for="price">Price of event<br><small>If free, enter 0.</small></label>
                            <br>
                            &euro;<input type="number" min="0.00" max="9999.99" step="0.01" name="price" id="price">
                            
                            <hr />

                            <label for="business_id">Business ID*<br><small>Please enter your Business ID number here</small></label>
                            <br>
                            <input type="number" name="business_id" id="business_id">
                            
                            <hr />
                            
                            <label for="business_cc">Confirmation<br><small>Please enter your confirmation code</small></label>
                            <br>
                            <input type="text" name="business_cc" id="business_cc">
                            
                            <hr />
                            
                            <!-- @reference: http://jsfiddle.net/rathoreahsan/vzmnJ/ & https://stackoverflow.com/questions/6957443/how-to-display-div-after-click-the-button-in-javascript -->
                            <input type="submit" value="Submit"/>
                            
                    </form>
                    <?php
                        if(!isset($bFieldRequired)){
                            echo ("");
                        }
                        else if(isset($bFieldRequired) && $bFieldRequired){
                            echo ("Required fields not completed."); /* This throws an error if required fields are not entered */
                        }
                        else if (isset($successDB) && !$successDB){
                            echo ("Could not enter data: ".$db->error); /* This throws an error if there's an issue with the database */
                        }
                        else if (isset($successDB) && $successDB){
                            echo ("Thank you. Event created!");
                            echo("<br><button onclick='location.href='/''>Home</button>");
                        } /* This is shown when the user enters the required fields and is sent to the database successfully
                            A button also appreas if this happens */
                    ?> 
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
