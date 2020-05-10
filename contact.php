<html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery.js"></script>
    <link rel=stylesheet href="style.css?v=2.0">
    <script src="bootstrap-4.3.1-dist/js/bootstrap.bundle.js"></script>
    <script src="bootstrap-4.3.1-dist/js/bootstrap.js"></script>
    <script src="script.js?v=2.0"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
	
    <title>PT. PROWELDINDO - General Trading and Industrial Service</title>
    
    <!-- LOGO + NAVBAR -->
    <nav class="navbar navbar-expand-sm pos-f-t" id="navbar">
    <div class="container header collapse navbar-collapse" id=navbarSupportedContent>
        <div id="logo"><img src="logos/logo-horizontal.jpg" /></div>
        <div id="navbarToggleMobile">
            <ul class="navbar-nav ml-auto text-center">
                <li class="nav-item">
                    <a class="nav-link" href="https://www.proweldindo.com/"><h5>Home</h5></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://www.proweldindo.com/products"><h5>Our Products</h5></a>
                </li>
                <li class="nav-item aktif">
                    <a class="nav-link" href="https://www.proweldindo.com/contact"><h5>Contact Us</h5></a>
                </li>
            </ul>
    </div></div>
    </nav>
    
    <!-- HERO IMAGE -->
    
    <div class="hero">
        <div> <div class="divider">
            <img class="d-block img-hero" src="img/team2.png"/>
                <div class="text-hero">
                <h1>Contact Us</h1>
        </div></div>
        </div></div>
	<?php
	if(isset($_GET['email'])){
      $status = $_GET['email']; 
	}else{
      $status = "none";
	}
	
	if($status==='sent') {
		$message = "<div style='margin-top: 20px;' class='container alert alert-success' role='alert'>Email has been sent!</div>";
		echo $message;
	} elseif($status==='failed') {
		$message = "<div style='margin-top: 20px;' class='container alert alert-warning' role='alert'>Something went wrong, please try again.</div>";
		echo $message;
	}
	?>
    <!-- FORMS -->
    <div class="container form-new">
    <form action="verify.php" method="POST">
    <div class="form-group">
        <label for="txtName">Name</label>
        <input type=text id="txtName" name="txtName" placeholder="Your name" class="form-control">    
    </div>
    <div class="form-group">
        <label for="txtCompany">Company</label>
        <input type=text id="txtCompany" name="txtCompany" placeholder="Company's name" class="form-control">    
    </div>
    <div class="form-group">
        <label for="txtAddress">Address</label>
        <input type=text id="txtAddress" name="txtAddress" placeholder="Address" class="form-control">    
    </div>
    <div class="form-group">
        <label for="txtPhone">Phone</label>
        <input type=text id="txtPhone" name="txtPhone" placeholder="Phone number" class="form-control">    
    </div>
    <div class="form-group">
        <label for="txtEmail">Email</label>
        <input type=text id="txtEmail" name="txtEmail" placeholder="Your email" class="form-control" required>    
    </div>
    <div class="form-group">
        <label for="txtComment">Message</label>
        <textarea id="txtComment" name="txtComment" rows="3" placeholder="Please leave your message here..." class="form-control"></textarea>    
    </div>
    <div class="g-recaptcha" data-sitekey="6Le9qNwUAAAAAFtv2gd2sAVtdIAeL1_32yOxbf3R" data-callback="correctCaptcha"></div>
    <button id="form-submit" onclick="return validateEmail();"type=submit name=submit value=submit class="btn btn-success" style="margin-left: auto;display: block;" disabled>Submit Data</button>
    </form>
    </div>
	<script>
		var email = false;
		function correctCaptcha(response) {
			if(response.length !== 0){
				document.getElementById('form-submit').disabled = false;
			}
		}
		$('#form-submit').click(function(){
			var validate = validateEmail();
			if(!validate){
				alert("Please fill your correct email address.");
				$('#txtEmail').focus();
			}
		});
		function validateEmail(){
			var emailValue = $('#txtEmail').val();
			return (/[\w-.]*\@+[A-Za-z]+(\.co)/.test(emailValue));
		}
	</script>
</html>
<?php include('footer.php'); ?>