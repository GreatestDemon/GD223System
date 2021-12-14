<?php
if (isset($_POST['signup'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    
    // print_r($_POST);
} 

// getting user input and validating
$fname = "";
$lastname = "";
$email = "";
$psword = "";
$psword_repeat = "";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>   
<body>
<?php
require 'database_credentials.php';
// connect to database
$conn = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);

//checking if a student has already regisbtered and inserting user input to database
$check_email = mysqli_query(
    $conn,
    "SELECT  * FROM register where fname= '$fname'  AND lastname = '$lastname'   AND email = '$email'"
);
// var_dump($check_email);
if (mysqli_num_rows($check_email) > 0) {
    //echo "<script LANGUAGE='JavaScript'>
    //window.alert('You've already registered);
    //window.location.href='index.php';
    //</script>";
    header("location: login.php");
} else {
    $sql = "INSERT INTO register(fname, lastname, email, psword, psword_repeat) Values('$fname','$lastname','$email','$psword', '$psword_repeat')";
    $results = mysqli_query($conn, $sql);
    if ($results) {
       // echo "<script LANGUAGE='JavaScript'>
        //window.alert('You have successfully registered';
        //window.location.href='index.php';
        //</script>";
        header("location: login.php");
    }

}

?>
     
</body>
</html>

