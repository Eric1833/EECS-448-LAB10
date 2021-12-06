<html>
    <head>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <form action="DeletePosts.php" method="post" id="usrform">
            <?php
                $mysqli = new mysqli("mysql.eecs.ku.edu", "c354l536", "aij9daiv", "c354l536");
                if ($mysqli->connect_error){
                    printf('Connection failed %s\n', $mysqli->connect_error);
                    exit();
                }
                $query = "SELECT post_id, content, author_id from Posts";
                $result = $mysqli->query($query);

                echo "<table style='border: 1px solid black; width: 100%'>";
                echo "<tr>";
                echo "<td >" . "Post" . "</td>";
                echo "<td >" . "Author" . "</td>";
                echo "<td >" . "Delete?" . "</td>";
                echo "</tr>";
                if ($result->num_rows > 0){
                    while ($row = $result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td >" . $row["content"] . "</td>";
                        echo "<td >" . $row["author_id"] . "</td>";
                        echo "<td ><input type='checkbox' name='" . $row["post_id"] . "'></td>";
                        echo "</tr>";
                    }
                }
                echo "</table>";

                $mysqli->close();
            ?>

            <button type="submit">Delete</button>
        </form>
    </body>
</html>