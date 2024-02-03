<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        *{
            background-color: #FCF6F5;
        }
        .restart {
            width: 50px;
            height: 50px;
            position: fixed;
            top: 20px;
            left: 16px;
            cursor: pointer;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .remove-btn {
            cursor: pointer;
            background-color: #ff6347;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="send-back">
        <img 
            class="restart"
            onclick="redirectTo('index.html')"
            src="restart.svg"
        />
    </div>
    <br>
    <br>
    <h1>Admin Dashboard - Applications</h1>

    <?php
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "CA";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Process removal if 'id' parameter is present in the URL
    if(isset($_GET['id'])){
        $idToRemove = $_GET['id'];
        
        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("DELETE FROM application WHERE id = ?");
        $stmt->bind_param("i", $idToRemove);

        // Execute the statement
        $stmt->execute();

        // Close the statement
        $stmt->close();
    }

    // Fetch data from the application table
    $sql = "SELECT * FROM application";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display the table header
        echo "<table><tr><th>ID</th><th>Name</th><th>Surname</th><th>Phone Number</th><th>Email</th><th>Age</th><th>Gender</th><th>Training</th><th>Group</th><th>Schedule</th><th>Action</th></tr>";

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["emri"] . "</td>
                    <td>" . $row["mbiemri"] . "</td>
                    <td>" . $row["numri_telefonit"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["mosha"] . "</td>
                    <td>" . $row["gjinia"] . "</td>
                    <td>" . $row["trajnimii"] . "</td>
                    <td>" . $row["grupi"] . "</td>
                    <td>" . $row["oraret"] . "</td>
                    <td><button class='remove-btn' onclick='removeEntry(" . $row["id"] . ")'>Remove</button></td>
                  </tr>";
        }

        // Close the table
        echo "</table>";
    } else {
        echo "No applications found.";
    }

    // Close the connection
    $conn->close();
    ?>

    <script>
        function redirectTo(page) {
            window.location.href = page;
        }

        function removeEntry(id) {
            if (confirm("Are you sure you want to remove this entry?")) {
                // Reload the page with 'id' parameter for removal processing
                window.location.href = 'welcome.php?id=' + id;
            }s
        }
    </script>
</body>
</html>
