<?php
include "config.php";

if(isset($_POST['submit'])) {
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $gender = $_POST['gender'];

    // TODO: Add validation and sanitization for user inputs

    $sql = "INSERT INTO users (firstname, lastname, email, password, gender) VALUES ('$first_name', '$last_name', '$email', '$password', '$gender')";

    if($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
</head>
<body>
<div class="container">
    <h2>Signup Form</h2>

    <form action="" method="POST">
        <fieldset>
            <legend>Personal Information</legend>
            First Name:<br>
            <input type="text" name="firstname">
            <br>
            Last Name:<br>
            <input type="text" name="lastname">
            <br>
            Email:<br>
            <input type="email" name="email">
            <br>
            Password:<br>
            <input type="password" name="password">
            <br>
            Gender:<br>
            <input type="radio" name="gender" value="Male">Male
            <input type="radio" name="gender" value="Female">Female
            <br><br>
            <input type="submit" class="btn btn-outline-success" name="submit" value="Submit">

        </fieldset>
    </form>
    </div>
</body>
</html>
