<?php
// Include config file
require_once 'dbconn.php';

// Define variables and initialize with empty values
$fname = $lastname = $email = $psword = '';
$fname_err = $lastname_err = $email_err = $psword_err =
    '';

// Processing form data when form is submitted
if (isset($_POST['submit'])) {
    // Get hidden input value
    $id = $_POST['id'];

    // Validate firstname
    // $input_fname = trim($_POST['fname']);
    // if (empty($input_fname)) {
    //     $name_err = 'Please enter a first name.';
    // } elseif (
    //     !filter_var($input_fname, FILTER_VALIDATE_REGEXP, [
    //         'options' => ['regexp' => '/^[a-zA-Z\s]+$/'],
    //     ])
    // ) {
    //     $fname_err = 'Please enter a first valid name.';
    // } else {
    //     $fname = $input_fname;
    // }

    // Validate lastname
    // $input_lname = trim($_POST['lastname']);
    // if (empty($input_lname)) {
    //     $lname_err = 'Please enter a last name.';
    // } elseif (
    //     !filter_var($input_lname, FILTER_VALIDATE_REGEXP, [
    //         'options' => ['regexp' => '/^[a-zA-Z\s]+$/'],
    //     ])
    // ) {
    //     $lastname_err = 'Please enter a valid last name.';
    // } else {
    //     $lastname = $input_lname;
    // }

    // Validate address address
    // $input_email = trim($_POST['email']);
    // if (empty($input_email)) {
    //     $address_err = 'Please enter an email address.';
    // } else {
    //     $email = $input_email;
    // }


    // Check input errors before inserting in database
    // if (
    //     empty($fname_err) &&
    //     empty($lastname_err) &&
    //     empty($email_err) &&
    //     empty($psword)
    // ) {
        // Prepare an update statement
    $sql ='UPDATE `register` SET `fname`=?,`lastname`=?,`email`=?,`psword`=?,` WHERE `id`=?';

    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters

        // Set parameters
        $param_fname = $fname;
        $param_lname = $lname;
        $param_email = $email;
        $param_psword = $psword;
        

        mysqli_stmt_bind_param(
            $stmt,
            'sssisssi',
            $param_fname,
            $param_lname,
            $param_email,
            $param_psword
        );

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Records updated successfully. Redirect to landing page
            header('location: view.php');
            exit();
        } else {
            echo 'Oops! Something went wrong. Please try again later.';
        // }
    }

    // Close statement
    mysqli_stmt_close($stmt);
}

    // Close connection
    mysqli_close($link);
} else {
    // Check existence of id parameter before processing further
    if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
        // Get URL parameter
        $id = trim($_GET['id']);

        // Prepare a select statement
        $sql = 'SELECT * FROM register WHERE `id` = ?';
        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, 'i', $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {
                    /* Fetch result row as an associative array. Since the result set
                     contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $fname = $row['fname'];
                    $lname = $row['lastname'];
                    $email = $row['email'];
                    $psword = $row['psword'];
                    
                } else {
                    // URL doesn't contain valid id. Redirect to error page
                    header('location: error.php');
                    exit();
                }
            } else {
                echo 'Oops! Something went wrong. Please try again later.';
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($link);
    } else {
        // URL doesn't contain id parameter. Redirect to error page
        header('location: error.php');
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update student registration table.</p>
                    <form action="" method="POST">
                        <div class="form-group">


                    <input type="hidden" name="id" value="<?php echo $_GET[
                        'id'
                    ]; ?>">
                        <!-- Edit box for first name-->
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="fname" class="form-control 
                            <?php echo !empty($fname_err)
                                ? 'is-invalid'
                                : ''; ?>" value="<?php echo $fname; ?>">
                            <span class="invalid-feedback"><?php echo $fname_err; ?></span>
                        </div>

                        <!-- Edit box for last name-->
                        <div class="form-group">
                            <label>last Name</label>
                            <input type="text" name="lastname" class="form-control 
                            <?php echo !empty($lname_err)
                                ? 'is-invalid'
                                : ''; ?>" value="<?php echo $lastname; ?>">
                            <span class="invalid-feedback"><?php echo $lastname_err; ?></span>
                        </div>

                        <!-- Edit box for email-->
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control 
                            <?php echo !empty($email_err)
                                ? 'is-invalid'
                                : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err; ?></span>
                        </div>
                        
                        <!-- Edit box for Password-->
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="psword" class="form-control 
                            <?php echo !empty($email_err)
                                ? 'is-invalid'
                                : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err; ?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" name = "submit" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
