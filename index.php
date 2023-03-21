<!DOCTYPE html>
<html>
<head>
	<?php include_once "inclusiones/meta_tags.php"; ?> 	
	<title>Registro de aspirantes </title>
	<?php include_once "inclusiones/css_y_favicon.php"; ?>
	<link rel="stylesheet" href="css/index.css">
</head>
<body id="LoginForm">

<!-- Menu principal -->
<div class="container-fluid">
	<div class="row">
		<div class="col-12">
	<?php 
		include_once "inclusiones/menu_horizontal_superior.php";
	?>
	</div>
	</div>
</div>

<div class="container" style="margin-top:70px;">

<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h2>Admin Login</h2>
   <p>Please enter your user and password</p>
   </div>
    <form id="Login" method="post" action="#" onsubmit="return valida_login();">

        <div class="form-group">


            <input type="text" class="form-control" id="f_user" name="f_user" placeholder="User">

        </div>

        <div class="form-group">

            <input type="password" class="form-control" id="f_pwd" name="f_pwd" placeholder="Password">

        </div>
        <div class="forgot">
        <a href="reset.html">Forgot password?</a>
</div>
        <button type="submit" class="btn btn-primary">Login</button>

    </form>
    </div>
<p class="botto-text"> Designed by Sunil Rajput</p>
</div></div></div>


</body>



	<?php include_once "inclusiones/js_incluidos.php"; ?>
</body>
</html>