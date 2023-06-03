<!DOCTYPE html>
<html>

<head>
    <title>List Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container my-5">
        <h2>List Student</h2>
        <a class="btn btn-primary" href="/create.php" role="button">Add New Student</a>

    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Address</th>
                <th>Telephone</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "student";


            //Create connection
            $connection = new mysqli($servername, $username, $password, $database);


            // check connection
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            //read all row from database table
            $sql = "SELECT * FROM studentlist ";
            $result = $connection->query($sql);

            if (!$result) {
                die("Invalid query: " . $connection->error);
            }

            //read data of each row 
            while ($row = $result->fetch_assoc()) {
                echo "  
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[name]</td>
                        <td>$row[age]</td>
                        <td>$row[address]</td>
                        <td>$row[telephone]</td>
                    </tr>
                ";
            }
            ?>
        </tbody>
    </table>
</body>

</html>