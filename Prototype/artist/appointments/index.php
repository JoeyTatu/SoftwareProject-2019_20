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
    
    <link type="text/css" rel="stylesheet" href="../../media/layout.css" />
    <link type="text/css" rel="stylesheet" href="../../themes/calendar_g.css" />
    <link type="text/css" rel="stylesheet" href="../../themes/calendar_green.css" />
    <link type="text/css" rel="stylesheet" href="../../themes/calendar_traditional.css" />
    <link type="text/css" rel="stylesheet" href="../../themes/calendar_transparent.css" />
    <link type="text/css" rel="stylesheet" href="../../themes/calendar_white.css" />
    
    <script src="../../js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="../../js/daypilot/daypilot-all.min.js" type="text/javascript"></script>


    <title>Appointments - Body Branding Bookings</title>
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
                    <a class="nav-link" href="../artist/appointments" class="active">Apointments</a>
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
            
            <!--<div class="search">-->
                <!-- @reference: https://cse.google.com/cse/ -->
            <!--    <script>-->
            <!--  (function() {-->
            <!--    var cx = '010227779527468180863:jx9xqvncqh8';-->
            <!--    var gcse = document.createElement('script');-->
            <!--    gcse.type = 'text/javascript';-->
            <!--    gcse.async = true;-->
            <!--    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;-->
            <!--    var s = document.getElementsByTagName('script')[0];-->
            <!--    s.parentNode.insertBefore(gcse, s);-->
            <!--  })();-->
            <!--</script>-->
            <!--<gcse:search></gcse:search>-->
            <!--</div>-->
        </div>
    </nav>

        		<div id="header">
			<div class="bg-help">
				<div class="inBox">
					<h1 class="logo"  style="padding-top:10px;">Appointments</h1>
					<p id="claim">Click on a time to set appointment.</p>
					<hr class="hidden" />
				</div>
			</div>
        </div>
        <div class="shadow"></div>
        <div class="hideSkipLink">
        </div>
        <div class="main">

            <div style="float:left; width: 160px;">
                <div id="nav"></div>
            </div>
            <div style="margin-left: 160px;">

                <div class="space">
                    Theme: <select id="theme">
                        <option value="calendar_default">Default</option>
                        <option value="calendar_white">White</option>
                        <option value="calendar_g">Google-Like</option>
                        <option value="calendar_green">Green</option>
                        <option value="calendar_traditional">Traditional</option>
                        <option value="calendar_transparent">Transparent</option>
                    </select>
                </div>

                <div id="dp"></div>
            </div>

            <script type="text/javascript">

                var nav = new DayPilot.Navigator("nav");
                nav.showMonths = 3;
                nav.skipMonths = 3;
                nav.selectMode = "week";
                nav.onTimeRangeSelected = function(args) {
                    dp.startDate = args.day;
                    dp.update();
                    loadEvents();
                };
                nav.init();

                var dp = new DayPilot.Calendar("dp");
                dp.viewType = "Week";

                dp.eventDeleteHandling = "Update";

                dp.onEventDeleted = function(args) {
                    $.post("../../artist/appointments/backend_delete.php",
                        {
                            id: args.e.id()

                        },
                        function() {
                            console.log("Deleted.");
                        });
                };

                dp.onEventMoved = function(args) {
                    $.post("../../artist/appointments/backend_move.php",
                            {
                                id: args.e.id(),
                                newStart: args.newStart.toString(),
                                newEnd: args.newEnd.toString()
                            },
                            function() {
                                console.log("Moved.");
                            });
                };

                dp.onEventResized = function(args) {
                    $.post("../../artist/appointments/backend_resize.php",
                            {
                                id: args.e.id(),
                                newStart: args.newStart.toString(),
                                newEnd: args.newEnd.toString()
                            },
                            function() {
                                console.log("Resized.");
                            });
                };

                // event creating
                dp.onTimeRangeSelected = function(args) {
                    var name = prompt("Client name:", "");
                    dp.clearSelection();
                    if (!name) return;
                    var desc = prompt("Description:", "");
                    dp.clearSelection();
                    if (!desc) return;
                    var e = new DayPilot.Event({
                        start: args.start,
                        end: args.end,
                        id: DayPilot.guid(),
                        resource: args.resource,
                        text: name + " - " + desc
                    });
                    dp.events.add(e);

                    $.post("../../artist/appointments/backend_create.php",
                            {
                                start: args.start.toString(),
                                end: args.end.toString(),
                                name: name + " - " + desc
                            },
                            function() {
                                console.log("Created.");
                            });

                };

                dp.onEventClick = function(args) {
                    var date = args.e.start().toString();
                    date = new Date(date.replace("T"," "));
                    
                    const monthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];
                    var date_show = ( date.getDate() + ' ' + monthNames[date.getMonth()] + ', ' + date.getFullYear() );
                    
                    var start_minutes = (date.getMinutes() < 10? '0' : '') + date.getMinutes();
                    var start = date.getHours() + ":" + start_minutes;
                    
                    var end = args.e.end().toString();
                    end = new Date(end.replace("T"," "));
                    var end_minutes = (end.getMinutes() < 10? '0' : '') + end.getMinutes();
                    end = end.getHours() + ":" + end_minutes;
                    
                    alert("ID:" + args.e.id() +
                        "\nClient: " + args.e.text() +
                        "\nDate: " + date_show +
                        "\nTime: " + start + " - " + end);
                };

                dp.init();

                loadEvents();

                function loadEvents() {
                    
                    dp.events.load("../../artist/appointments/backend_events.php");
                }

            </script>

            <script type="text/javascript">
            $(document).ready(function() {
                $("#theme").change(function(e) {
                    dp.theme = this.value;
                    dp.update();
                });
            });
            </script>

        </div>
        <div class="clear">
        </div>

</body>
</html>

