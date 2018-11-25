<?php
$servername = "localhost";
$database = "rario";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'];
$lastname = $_POST['lastname'];
$surname = $_POST['surname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$list = $_POST['list'];
$message = $_POST['message'];

$sql = "INSERT INTO `clients` (first_name,last_name,middle_name,email,phone) VALUES ('$name','$lastname','$surname','$email','$phone')";
if (mysqli_query($conn, $sql)) {
    $select_query = "SELECT MAX(id) FROM `clients`";
    $result = mysqli_query($conn,$select_query);
    $row = mysqli_fetch_row($result);
    $id = $row[0];
    $date = date("d.m.y");
    $sql = "INSERT INTO `application` (service,application_text,data_create,status,client) 
          VALUES ('$list','$message', '$date', 'Поступила', $id)";
    if (mysqli_query($conn,$sql)){

    }
    else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

