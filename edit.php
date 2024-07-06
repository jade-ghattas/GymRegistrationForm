<!-- Creating a form to edit the client's data -->
<?php 
//Creating variables that contain the connection details for the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "memberships";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);


$ID = "";
$firstname = "";
$lastname = "";
$email = "";
$birthday = "";
$gender = "";
$phone = "";
$address = "";
$creditcard = "";
$expirydate = "";
$cvv = "";
$membership = "";

$errorMessage = "";
$successMessage = "";

if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
    //GET Method which shows the client's data

    if ( !isset($_GET["ID"]) ) {
        header("location: /Form/ClientList.php");
        exit;
    }

    $ID = $_GET["ID"];

    // Read the row of the selected client from the database table
    $sql = "SELECT * FROM memberships WHERE ID=$ID";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: /Form/ClientList.php");
        exit;
    }

    $firstname = $row["FirstName"];
    $lastname = $row["LastName"];
    $email = $row["Email"];
    $birthday = $row["Birthday"];
    $gender = $row["Gender"];
    $phone = $row["PhoneNumber"];
    $address = $row["HomeAddress"];
    $creditcard = $row["CreditCardNumber"];
    $expirydate = $row["CCExpiryDate"];
    $cvv = $row["CVV"];
    $membership = $row["Membership"];
}
else {
    //POST Method to update the client's data

    $ID= $_POST["id"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $birthday = $_POST["birthday"];
    $gender = $_POST["gender"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $creditcard = $_POST["creditcard"];
    $expirydate = $_POST["expirydate"];
    $cvv = $_POST["cvv"];
    $membership = $_POST["membership"];

    do {
        //Creating error message if input fields are empty
        if ( empty($ID) || empty($firstname) || empty($lastname) || empty($email) || empty($birthday) || empty($gender) || empty($phone) || empty($address) || empty($creditcard) || empty($expirydate) || empty($cvv) || empty($membership) ) {
            $errorMessage = "All the fields are required";
            break;
        }
        
        //SQL code to update a client's information
        $sql = "UPDATE memberships " .
                "SET FirstName = '$firstname' , LastName = '$lastname' , Email ='$email' , Birthday = '$birthday', Gender = '$gender' , PhoneNumber = '$phone' , HomeAddress = '$address' , CreditCardNumber = '$creditcard' , CCExpiryDate = '$expirydate' , CVV = '$cvv' , Membership = '$membership' " .
                "WHERE ID = $ID";

        $result = $connection->query($sql);

        //Creating error message
        if (!$result) {
            $errorMessage = "Invalid query:" . $connection->error;
            break;
        }

        //Creating success message
        $successMessage = "Client updated successfully";

        header("location: /Form/ClientList.php");
        exit;

    } while (false);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
      <!-- This makes the webpage responsive. The webpage will automatically adjust to different device screen sizes and viewports. -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client List</title>
          <!-- Importing Boostrap CSS and Javascript libraries -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<!-- Creating the form -->
<body>
    <div class="container my-5">
        <h2>Edit Client</h2>

        <?php 
        //Creating error message
        if ( !empty($errorMessage) ) {
            echo"
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>

        <form method="post">
            <input type="hidden" name="id" value="<?php echo $ID; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">First Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="firstname" value="<?php echo $firstname; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Last Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="lastname" value="<?php echo $lastname; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Birthday</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="birthday" value="<?php echo $birthday; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Gender</label>
                <div class="col-sm-6">
                    <select class="form-select" name="gender" value="<?php echo $gender; ?>">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone Number</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Credit Card Number</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="creditcard" value="<?php echo $creditcard; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Credit Card Expiry Date (MMYY)</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="expirydate" value="<?php echo $expirydate; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">CVV</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="cvv" value="<?php echo $cvv; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Membership</label>
                <div class="col-sm-6">
                    <select class="form-select" name="membership" value="<?php echo $membership; ?>">
                    <option value="Monthly">Monthly (30$/month)</option>
                    <option value="SixMonths">6 Months (one-time payment of 159.99$)</option>
                    </select>
                </div>
            
            <?php 
            //Creating success message
            if ( !empty($successMessage) ) {
                echo"
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6> 
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>
            ";
            }
            ?>
            
            </div>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/Form/ClientList.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>