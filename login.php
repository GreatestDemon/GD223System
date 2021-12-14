<?php 

include 'dbconn.php';

session_start();

error_reporting(0);

if (isset($_SESSION['email'])) {
    header("Location: main.html");
}
if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$password = md5($_POST['psword']);

	$sql = "SELECT * FROM users WHERE email='$email' AND psword='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['email'] = $row['enail'];
        echo "dmsdndbdnsdsd";
		// header("Location: main.html");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="logincss.css">
    <script src="loginjs.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<!-- navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">

        <!-- logo-->
        <a class="navbar-brand" href="#">
            <img src="logo.png" alt="GD223 logo" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

        <!-- left navigation links-->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">Sign up</a>
                </li>
            </ul>
            </li>
            </ul>
        </div>
    </div>
</nav>


<body style="background-color: #1190CB;">
    <div class="containerr">
        <div class="wrapper">

            <!-- left side of the form-->
            <div class="form-left">
                <img src = "GD223.png" alt = "GD223 logo">
            </div>


            <!-- form content-->
            <form class="form-right" action="main.html" method="post" name="mylogin" onsubmit="return(validate());">
                <h2>Welcome Back!</h2>



                <!-- Applicant Email-->
                <div class="mb-3"> <label>Your Email</label> <input type="email" class="input-field" name="email" id="email"> </div>

                <!-- Applicant Password-->
                <div class="mb-3">
                    <label for="psw">Password</label>
                    <input type="password" id="psword" name="psword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class = "input-field "title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                      <div class = "form-field"> <input type="submit" value="Login" class = "login" name = "login"> </div>
                </div>

                <div id="message">
                    <h3>Password must contain the following:</h3>
                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                    <p id="number" class="invalid">A <b>number</b></p>
                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                  </div>


            </form>
            </div>
        </div>

        <!-- footer  -->
        <footer class="page-footer">
            <div class="container">
                <div class="row">

                    <!-- footer left-side-->
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <h6 class="text-uppercase font-weight-bold">Additional Information</h6>
                        <p>Do you need help navigating through GD223? Do you need help filling your passport application form? Contact us for help!</p>
                        <p>Complete the form and submit to apply for your passport now!</p>
                    </div>

                    <!-- right-side -->
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <h6 class="text-uppercase font-weight-bold">Contact</h6>
                        <p>emmanuel.kwarase@ashesi.edu.gh
                            <br/>1 University Avenue, Berekuso, E/R

                            <br/>+233 54 968 2268</p>
                    </div>
                    <div>

        </footer>
        </div>
</body>

</html>