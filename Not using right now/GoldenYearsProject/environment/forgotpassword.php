<?php
//@reference [entire page]  https://stackoverflow.com/questions/47716397/php-echo-print-on-html-forms-on-same-page/47717164#47717164 & Bankole, J; Darel, A; Feeney, K; Moore, C
// Create connection
    /*
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
    */
    
    if(count($_POST)>0){ 
        $customer_id    = !empty($_POST['customer_id']) ? $_POST['customer_id'] : "";
        $email          = !empty($_POST['email']) ? $_POST['email'] : "";  /* takes values from inputs */
        
        $aFieldRequired = [
            $customer_id,
            $email, /* required, otherwise will throw error */
        ];
        
        $bFieldRequired = false;
        foreach($aFieldRequired as $aField){
            if(trim($aField) == ""){
                $bFieldRequired = true;
                break;
            }
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
                    <a class="nav-link" href="../htmlHome/about.phpl">About</a>
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
                            <h2>Forgotton password</h2>
                             <img src="img/forgotpassword.jpg" height="300" /> <!-- @reference: https://i.ytimg.com/vi/nzdxb4b4tSY/maxresdefault.jpg -->
                            <p>If you've forgotton your password, you can fill out this form and you'll get an email to reset your password</p>
                            <div class="form">
               
                    <form action="" method="post">
                        
                            <label for="customer_id">Customer ID*</label>
                            <br>
                            <input type="text" name="customer_id" id="customer_id">
                            
                            <hr />
                            
                            <label for="email">Email*</label>
                            <br>
                            <input type="email" name="email" id="email">
                            
                            <hr >
                            
                            <input type="submit" value="Submit"/>
                    </form>
                    <?php
                        if(!isset($bFieldRequired)){
                            echo ("");
                        }
                        else if(isset($bFieldRequired) && $bFieldRequired){
                            echo ("Required fields not completed."); /* This throws an error if required fields are not entered*/
                        }
                        /*
                        else if (isset($successDB) && !$successDB){
                            echo ("Could not enter data: ".$db->error); /* This throws an error if there's an issue with the database 
                        }
                        */
                        else if (isset($successDB) && $successDB){
                            echo ("Thank you. Please check your email.");
                            echo("<br><button onclick='location.href='/''>Home</button>");
                        } /* This is shown when the user enters the required fields and is sent to the database successfully
                            A button also appreas if this happens */
                    ?> 
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
