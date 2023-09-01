<?php
    include('connection_db.php');
    $tasks = [];
    $sql = "SELECT * FROM students";
    
    $result = $conn->query($sql);
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){

            $tasks[] = $row;
           
            // echo '<table>';
            //     echo '<tr>';
            //         echo '<td>'.$row['firstName']. '</td>';
            //         echo '<td>'.$row['lastName']. '</td>';
            //         echo '<td>'.$row['gender']. '</td>';
            //         echo '<td>'.$row['dob']. '</td>';
            //     echo '</tr>';
            // echo '</table>';
            
           
        }
    }

    // foreach($tasks as $task){
    //     echo "hello".$task->firstName;
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($tasks as $task): ?>
        <tr>
        <th scope="row"></th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
    

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
</body>
</html>
