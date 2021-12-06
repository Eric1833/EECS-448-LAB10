<html>

    <head>
        <link rel="stylesheet" href="../style.css">
    </head>


        
    <body>
	<nav>
            <a class="nav" href="../index.html">Home</a> |
        </nav>
        <form action="ViewUserPosts.php" method="post" id="usrform">
            <label for="user_id">User:</label>

            <select name="user_id" id="user_id">
            <?php
                $mysqli = new mysqli("mysql.eecs.ku.edu", "c354l536", "aij9daiv", "c354l536");
                if ($mysqli->connect_error){
                    printf('Connection failed %s\n', $mysqli->connect_error);
                    exit();
                }
                $query = "SELECT user_id from Users";
                $result = $mysqli->query($query);

                while ($row = $result->fetch_assoc()){
                    echo "<option value ='" . $row["user_id"] . "'>" . $row["user_id"] . "</option>";
                }
                $mysqli->close();
            ?>
            </select> 
            <button type="submit">Search Posts</button>
        </form>
    </body>
</html>