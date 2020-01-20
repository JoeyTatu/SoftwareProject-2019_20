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
        header( 'Location: ../error.html' ) ;
    } 

if(count($_POST)>0){//Check if there are variables passed in $ _POST
    $address_street  = !empty($_POST['address_street']) ? $_POST['address_street'] : ""; /* not null */
    $address_street2 = !empty($_POST['address_street2']) ? $_POST['address_street2'] : "";
    $address_city    = !empty($_POST['address_city']) ? $_POST['address_city'] : ""; /* not null */
    $address_county  = !empty($_POST['address_county']) ? $_POST['address_county'] : ""; /* not null */
    $address_eircode = !empty($_POST['address_eircode']) ? $_POST['address_eircode'] : "";
    $address_country = !empty($_POST['address_country']) ? $_POST['address_country'] : "";
    $address_geo_latitude = null;
    $address_geo_longtitude = null;

    /* Field Required */
    $aFieldRequired = [
        $address_street,
        $address_city,
        $address_county,
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

        $successDB = $db->query($sql);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico" /> <!-- @reference: https://community.c9.io/t/customize-title-icon-favicon/10839 -->
    <title>Golden Years</title>

</head>

<body>

<div class="container main-container" >

    <table>
        <tr>
            <td colspan="2">
                <center>
                    <h2>Register</h2>
                    <p>
                        If you would like to register to this website, please fill out the followinf forms.
                    </p>
                </center>
            </td>
            <td>
            </td>
        </tr>
        <br><br>
        <tr>
            <td>
            </td>
            <td>
                <center>
                    <h2>Your address details</h2>
                    <form action="" method="post">
                        <p>
                            <label for="address_street">Street*</label>
                            <input type="text" name="address_street" id="address_street" required>
                        </p>
                        <p>
                            <label for="address_street2">Street 2</label>
                            <input type="text" name="address_street2" id="address_street2">
                        </p>    <p>
                            <label for="address_city">City*</label>
                            <input type="text" name="address_city" id="address_city" required>
                        </p>
                        <p>
                            <label for="address_county">County*</label>
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
                        </p>
                        <p>
                            <label for="address_eircode">Eircode</label>
                            <input type="text" name="address_eircode" id="address_eircode">
                        </p>
                        <p>
                            <label for="address_country">Country</label>
                            <input type="text" name="address_country" id="address_country" value="Ireland">

                            <!-- <p>
                             <label for="address_geo_latitude">Latitude</label>
                             <input type="float" name="address_geo_latitude" id="address_geo_latitude">
                         </p>
                             <p>
                             <label for="address_geo_longtitude">Longitude</label>
                             <input type="float" name="address_geo_longtitude" id="address_geo_longtitude">
                         </p> -->
                            <input type="submit" value="Submit">
                    </form>
                    <?php
                    if(!isset($bFieldRequired)){
                        echo ("");
                    }
                    else if(isset($bFieldRequired) && $bFieldRequired){
                        echo ("Fill Fields required!");
                    }
                    else if (isset($successDB) && !$successDB){
                        //echo ("Could not enter data: ".$db->error);
                        header( 'Location: ../error.html' ) ;
                    }
                    else if (isset($successDB) && $successDB){
                        echo ("Thank you. Address submitted!");
                    }
                    ?>

                </center>
            </td>
        </tr>
    </table>
</div>
</body>
</html>