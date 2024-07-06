<!-- This php code will process our submitted registration form data and save it into MySQL -->
<?php
//The POST superglobals will collect the values of the input fields
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

//Creating variables that contain the connection details for the database
$host = "localhost";
$dbname = "memberships";
$username = "root";
$password = "";

//Creating connection with database
$conn = mysqli_connect(hostname: $host, 
                username: $username, 
                password: $password, 
                database: $dbname);

//Creating connection error message in case of error
if (mysqli_connect_error()) {
    die("Connection error:" . mysqli_connect_error());
}

//Inserting input data into database table
$sql = "INSERT INTO memberships (FirstName, LastName, Email, Birthday, Gender, PhoneNumber, HomeAddress, CreditCardNumber, CCExpiryDate, CVV, Membership)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

//Catching syntax errors in SQL
if ( ! mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}

//Binds variables to the previously prepared statement as parameters. Useful against SQL injections
mysqli_stmt_bind_param($stmt, "sssssssssss",
                        $firstname,
                        $lastname,
                        $email,
                        $birthday,
                        $gender,
                        $phone,
                        $address,
                        $creditcard,
                        $expirydate,
                        $cvv,
                        $membership);

mysqli_stmt_execute($stmt);

//Printing success message 
echo "Thank you! Your information was saved."

?>