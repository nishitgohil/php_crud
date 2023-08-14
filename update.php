<?php
include "config.php";

if(isset($_POST['update'])) {
    $firstname = $_POST['firstname'];
    $user_id = $_POST['user_id'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];

    $sql = "UPDATE `users` SET `firstname` = '$firstname', `lastname`='$lastname', `email`='$email', `password`='$password', `gender`='$gender' WHERE `id`='$user_id'";

    $result = $conn->query($sql);

    if($result == TRUE) {
        echo "Record Update Successfully";
    }
    else {
        echo "Error:". $sql . "<br>" . $conn->error;
    }
}

if(isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $sql = "SELECT * FROM `users` WHERE `id`='$user_id'";

    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $first_name = $row['firstname'];
            $last_name = $row['lastname'];
            $email = $row['email'];
            $password = $row['password'];
            $gender = $row['gender'];
            $id = $row['id'];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body><center>
    <h2>User Update Form</h2>

    <form action="" method="POST">
        <fieldset>
            <legend>Personal Information:</legend>
            First Name:<br>
            <input type="text" name="firstname" value="<?php echo $first_name; ?>">
            <input type="hidden" name="user_id" value="<?php echo $id; ?>">
            <br>
            Last Name:<br>
            <input type="text" name="lastname" value="<?php echo $last_name; ?>">
            <br>
            Email:<br>
            <input type="email" name="email" value="<?php echo $email; ?>">
            <br>
            Password:<br>
            <input type="password" name="password" value="<?php echo $password; ?>">
            <br>
            Gender:<br>
            <input type="radio" name="gender" value="Male" <?php if($gender == 'Male') { echo "checked"; } ?>>Male
            <input type="radio" name="gender" value="Female" <?php if($gender == 'Female') { echo "checked"; } ?>>Female
            <br><br>
            <input type="submit" name="update" value="Update">
        </fieldset>
    </form>
</body><center>
</html>
