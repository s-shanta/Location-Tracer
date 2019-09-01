<?php


$lat = $_POST['latitude'];
$lon = $_POST['longitude'];

include 'config.php';
/*
$sql = "INSERT INTO user_table (firstname, lastname, address, phone, email, birthday, password) VALUES ('".$_POST["firstname"]."',
'".$_POST["lastname"]."','".$_POST["address"]."','".$_POST["phone"]."','".$_POST["email"]."','".$_POST["birthday"]."', '".$_POST["password"]."')";
*/
$sql = "INSERT INTO location_info (lat, lon) VALUES
('$lat','$lon')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close($conn);
header("Location: index.html");
exit;
?>