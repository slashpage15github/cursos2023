<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 	
	<title>Registro de aspirantes </title>
	<link rel="shorcut icon" type="image/png" href="images/logo_favicon.png">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/sweetalert2.min.css">
	<link rel="stylesheet" href="css/index.css">
</head>
<body id="LoginForm">


<div class="container" style="margin-top:70px;">

<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h2>Admin Login</h2>
   <p>Please enter your user and password</p>
   </div>
    <form id="Login" method="post" action="views/aspirante.php" onsubmit="return valida_login();">

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



<script type="text/javascript" src="js/jquery-3.4.1.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/validations.js"></script>
<script src="js/sweetalert2.all.min.js"></script>
</body>
</html>