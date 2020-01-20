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
    $address_eircode    = !empty($_POST['address_eircode']) ? $_POST['address_eircode'] : "";
    $first_name         = !empty($_POST['first_name']) ? $_POST['first_name'] : "";
    $last_name          = !empty($_POST['last_name']) ? $_POST['last_name'] : "";
    $email              = !empty($_POST['email']) ? $_POST['email'] : "";
    $has_account        = true;
    $password1          = empty($_POST['passwordl']) ? $_POST['password1'] : ""; /* takes values from inputs */

    /* Field Required */
    $aFieldRequired = [
        $address_eircode,
        $first_name,
        $last_name,
        $email, /* required, otherwise will throw error */
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
    /*@reference: https://www.w3schools.com/PhP/showphpfile.asp?filename=demo_db_select_oo */
    $query = "SELECT address_id FROM Address WHERE address_eircode = '$address_eircode' ";
    $result = $db->query($query);
    $row = $result->fetch_assoc();
    
    $address_id = $row["address_id"]; /* queries database for where eircode matches, returns address_id */


    $successDB = false;
    if(!$bFieldRequired){//Insert in db only if the mandatory fields are filled.
        $sql = "INSERT INTO Customer(customer_id, first_name, last_name, email, address_id, has_account, password)
VALUES ('', '$first_name', '$last_name', '$email', '$address_id', '$has_account', '$password1')"; /* adds values into database */

    $successDB = $db->query($sql);
    
    
        
    $query2 = "SELECT customer_id FROM Customer WHERE email = '$email' ";
    $result2 = $db->query($query2);
    $row2 = $result2->fetch_assoc();
    
    $customer_id_to_print = $row2["customer_id"]; /* This gets the customer_id from the database after user enters email */
        
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
                            Please enter your address
                            </p>

            <div class="form">
               
                    <form action="" method="post">
                        <p>
                            <label for="address_eircode">Eircode*<br><small>Please enter your Eircode exactly as you did on the previous page.</small></label>
                            <br>
                            <input type="text" name="address_eircode" id="address_eircode" required>
                        
                        <hr />
                        
                            <label for="first_name">First Name*</label>
                            <br>
                            <input type="text" name="first_name" id="first_name">
                        
                        <hr />
                        
                            <label for="last_name">Last Name*</label>
                            <br>
                            <input type="text" name="last_name" id="last_name">
                        
                        <hr />
                         
                            <label for="email">Email*</label>
                            <br>
                            <input type="email" name="email" id="email" required>
                        
                        <hr />
                         
                            <label for="password1">Password*</label>
                            <br>
                            <input type="password" name="password1" id="password1" required>
                        
                        <hr />
                        
                            <label for="password2">Re-enter password*</label>
                            <br>
                            <input type="password" name="password2" id="password2" required>
                        
                        <hr />
                        
                            <input type="submit" value="Submit">
                    </form>
                    <?php
                    if(!isset($bFieldRequired)){
                        echo ("");
                    }
                    else if(isset($bFieldRequired) && $bFieldRequired){
                        echo ("Please fill in all required fields!");
                    }
                    else if (isset($successDB) && !$successDB){
                        echo ("Could not enter data: ".$db->error);
                    }
                    else if (isset($successDB) && $successDB){
                           
                        echo ("Thank you. Account created! Your customer ID is: ".$customer_id_to_print);
                        echo ("<br><button onclick='location.href=../htmlHome/index.php''>Home</button>");
                        
                    }
                    ?>
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
