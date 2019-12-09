<?php
$event_id_number = $_SESSION['event_id_number'];

echo ("Hello, event_id_number= ".$event_id_number);
?>

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
    $event_id    = !empty($_POST['event_id']) ? $_POST['event_id'] : "";

    /* Field Required */
    $aFieldRequired = [
        $event_id /* event_id is required, otherwise will throw error */
    ];
    /* End */

    /* Check Filled Fields */
    $bFieldRequired = false;
    foreach($aFieldRequired as $aField){
        if(trim($aField) == ""){
            $bFieldRequired = true;
            break;
        }
    
    /* END */
    /*@reference: https://www.w3schools.com/PhP/showphpfile.asp?filename=demo_db_select_oo */
    $query = "SELECT * FROM Event WHERE event_id = '$event_id' ";
    $result = $db->query($query);
    $row = $result->fetch_assoc(); /* These lines query the databse when user enters event id */
    
    $event_title            = $row["event_title"];
    $event_desc             = $row["event_desc"];
    $event_type_id          = $row["event_type_id"];
    $venue_id               = $row["venue_id"];
    $event_time_hour        = $row["event_time_hour"];
    $event_time_min         = $row["event_time_min"];
    $event_date             = $row["event_date"];
    $is_transport_provided  = $row["is_transport_provided"];
    $transport_id           = $row["transport_id"];
    $can_pay_cash           = $row["can_pay_cash"];
    $price                  = $row["price"];
    $business_id            = $row["business_id"]; /* values to post on page taken from the database */
    
    $event_time             = $event_time_hour.":".$event_time_min; /* puts hour and min together as one variable */
    
    $query2 = "SELECT * FROM Event_Type WHERE event_type_id = '$event_type_id' ";
    $result2 = $db->query($query2);
    $row2 = $result2->fetch_assoc();
    
    $event_type_name = $row2["event_type_name"]; /* gets and sets event name from databse, event_type_id is taken from previous query */
    
    $query3 = "SELECT * FROM Venue WHERE venue_id = '$venue_id' ";
    $result3 = $db->query($query3);
    $row3 = $result3->fetch_assoc();
    
    $venue_name = $row3["venue_name"]; /* gets and sets venue name from databse, venue_id is taken from first query */
    
    
    $query4 = "SELECT * FROM Transport WHERE transport_id = '$transport_id' ";
    $result4 = $db->query($query4);
    $row4 = $result4->fetch_assoc();
    
    $transport_name = $row4["transport_name"];  /* gets and sets transport name from databse, transport_id is taken from first query */
    
    
    $query5 = "SELECT * FROM Business WHERE business_id = '$business_id' ";
    $result5 = $db->query($query5);
    $row5 = $result5->fetch_assoc();
    
    $business_name = $row5["business_name"]; /* gets and sets business name from databse, business_id is taken from first query */
    
    
    }
    $successDB = true;
    
    
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

        .booking {
            border-radius: 5px;
            background-color: #ffd699;
            padding: 20px;
            text-align: left;
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
                <li class="nav-item ">
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
                    <a class="nav-link active" href="../htmlEvents/events.php">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../htmlEducation/education.php">Education</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="../htmlHome/registerIndex.php" style="position: right: 0;">Register</a>
                </li>
                
            </ul>

        </div>
    </nav>



<div class="container main-container">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3"><img src="../img/Heading.gif" alt="Golden Years" height="200" width="1000"></h1>
                <p>Book event page.</p>
            </div>
        </div>
            <center>
                            <h2>Book event</h2>
                            <p>
                            &nbsp;
                            </p>
                            <div class="form">
                            <form action="" method="post">
                        <p>
                            <label for="event_id">Event ID<br></label>
                            <br>
                            <input type="text" name="event_id" id="event_id" required>
                        <hr />
                        
                            <input type="submit" value="Load Event">
                    </form>
                    </div>
                    <div class="booking">
                <table>
                    <tr>
                        <td>
                            <h4>Event ID:</h4>
                        </td>
                        <td>
                            <?php echo ($event_id)?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Title:</h4>
                        </td>
                        <td>
                            <?php echo ($event_title)?>
                        </td>
                    </tr>
                    <tr>
                        <td>                            
                            <h4>Description:</h4>
                        </td>
                        <td>
                            <?php echo ($event_desc)?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Event Type:</h4>
                        </td>
                        <td>
                            <?php echo ($event_type_name)?>
                        </td>
                    </td>
                    <tr>
                        <td>
                            <h4>Venue:</h4>
                        </td>
                        <td>
                            <?php echo ($venue_name)?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Time:</h4>
                        </td>
                        <td>
                            <?php echo ($event_time)?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Date:</h4>
                        </td>
                        <td>
                            <?php echo ($event_date)?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Transport provided?</h4>
                        </td>
                        <td>
                            <?php echo ($is_transport_provided)?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Transport proivded by:</h4>
                        </td>
                        <td>
                            <?php echo ($transport_name)?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Pay cash at Event:</h4>
                        </td>
                        <td>
                            <?php echo ($can_pay_cash)?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Price:</h4>
                        </td>
                        <td>
                            €<?php echo ($price)?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Created by (Business):</h4>
                        </td>
                        <td>
                            <?php echo ($business_name)?>
                        </td>
                    </tr>
                </table>
                <div class="form">
                        <!-- @reference: https://developer.paypal.com/docs/classic/paypal-payments-standard/integration-guide/add_to_cart_step_1/ -->
                      <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">

                      <!-- Identify your business so that you can collect the payments. -->
                      <input type="hidden" name="business" value="kin@kinskards.com"> <!-- This email value here is used for an example only -->
                    
                      <!-- Specify a PayPal Shopping Cart Add to Cart button. -->
                      <input type="hidden" name="cmd" value="_cart">
                      <input type="hidden" name="add" value="1">
                    
                      <!-- Specify details about the item that buyers will purchase. -->
                      <!-- from form/php -->
                      <input type="hidden" name="item_name" value=<?php echo ("Golden_Years-".$event_title); ?>> <!-- This is where the event_title is taken from the created variable above -->
                      <input type="hidden" name="amount" value=<?php echo ($price); ?>> <!-- This is where the price is taken from the created variable above -->
                      <input type="hidden" name="currency_code" value="EUR">
                    
                      <!-- Display the payment button. -->
                      <center>
                          <input type="image" name="submit"
                            src="../img/paypal-button.png"
                            alt="Continue to Paypal">
                            <br><br>
                            <p>Note: A PayPal account is not required to purchase a ticket.</p>
                        </center>
                    </form>
                </div>
            </div>  
            </center>
        </div>
        </div>
        <!-- /container -->

    </main>

    <!--<footer class="footer"></footer>-->
    <footer class="footerInBottomBar container">
        <p>Copyright &copy; <script>document.write(new Date().getFullYear())</script> Golden Years</p>
    </footer>


</body>
</html>
