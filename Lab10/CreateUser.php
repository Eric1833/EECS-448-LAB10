<html>
    <head>
        <link rel="stylesheet" href="../style.css">
    </head>

    <body>
        <nav>
            <a class="nav" href="../index.html">Home</a> |
        </nav>
<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "c354l536", "aij9daiv", "c354l536");
    if ($mysqli->connect_error){
        printf("Connection failed %s\n", $mysqli->connect_error);
        exit();
    }

    $user = $_POST["user_id"];

    if ($user == ""){
        echo "User was not created because the field was left empty";
        exit();
    }

    $query = "INSERT INTO Users (user_id) VALUES ('" . $user .  "')";
    if ($result = $mysqli->query($query)){
        echo "User created successfully";
    }
    else{
        echo "User was not created because " . $user . " is already taken";
    }
    $mysqli->close();
?>