<?php

$full_name = $_POST['full_name'];
$email = $_POST['email'];
$gender = $_POST['gender'];


$errors = array();


if (empty($full_name)) {
  $errors[] = "Full name is required.";
}


if (empty($email)) {
  $errors[] = "Email address is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errors[] = "Invalid email address.";
}


if (empty($gender)) {
  $errors[] = "Gender is required.";
}


if (!empty($errors)) {
  foreach ($errors as $error) {
    echo "<p>Error: $error</p>";
  }
  exit;
}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_registration";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO students (FullName, Email, Gender) VALUES ('$full_name', '$email', '$gender')";

if ($conn->query($sql) === TRUE) {
  echo "<p>Registration successful!</p>";
} else {
  echo "<p>Error: " . $conn->error . "</p>";
}


$conn->close();
?>
