<!DOCTYPE html>
<html lang="en">

<head>

    <title>View Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <h2>Users</h2>
        <table class="table">

            <head>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Acton</th>
                </tr>
                </thread>
                <tbody>
                    <?php
                    include "config.php";
                                                    // users table name
                    $sql = "SELECT *FROM users";

                    $result = $conn->query($sql);
                    ?>

                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?php echo $row['id']; ?> </td>
                                <td><?php echo $row['firstname']; ?> </td>
                                <td><?php echo $row['lastname']; ?> </td>
                                <td><?php echo $row['email']; ?> </td>
                                <td><?php echo $row['gender']; ?> </td>
                                <td><a class="btn btn-outline-primary" href="update.php?id=<?php echo $row['id']; ?>"> Edit</a>&nbsp;
                                    <a class="btn btn-outline-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                            </tr>
                    <?php }
                    }
                    ?>
                </tbody>
            </head>
        </table>
    </div>
</body>

</html>