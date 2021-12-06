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

if ($mysqli->connect_errno) 
{
    printf("Connect failed: %s\n", $mysqli->connect_error); 
    exit();
}

$username = $_POST["username"];
$content = $_POST["content"];

$insert = "INSERT INTO Users (user_id) VALUES ('$username')";
$query = "SELECT * FROM Users WHERE user_id = '$username'";
$insertpost = "INSERT INTO Posts (author_id, content) VALUES ('$username', '$content')";


if($result = $mysqli->query($query))
{
    if($result->num_rows > 0)
    {
        if($content == "")
        {
            printf("Content empty!");
        }
        else
        {
            if($mysqli->query($insertpost))
            {
                printf("Success!");
            }
        }
        
    }
    else
    {
        printf("Not User found!");
    }
}

$mysqli->close();
?>