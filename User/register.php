<?php
include 'includes/connector.php';
?>
<html>

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
  
	<div class="container">
		<div class="row justify-content-md-center mt-12">
			<div class="col-sm-8">
				<div class="row border-box">
					<div class="col-sm-6 p-0">
						<img src="pictures/register/nojs.png" class="img-fluid">
					</div>
					<div class="col-sm-6 p-0">
						<div class="card">
							<div class="card-header bg-info">
								<!-- <img src="img/mz-logo-login.png"> -->
								<div class="sub-title">
									Registrasi Akun
								</div>
							</div>
							<!-- <div class="icon-user">
								<h4 class="ti-user"></h4>
							</div> -->
							<div class="card-body">
              	<form action="function.php" method = "post">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="ti-user"></i></span>
						</div>
							<input type="text" class="form-control input-login" name="username" id ="username" placeholder="Username"required pattern="[a-zA-Z]{1,}" title="Masukkan hanya huruf" autofocus>
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="ti-email"></i></span>
										</div>
										<input type="text" class="form-control input-login" name="email" id="email" 
                    placeholder="Alamat email" aria-describedby="emailHelp" required
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Masukkan sesuai dengan format email" >
									</div>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="ti-lock"></i></span>
										</div>
										<input type="password" class="form-control input-login" 
                    placeholder="Kata sandi" name="password" id="password" 
                    aria-describedby="passwordHelp" 
                    required title="Password harus terdiri atas huruf kecil dan
                     angka minimal 8 karakter dan maksimal 32 karakter" pattern="(?=.*\d)(?=.*[a-z]).{8,32}">
					 <div class="input-group mb-3">
					 <p id="caps"> Caps lock is ON.</p>
                  
					 <style>
						#caps {display:none;color:blue}
						</style>

						<script>
						var input = document.getElementById("password");
						var text = document.getElementById("caps");
						input.addEventListener("keyup", function(event) {

						if (event.getModifierState("CapsLock")) {
							text.style.display = "block";
						} else {
							text.style.display = "none"
						}
						});
						</script>
										</div>

                  <small id="passwordHelp" class="text-muted mb-0">
                    Masukkan password harus 8 - 32 karakter.
                  </small>
                  </div>
                  <div class="input-group mb-3">
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" id="enable-show" onclick="myFunction()"> <small>Tampilkan Sandi</small>
                        </label>
                        <script>
                            function myFunction() {
                              var x = document.getElementById("password");
                              if (x.type === "password") {
                                x.type = "text";
                              } else {
                                x.type = "password";
                              }
                            }
                        </script>
                    </div>
                  </div>
                  <div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="ti-lock"></i></span>
										</div>
                    <input type="password" class="form-control input-login" name="password2" id="password2"
											placeholder="Konfirmasi Kata Sandi"aria-describedby="passwordHelp" required 
                      title="Ulangi Password yang sama persis dengan password yang anda masukkan diatas" >
									</div>
									<div class="form-group clearfix">
										<label class="float-left"><a href="login_user.php">Sudah punya akun?</a></label>
									</div>
									<button type="submit" class="btn btn-primary float-right" name="register">Daftar <i
											class="ti-angle-double-right" style="font-size: 12px"></i></button>
									<a href=""><button type="submit" class="btn btn-secondary float-left"> <i
											class="ti-angle-double-left" style="font-size: 12px"></i>Home</button></a>
								</form>
							</div>

						</div>
					</div>
				</div>
				<div class="mt-4 text-center">
					<small>2019 &copy; Copyright Simba</small>
				</div>
			</div>

		</div>
	</div>
</body>

</html>