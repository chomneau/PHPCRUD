<?php
    include("connection_db.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM students WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        $_SESSION["flash_message"] = "Record deleted successfully.";
    } else {
        $_SESSION["flash_message"] = "Error deleting record: " . $conn->error;
    }
}

$conn->close();
//redirect to the page create after deleting data
header("Location: create.php");
exit();
?>
