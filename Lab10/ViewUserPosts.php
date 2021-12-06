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
    echo $user . "'s Posts:<br>";

    $query = "SELECT content from Posts WHERE author_id='$user' ";
    $result = $mysqli->query($query);

    echo "<table>";
    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td style='border: 1px solid black'>" . $row["content"] . "</td>";
            echo "</tr>";
        }
    }
    echo "</table>";


    $mysqli->close();
?>