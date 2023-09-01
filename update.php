<?php
    include("connection_db.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];

        $first_name =  $_REQUEST['firstName'];
        $last_name = $_REQUEST['lastName'];
        $gender =  $_REQUEST['gender'];
        $dob = $_REQUEST['dob'];
    
        $sql = "UPDATE students SET firstName = '$first_name', lastName = '$last_name', gender='$gender', dob='$dob' WHERE id = $id";
    
        if ($conn->query($sql) === TRUE) {
            $_SESSION["flash_message"] = "User data updated successfully.";
        } else {
            $_SESSION["flash_message"] = "Error updating user data: " . $conn->error;
        }
    }
    
    $conn->close();

    header("Location: create.php");
    
    

?>