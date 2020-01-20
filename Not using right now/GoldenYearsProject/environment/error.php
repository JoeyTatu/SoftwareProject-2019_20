<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" /> <!-- @reference: https://community.c9.io/t/customize-title-icon-favicon/10839 -->
    <link rel="stylesheet" href="../css/golden.css" type="text/css" />
    <link rel="stylesheet" href="../css/responsive.css" type="text/css" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <title>Golden Years</title>

    <!-- @references: https://www.labnol.org/internet/embed-mute-youtube-video/29149/ -->
    
    <script async src="https://www.youtube.com/iframe_api"></script>
    <script>
     function onYouTubeIframeAPIReady() {
      var player;
      player = new YT.Player('muteYouTubeVideoPlayer', {
        videoId: 'XPzLM_EX2pM', // YouTube Video ID
        width: 560,               // Player width (in px)
        height: 316,              // Player height (in px)
        playerVars: {
          autoplay: 1,        // Auto-play the video on load
          controls: 1,        // Show pause/play buttons in player
          showinfo: 0,        // Hide the video title
          modestbranding: 1,  // Hide the Youtube Logo
          loop: 1,            // Run the video in a loop
          fs: 1,              // Hide the full screen button
          cc_load_policy: 0, // Hide closed captions
          iv_load_policy: 3,  // Hide the Video Annotations
          autohide: 1         // Hide video controls when playing
        },
        events: {
          onReady: function(e) {
            e.target.mute();
          }
        }
      });
     }
    
     // Written by @labnol 
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
                </li>
                <li class="nav-item">  <!-- code for making the nav link text white when on page class="active"-->
                    <a class="nav-link" href="../htmlEvents/events.php">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../htmlEducation/education.php">Education</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="document.getElementById('id01').style.display='block'" style="position: right: 0;">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../htmlHome/register.php" style="position: right: 0;">Register</a>
                </li>
            </ul>
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
                <p><a href="https://en.wikipedia.org/wiki/2001:_A_Space_Odyssey_(film)" target="_blank">I'm sorry, Dave. I'm afraid I can't do that.</a></p> <!-- Geeky quote from "2001: A Space Odyssey" -->
            </div>
        </div>
            
        <table>
                <tr>
                    <th width="100%">
                        <center>
                            <img src="img/error.png"> <!-- @reference: https://cdn.makeawebsitehub.com/wp-content/uploads/2016/03/error-with-wordpress.png -->
                            <br><br>
                            <h2>Oops!</h2>
                            <p>
                            Our apologies, an error has occured.<br>
                            This error has been recorded and our tech team has been informed. 
                            </p>
                            <p>
                            See?! Our tech team are working!
                            <br>
                            <!-- @references: https://www.labnol.org/internet/embed-mute-youtube-video/29149/ -->
                            <iframe id="muteYouTubeVideoPlayer" frameborder="0" allowfullscreen="1" gesture="media" allow="encrypted-media" title="YouTube video player" width="560" height="316" src="https://www.youtube.com/embed/XPzLM_EX2pM?autoplay=1&controls=1&showinfo=0&modestbranding=0&loop=1&fs=0&cc_load_policty=0&iv_load_policy=3&autohide=0&enablejsapi=1&origin=https%3A%2F%2Fimg.labnol.org&widgetid=1"></iframe></center>
                    </th>
                    <td>
                    	
                    </td>
                </tr>
                <br><br>
                <tr>
                    <td  width="50%">
                        <center>
                            <p><a class="btn btn-secondary" href="htmlHome/index.php" role="button"><img src="https://image.flaticon.com/icons/svg/25/25694.svg" height="25px" width="25px" /><br>Home</a></p>
                        </center>
                    </td>
                    <td>
                    </td>
                </tr>
        </table>
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
                <input type="checkbox" checked="checked"><a href="https://i.imgur.com/N65P9gL.gif" target="_blank"> Remember me </a>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <span class="psw"><a href="/forgotpassword.php">Forgot password?</a></span>
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
        };
    </script>
    <!--End of Script to show hide the div-->



    <!--<footer class="footer"></footer>-->
    <footer class="footerInBottomBar container">
        <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> Golden Years</p>
    </footer>


</body>



</html>
