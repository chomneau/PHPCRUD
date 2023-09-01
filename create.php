<?php
    include('connection_db.php');

// create or insert data to table
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $first_name =  $_REQUEST['firstName'];
    $last_name = $_REQUEST['lastName'];
    $gender =  $_REQUEST['gender'];
    $dob = $_REQUEST['dob'];
    

    $sql = "INSERT INTO students (firstName, lastName, gender, dob)
    VALUES ('$first_name', '$last_name', '$gender', '$dob')";

    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
// read or rethrive data to display in table of HTML
    $tasks = [];
    $sql = "SELECT * FROM students";
    
    $result = mysqli_query($conn, $sql);
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){

            $tasks[] = $row;
           
        }
    }else{
        echo "No data";
    }

    // foreach($tasks as $task){
    //     echo $task['firstName'];
    // }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>


<!-- insert data form -->

<div class="container">
        <div class="row">

        

        <form class="row g-3" action="create.php" method="POST">
            <div class="col-md-12">
                <label for="firstname" class="form-label">first name</label>
                <input type="text" name="firstName" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-12">
                <label for="lastname" class="form-label">last name</label>
                <input type="text" name="lastName" class="form-control" id="inputPassword4">
            </div>
            
            
            <div class="col-md-6">
                <label for="gender" class="form-label">Gender</label>
                <select id="gender" name="gender" class="form-select">
                    <option selected>Choose...</option>
                    <option value="male">male</option>
                    <option value="female">female</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="dob" class="form-label">date of birth</label>
                <input type="date" name="dob" class="form-control" id="dob">
            </div>
            
            <div class="col-12">
                <button type="submit" class="btn btn-primary">submit</button>
            </div>
        </form>
        </div>
    

<!-- end of form -->
    <div class="row">
    
    <?php include('flashMessage.php'); ?>

    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Gender</th>
        <th scope="col">DOB</th>
        <th scope="col">Action</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach($tasks as $task): ?>
        <tr>
            <td><?php echo $task['id']; ?></td>
            <th scope="row"><?php echo $task['firstName']; ?></th>
            <td><?php echo $task['lastName']; ?></td>
            <td><?php echo $task['gender']; ?></td>
            <td><?php echo $task['dob']; ?></td>
            <td>
                <span><a href=""><i class="bi bi-eye"></i> Read</a></span>
                <span><a href="edit.php?id=<?php echo $task['id']; ?>"><i class="bi bi-pencil-square"></i>Edit</a></span>
                <span><a href="delete.php?id=<?php echo $task['id']; ?>" onclick="return confirm('Are you sure you want to delete this record?')"<i class="bi bi-trash3"></i> Delete</a></span>
                
            </td>

        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
    </div>
    </div>
    

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
</body>
</html>