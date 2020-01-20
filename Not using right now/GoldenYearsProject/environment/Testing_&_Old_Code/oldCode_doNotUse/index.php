<!--<!DOCTYPE html>
<html>

<head> 

<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>



    <button onclick="document.getElementById('id01').style.display='block'" class= "login-button"> Login</button>
    <div id="id01" class="modal">

        <form class="modal-content animate" action="/action_page.php">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>

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

</body>

</html>
--->
<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width-device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/golden.css" type="text/css" />
	<link rel="stylesheet" href="css/responsive.css" type="text/css" />
	
	<title>Golden Years</title>
	
	<script>
	var angle = 0;
	function galleryspin(sign) { 
	spinner = document.querySelector("#spinner");
	if (!sign) { angle = angle + 45; } else { angle = angle - 45; }
	spinner.setAttribute("style","-webkit-transform: rotateY("+ angle +"deg); -moz-transform: rotateY("+ angle +"deg); transform: rotateY("+ angle +"deg);");
	}
	</script>
	
</head>

<body class="body">

	<div style="overflow:auto">
	<header class="mainheader">
		
		<nav>
		<class="active"><a href="index.html">HOME</a>  <!-- nav bar top page -->
		<a href="medical.html">MEDICAL SUPPORT</a>
		<a href="events.html">EVENTS</a>
		<a href="education.html">EDUCATION</a>
		</nav> </br>
		</br>
	</header>
	</div>
	
	<button onclick="document.getElementById('id01').style.display='block'" class= "login-button"> Login</button>
    <div id="id01" class="modal"> <!-- Login button --> 

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
    
    
    
    
    <!---<?php 
  
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
  
  <!-- start of jessicas code for cart
<h1>View cart</h1> 
<a href="index.php?page=products">Go back to the products page please.</a> 
<form method="post" action="index.php?page=cart"> 
      
    <table> 
          
        <tr> 
            <th>Name</th> 
            <th>Quantity</th> 
            <th>Price</th> 
            <th>Items Price</th> 
        </tr> 
          

                    <tr> 
                        <td colspan="4">Total Price: <?php echo $totalprice ?></td> 
                    </tr> 
          
    </table> 
    <br /> 
    <button type="submit" name="submit">Update Cart</button> 
</form> 
<br /> 
<span>To remove an item set its quantity to 0 if you change your mind. </span>
<span> Happy shopping </span>
-->
    
    <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">

  <!-- Identify your business so that you can collect the payments. -->
  <input type="hidden" name="business" value="kin@kinskards.com">

  <!-- Specify a PayPal Shopping Cart Add to Cart button. -->
  <input type="hidden" name="cmd" value="_cart">
  <input type="hidden" name="add" value="1">

  <!-- Specify details about the item that buyers will purchase. -->
  <!-- from form/php -->
  <input type="hidden" name="item_name" value="NCI Open Day (Student fees">
  <input type="hidden" name="amount" value="0.00">
  <input type="hidden" name="currency_code" value="USD">

  <!-- Display the payment button. -->
  <input type="image" name="submit"
    src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_addtocart_120x26.png"
    alt="Add to Cart">
  <img alt="" width="1" height="1"
    src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif">
</form>

<!-- end of jessica's code-->
    

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

</body>

	<!-- <div class="button">
		Please Log In
		<button type="button">Log In</button>
		 or Sign Up 
		<button type="button">Sign Up </button>
	</div> -->
	

	<div class="maincontent"> <!-- this div contains main post -->
		<div class="content">
			
		</div>
	</div>

	<aside class="top-sidebar"> <!-- search bar -->
		<article>
		<h2>SEARCH</h2>
		<p>
			<form>
				<input type="text" name="search" placeholder="Search..">
			</form>
		</p>
		</article>
	</aside>
	
	 
		<aside class="middle-sidebar">
		<article>
		<h2>BOOKING</h2>
		<p>Events booking</p>
		<p><iframe src="https://www.sagenda.net/Frontend/5a0ed4832799512e2c76d361?retrieveFromCookies=False" width="230" height="250" frameborder="0" allowtransparency="true" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-top-navigation allow-scripts allow-forms"></iframe></p>
		</article>
	</aside>
	
	
	<aside class="gallery"> 
		<article>
		<h2>GALLERY</h2>
		<p>
		<!--<base href="TeamProject3">-->
			<div id="carousel">
		<figure id="spinner">
		    
		    <!-- This is code for the images in the carousel. The inline styling helped sixe the pics to the same size-->
			
			<img src="img/bubbles.jpg" alt="Old people blowing bubbles" height="200px" width="200px">
			<img src="img/dancing.jpg" alt="Two old people dancing happily" height="200px" width="200px">
			<img src="img/trees.jpg" alt="Two old poeple holding hands during a dance" height="200px" width="200px">
			<img src="img/linedancing.jpg" alt="Two old people line dancing. The lady is wearing a spanish dress" height="200px" width="200px">
			<img src="img/skateboard.jpg" alt="One lady pushing another on a skateboard" height="200px" width="200px">
			<img src="img/holding.jpg" alt="A man cradling a women in his arms happily" height="200px" width="200px">
			<img src="img/bingo.jpg" alt="Old men playing bingo" height="200px" width="200px">
			<img src="img/bingo1.jpg" alt="Old woman playing bongo" height="200px" width="200px">
			
		</figure>
			</div>
