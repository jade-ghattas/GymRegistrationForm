<!-- Creating a table which shows a list of registered clients' information saved in MySQL table to enable us to edit and delete clients -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
      <!-- This makes the webpage responsive. The webpage will automatically adjust to different device screen sizes and viewports. -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client List</title>
      <!-- Importing Boostrap CSS library -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<!-- Creating table -->
<body>
    <div class="container my-5">
    <h2>Client List</h2>
    <br>
    <table class="table table-hover table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Birthday</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Credit Card Number</th>
                <th>CC Expiry Date</th>
                <th>CVV</th>
                <th>Membership</th>
                <th>Edit/Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //Creating variables that contain the connection details for the database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "memberships";

            //Create connection with database
            $connection = new mysqli($servername, $username, $password, $database);

            //Check connection and create error message
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            //Read all rows from the database table 
            $sql = "SELECT * FROM memberships";
            $result = $connection->query($sql);

            //Check if query has been executed correctly and create error message
            if (!$result) {
                die("Invalid query:" . $connection->error);
            }

            //Read the data from every row
            while($row = $result->fetch_assoc()) {
                echo "
            <tr>
                <td>$row[ID]</td>
                <td>$row[FirstName]</td>
                <td>$row[LastName]</td>
                <td>$row[Email]</td>
                <td>$row[Birthday]</td>
                <td>$row[Gender]</td>
                <td>$row[PhoneNumber]</td>
                <td>$row[HomeAddress]</td>
                <td>$row[CreditCardNumber]</td>
                <td>$row[CCExpiryDate]</td>
                <td>$row[CVV]</td>
                <td>$row[Membership]</td>
                <td>
                    <a class='btn btn-warning btn-sm d-flex m-1' href='/Form/edit.php?ID=$row[ID]'>Edit</a>
                    <a class='btn btn-danger btn-sm d-flex m-1' href='/Form/delete.php?ID=$row[ID]'>Delete</a>
                </td>
            </tr>
                ";
            }
            ?>

        </tbody>
    </table>
    </div>
</body>
</html>