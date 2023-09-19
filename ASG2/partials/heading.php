<?php
//Preliminary connection solving
$hostname = "localhost";
$username = "root";
$password = "";
$database = "sunib_library";

$config = mysqli_connect($hostname, $username, $password, $database);
if (mysqli_connect_errno()) {
    var_dump($config);
    throw new Exception("An error occurred when connecting to the database: " . mysqli_connect_error());
}

$stmt = mysqli_stmt_init($config);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUNIB Library</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <img src="logo.png" id="logo-img" alt="SuNiB">
        <ul>
            <a href="index.php">
                <li>Search</li>
            </a>
            <a href="insert.php">
                <li>Insert Books</li>
            </a>
            <a href="update.php">
                <li>Edit Books</li>
            </a>
        </ul>
    </nav>