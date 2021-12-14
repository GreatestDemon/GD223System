<?php 

    if (isset($_POST['register'])) {

        $fullname = $_POST['fullname'];
        $type = $_POST['type'];
        $applicdate = $_POST['applicdate'];
        $appointdate = $_POST['appointdate'];
        $form = $_POST['form'];;
        $PAC= $_POST['PAC'];
        $WName = $_POST['wname'];
        $WContact = $_POST['wcontact'];
        
        
        // print_r($_POST);
    
        // getting user input and validating
    
        require 'database_credentials.php';
        // connect to database
        $conn = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE);
    
    
        $sql = "INSERT INTO appointment (Applicant_fullname, Application_type, Application_date, Appointment_date, form, PAC, Witness_name, Witness_contact) values
        ('$fullname', '$type', '$applicdate', '$appointdate', '$form', '$PAC', '$WName', '$WContact')";
        $results = mysqli_query($conn, $sql);
            if ($results) {
                echo "You have successfully registered";
            } else {
                echo "damn";
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
    <link rel="stylesheet" href="appointmentcss.css">
    <!--<script src="signupScript.js"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<!-- navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">

        <!-- logo-->
        <a class="navbar-brand" href="#">
            <img src="logo.png" alt="ashesi logo" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

        <!-- left navigation links-->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="main.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="applicantform.php">Form</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="appointment.php">Appointment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Logout</a>
                </li>
            </ul>
            </li>
            </ul>
        </div>
    </div>
</nav>


<body style="background-color: white);">
    <div class="containerr">
        <div class="wrapper">

            <!-- form content-->
            <form class = "form" method="POST" name="myAPP">
                <h2 class="text-uppercase">Vetting Appointment</h2>

                <!-- full name -->
                <div class="row">
                    <div class="mb-3"> <label>Full Name</label> <input type="text" name="fullname" id="fullname" class="input-field"> </div>
                </div>

                <!--Passport Type-->
                <div class="row">
                    <div class="col-sm-6 mb-3"> <label>Application Type</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="type" value="Standard">
                            <label class="form-check-label" for="inlineRadio1">Standard</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="type" value="Expedited">
                            <label class="form-check-label" for="inlineRadio2">Expedited</label>
                        </div>
                    </div>
                </div>

                <!-- Application and Appointment Date-->
                <div>
                    <div class="mb-3"> <label>Application Date</label> <input type="date" class="input-field" name="applicdate" id="applicdate"> </div>
                    <div class="mb-3"> <label>Appointment Date</label> <input type="date" class="input-field" name="appointdate" id="appointdate"> </div>
                </div>
                
                <!-- Appointment Form-->
                <div class="row">
                    <div class="col-sm-6 mb-3"> <label>Appointment Form</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="form" id="form" value="In-person">
                            <label class="form-check-label" for="inlineRadio1">In-person</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="form" id="form" value="Virtual">
                            <label class="form-check-label" for="inlineRadio2">Virtual</label>
                        </div>
                    </div>
                </div>

                <!--PAC-->
                <div class="row">
                    <div class="mb-3"> <label>Select Passport Application Centre</label>
                        <select name="PAC" id="PAC">
                        <option value="Kumasi PAC">Kumasi PAC</option>
                        <option value="Accra PAC">Accra PAC</option>
                        <option value="Ho PAC">Ho PAC</option>
                        <option value="Koforidua PAC">Koforidua PAC</option>
                        <option value="Takoradi PAC">Takoradi PAC</option>
                        <option value="Tamale PAC">TamalePAC</option>
                        <option value="Sunyani PAC">Sunyani PAC</option>
                        <option value="Cape Cost PAC">Cape Coast PAC</option>
                        <option value="Wa PAC">Wa PAC</option>
                        </select>
                    </div>
                </div>

                <!-- Witness Name and Contact-->
                <div class="row">
                    <div class="col-sm-6 mb-3"> <label>Witness Name</label> <input type="text" name="wname" id="wname" class="input-field"> </div>
                    <div class="col-sm-6 mb-3"> <label>Witness Contact</label> <input type="tel" name="wcontact" id="wcontact" class="input-field"> </div>
                </div>              

                



                    <!-- Register button-->
                    <div class="form-field"> <input type="submit" value="Submit" class="register" name="register"> </div>
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
                        <p>(E) info@ashesi.edu.gh
                            <br/>1 University Avenue, Berekuso, E/R

                            <br/>+233 55 174 7839</p>
                    </div>
                    <div>

        </footer>
        </div>
</body>

</html>