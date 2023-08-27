<?php
$insert = false;
if(isset($_POST['First_Name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $First_Name = $_POST['First_Name'];
    $Middle_Name = $_POST['Middle_Name'];
    $Last_Name = $_POST['Last_Name'];
    $Age = $_POST['Age'];
    $email = $_POST['email'];
    $Phone = $_POST['Phone'];
    $Address = $_POST['Address'];
    $sql = "INSERT INTO `Mohshin`.`Mohshin` (`First_Name`,`Middle_Name`,`Last_Name`, `Age`, `Email`, `Phone`, `Address`, `date`) VALUES ('$First_Name','$Middle_Name','$Last_Name', '$Age', '$email', '$Phone', '$Address', current_timestamp());";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submition for School</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="index.php" method="post">
        <h1>Mohshin Mansuri</h1>
        <h2>Welcomes You</h2>
<?php
        if($insert == true){
        echo "<p class='submitMsg' style='color:white;'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
    ?>
            <input type="text" name="First_Name" id="First_Name" placeholder="Enter your First_name" class="red">
            <input type="text" name="Middle_Name" id="Middle_Name" placeholder="Enter your Middle_name" class="red">
            <input type="text" name="Last_Name" id="Last_Name" placeholder="Enter your Last_name" class="red">
            <input type="text" name="Age" id="Age" placeholder="Enter your Age" class="red">
            <input type="email" name="email" id="Email" placeholder="Enter your email" class="red">
            <input type="number" name="Phone" id="Phone" placeholder="Enter your phone" class="red">
            <input type="text" name="Address" id="Address" placeholder="Enter your Address" class="red">
            <button class="btn">Submit</button> 
        </form>
</body>
</html>