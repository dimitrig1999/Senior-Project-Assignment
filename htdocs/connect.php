<?php
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$email = $_POST["email"];
$phoneNumber = $_POST["phoneNumber"];
$text = $_POST["text"];


$conn = new mysqli("localhost","root","","customdrawingz");
if($conn->connect_error) {
    die('Connection Failed : '.conn->connect-error);
}else {
    $stmt = $conn->prepare("insert into contact(firstName, lastName, email, phoneNumber, text)
        values(?, ?, ?, ?, ?)");
    $stmt->bind_param("sssis",$firstName, $lastName, $email, $phoneNumber, $text);
    $stmt->execute();
    echo "Information Sent... You should recieve a response back within 48 hours.";
    $stmt->close();
    $conn->close();
}
?>