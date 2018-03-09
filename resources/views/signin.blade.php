@include('header')
	<!--/w3_short-->
	<!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->
	
	@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
	@endif

	@if($errors->any())
	<div class="alert alert-danger">
		@foreach ($errors->all() as $error)
          	<li>{{ $error }}</li>
     	@endforeach
    </div>
	@endif

	<!--//w3_short-->
	<!-- /inner_content -->
<center><br/><div class="container" style="padding:100px;background-color:#000">
	<div class="main_inputs_wrap">
						<form action="/login" method="post" class="contact_form" id="contact_form">
                            {{ csrf_field() }}
							<div class="returnmessage" data-success="Your message has been received, We will contact you soon."></div>
							<div class="empty_notice"><h3 style="color:#fff;">SignIn to your Account</h3></div>
							<div class="input_inner_wrap">
								<div class="input_row">
								
									<div class="second">
										<input id="email" name="email" type="text" style="width:100%" placeholder="Email">
									</div><br/>
									<div class="first">
										<input id="name" name="password" type="password" style="width:100%" placeholder="Password">
									</div><br/>
									
								</div><br/>
								<div class="first">
								<input type="submit" class="btn btn-theme btn-curved btn-block form-control form-control" style="width:100%" value="Sign In">
								</div>
							</div>
							<h5><a href="/signup" style="color:#fff"> Don't have an account?</a></h5>
							<h5><a href="/forgot_password" style="color:#fff"> Forgot Password?</a></h5>
						</form>
					</div>
					</div></center>
           
	@include('footer')
	<!-- js -->

	<script>
		$('ul.dropdown-menu li').hover(function () {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
		}, function () {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
		});
	</script>
	<!-- password-script -->
	<script type="text/javascript">
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- //password-script -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>
