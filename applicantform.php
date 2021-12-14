<?php 

    if (isset($_POST['register'])) {

        $title = $_POST['title'];
        $fname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $othername = $_POST['oname'];
        $gender = $_POST['gender'];;
        $dob = $_POST['DOB'];
        $tob = $_POST['tob'];
        $country = $_POST['country'];
        $nationality = $_POST['nationality'];
        $height = $_POST['height'];
        $eye_colour = $_POST['eyecolour'];
        $hair_colour = $_POST['haircolour'];
        $marital_status = $_POST['marital_status'];
        $profession = $_POST['profession'];
        $telephone = $_POST['tele'];
        $email = $_POST['email'];
        $Birth_Cert = $_POST['birth'];
        $Date_Issued = $_POST['doi'];
        $Place_Issued = $_POST['poi'];
        
        // print_r($_POST);
    
        // getting user input and validating
    
        require 'database_credentials.php';
        // connect to database
        $conn = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE);
    
    
        $sql = "INSERT INTO applicant (Title, fname, lname, other_name, gender, dob, town_of_birth, country, height_metres, 
            eye_colour, hair_colour, nationality, marital_status, profession, telephone, email, birth_certificate_number, 
            date_of_issue, place_of_issue) values ('$title', '$fname', '$lastname', '$othername', '$gender', '$dob', '$tob', '$country', '$height', 
            '$eye_colour', '$hair_colour', '$nationality', '$marital_status', '$profession','$telephone', '$email', '$Birth_Cert', '$Date_Issued', '$Place_Issued')";


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
    <link rel="stylesheet" href="applicantformcss.css">
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
                    <a class="nav-link active" href="applicantform.php">Form</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="appointment.php">Appointment</a>
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


<body >
    <div class="containerr">
        <div class="wrapper">

            <!-- form content-->
            <form class = "form"  method="POST" name="myform">
                <h2 class="text-uppercase">Applicant Passport Form</h2>

                <!-- Title-->
                <div class="mb-3"> <label>Title</label>
                    <select name="title" id="title">
                    <option value="Mr">Mr</option>
                    <option value="Mrs">Mrs</option>
                    <option value="Ms">Ms</option>
                    </select>
                </div>

                <!-- first name, last name and other names-->
                <div class="row">
                    <div class="col-sm-6 mb-3"> <label>First Name</label> <input type="text" name="fname" id="fname" class="input-field"> </div>
                    <div class="col-sm-6 mb-3"> <label>Last Name</label> <input type="text" name="lname" id="lname" class="input-field"> </div>
                    <div class="col-sm-6 mb-3"> <label>Other Name</label> <input type="text" name="oname" id="oname" class="input-field"> </div>
                </div>

                <!-- Gender-->
                <div class="row">
                    <div class="col-sm-6 mb-3"> <label>Gender</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="M">
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="F">
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                    </div>
                </div>

                <!-- DOB and TOB-->
                <div>
                    <div class="mb-3"> <label>Date of Birth</label> <input type="date" class="input-field" name="DOB" id="DOB"> </div>
                    <div class="mb-3"> <label>Town of Birth</label> <input type="text" class="input-field" name="tob" id="tob"> </div>
                </div>
                

                <!-- Country name and Nationality-->
                <div class="row">
                    <div class="col-sm-6 mb-3"> <label>Country</label> <input type="text" name="country" id="country" class="input-field"> </div>
                    <div class="col-sm-6 mb-3"> <label>Nationality</label> <input type="text" name="nationality" id="nationality" class="input-field"> </div>
                </div>

                <!-- height, eye colour, and hair colour -->
                <div class="row">
                    <div class="col-sm-6 mb-3"> <label>Height(metres)</label> <input type="decimal" name="height" id="height" min='0' step = "0.01" class="input-field"> </div>
                    <div class="col-sm-6 mb-3"> <label>Eye Colour</label> <input type="text" name="eyecolour" id="eyecolour" class="input-field"> </div>
                    <div class="col-sm-6 mb-3"> <label>Hair Colour</label> <input type="text" name="haircolour" id="haircolour" class="input-field"> </div>
                </div>                

                <!-- marital status and profession-->
                <div class="row">
                    <div class="mb-3"> <label>Select Marital Status</label>
                        <select name="marital_status" id="marital_status">
                        <option value="Married">Married</option>
                        <option value="Divorced">Divorced</option>
                        <option value="Single">Single</option>
                        <option value="Widower">Widower</option>
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3"> <label>Profession</label> <input type="text" name="profession" id="profession" class="input-field"> </div>
                </div>

                
                <!--telephone and email-->
                <div class="row">
                    <div class="col-sm-6 mb-3"> <label>Telephone</label> <input type="number" name="tele" id="tele" class="input-field"> </div>
                    <div class="col-sm-6 mb-3"> <label>Email</label> <input type="email" name="email" id="email" class="input-field"> </div>
                </div>
                
                <!--birth certificate, date of issue, and place of issue -->
                <div class="row">
                    <div class="col-sm-6 mb-3"> <label>Birth Certificate ID</label> <input type="number" name="birth" id="birth" class="input-field"> </div>
                    <div class="col-sm-6 mb-3"> <label>Date of Issue</label> <input type="date" name="doi" id="doi" class="input-field"> </div>
                    <div class="col-sm-6 mb-3"> <label>Place of Issue</label> <input type="text" name="poi" id="poi" class="input-field"> </div>
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