<span style="float:left" class="ss-icon" onclick="galleryspin('-')">&lt;</span> <!-- This is for the arrows of the carousel to click images left or right-->
<span style="float:right" class="ss-icon" onclick="galleryspin('')">&gt;</span>
		</p>
		</article>
	</aside>
	
	<!-- The footer keeps going to teh top. We need to change this when making the make responsive.-->

  <footer class="footer"></footer>
    <footer class="footerInBottomBar">
	 <p>Copyright &copy; 2017 Golden Years</p> <!-- adds link to go back up to the top
	</footer> -->

</body>
	
</html>

<!--<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">-->
                    <!--  <ol class="carousel-indicators">-->
                    <!--    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>-->
                    <!--    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>-->
                    <!--    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>-->
                    <!--  </ol>-->
                    <!--  <div class="carousel-inner" role="listbox">-->

                    <!--    <div class="carousel-item active">-->
                    <!--      <img class="d-block img-fluid" src="img/oldpeople.jpg" alt="Bubbles" height="200px" width="200px">-->
                    <!--    </div>-->

                    <!--    <div class="carousel-item">-->
                    <!--      <img class="d-block img-fluid" src="img/dancing.jpg" alt="Second slide" height="200px" width="200px">-->
                    <!--    </div>-->

                    <!--    <div class="carousel-item">-->
                    <!--      <img class="d-block img-fluid" src="img/trees.jpg" alt="Third slide" height="200px" width="200px">-->
                    <!--    </div>-->

                    <!--     <div class="carousel-item">-->
                    <!--      <img class="d-block img-fluid" src="img/linedancing.jpg" alt="Fourth slide" height="200px" width="200px">-->
                    <!--    </div>-->

                    <!--    <div class="carousel-item">-->
                    <!--      <img class="d-block img-fluid" src="img/skateboard.jpg" alt="Fifth slide" height="200px" width="200px">-->
                    <!--    </div>-->

                    <!--    <div class="carousel-item">-->
                    <!--      <img class="d-block img-fluid" src="img/holding.jpg" alt="Sixth slide" height="200px" width="200px">-->
                    <!--    </div>-->

                    <!--    <div class="carousel-item">-->
                    <!--      <img class="d-block img-fluid" src="img/bingo.jpg" alt="Seventh slide" height="200px" width="200px">-->
                    <!--    </div>-->

                    <!--    <div class="carousel-item">-->
                    <!--      <img class="d-block img-fluid" src="img/bingo1.jpg" alt="Eight slide" height="200px" width="200px">-->
                    <!--    </div>-->

                    <!--  </div>-->
                    <!--  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">-->
                    <!--    <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
                    <!--    <span class="sr-only">Previous</span>-->
                    <!--  </a>-->
                    <!--  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">-->
                    <!--    <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
                    <!--    <span class="sr-only">Next</span>-->
                    <!--  </a>-->
                    <!--</div>-->




                    <!--<h2>GALLERY</h2>-->
                    <!--<p>-->
                    <!--<base href="TeamProject3">-->
                    <!--    <div id="carousel">-->
                    <!--        <figure id="spinner">-->

                    <!-- This is code for the images in the carousel. The inline styling helped sixe the pics to the same size-->

                    <!--            <img src="img/bubbles.jpg" alt="Old people blowing bubbles" height="200px" width="200px">-->
                    <!--            <img src="img/dancing.jpg" alt="Two old people dancing happily" height="200px" width="200px">-->
                    <!--            <img src="img/trees.jpg" alt="Two old poeple holding hands during a dance" height="200px" width="200px">-->
                    <!--            <img src="img/linedancing.jpg" alt="Two old people line dancing. The lady is wearing a spanish dress" height="200px" width="200px">-->
                    <!--            <img src="img/skateboard.jpg" alt="One lady pushing another on a skateboard" height="200px" width="200px">-->
                    <!--            <img src="img/holding.jpg" alt="A man cradling a women in his arms happily" height="200px" width="200px">-->
                    <!--            <img src="img/bingo.jpg" alt="Old men playing bingo" height="200px" width="200px">-->
                    <!--            <img src="img/bingo1.jpg" alt="Old woman playing bongo" height="200px" width="200px">-->

                    <!--        </figure>-->
                    <!--    </div>-->
                    <!--    <span style="float:left" class="ss-icon" onclick="galleryspin('-')">&lt;</span>-->
                    <!-- This is for the arrows of the carousel to click images left or right-->
                    <!--    <span style="float:right" class="ss-icon" onclick="galleryspin('')">&gt;</span>-->
                    <!--</p>-->