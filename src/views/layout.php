<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logogamepad.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/all.min.css">
    <title>Gamepad</title>
</head>

<?php
    session_start();
    $display1 = isset($_SESSION["username"]) ? "none" : "block";
    $display2 = isset($_SESSION["username"]) ? "block" : "none";
    if(isset($_SESSION['username'])) {
        $username = $_SESSION["username"];
    }
?>
<body>
    
</body>
</html>