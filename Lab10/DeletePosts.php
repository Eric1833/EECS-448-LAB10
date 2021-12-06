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

    $query = "SELECT post_id, content, author_id from Posts";
    $result = $mysqli->query($query);

    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            $delete = $_POST[$row["post_id"]];
            if ($delete == "on"){
                $query = "DELETE FROM Posts WHERE post_id='" . $row["post_id"] . "'";
                $deleted = $mysqli->query($query);
                echo "Post " . $row["post_id"] . " has been deleted.<br>";
            }
        }
    }
    $mysqli->close();
?>