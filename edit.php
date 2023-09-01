<?php
    include('connection_db.php');
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $sql = "SELECT * FROM students WHERE id = $id";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $studentData = $result->fetch_assoc();
        } else {
            echo "No user data found.";
        }
    } else {
        echo "No ID provided in the URL.";
    }

    $genderOptions = array("male", "female"); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>


<!-- insert data form -->

<div class="container">
    <h3>Update Student Record</h3>
        <div class="row">
        <form class="row g-3" action="update.php" method="POST">
            <div class="col-md-12">
                <input type="hidden" name="id" value="<?php echo $studentData['id']; ?>">
                <label for="firstname" class="form-label">first name</label>
                <input type="text" name="firstName" value="<?php echo $studentData['firstName']; ?>" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-12">
                <label for="lastname" class="form-label">last name</label>
                <input type="text" name="lastName" value="<?php echo $studentData['lastName']; ?>" class="form-control" id="inputPassword4">
            </div>
            
            
            <div class="col-md-6">
                <label for="gender" class="form-label">Gender</label>
                <select id="gender" name="gender" class="form-select">
                <?php foreach ($genderOptions as $option): ?>
                    <option value="<?php echo $option; ?>" <?php if ($studentData['gender'] === $option) echo 'selected'; ?> >
                        <?php echo $option; ?>
                    </option>
                <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="dob" class="form-label">date of birth</label>
                <input type="date" name="dob" value="<?php echo $studentData['dob']; ?>" class="form-control" id="dob">
            </div>
            
            <div class="col-12">
                <button type="submit" class="btn btn-primary">update</button>
            </div>
        </form>
        </div>
    

<!-- end of form -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>