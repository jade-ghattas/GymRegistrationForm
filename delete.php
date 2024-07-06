<!-- SQL code to delete a client from MySQL database table and from ClientList table -->
<?php 

if ( isset($_GET["ID"]) ) {
    $ID = $_GET["ID"];

//Creating variables that contain the connection details for the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "memberships";

    //Create connection
    $connection = new mysqli($servername, $username, $password, $database);
    
    //SQL code to delete client using the client's ID number
    $sql = "DELETE FROM memberships WHERE ID=$ID";
    $connection->query($sql);
}

header("location: /Form/ClientList.php");
exit;

?>