<?php
// Fetch data from the database
$sql_query = "SELECT * FROM users ORDER BY id ASC;";

// Execute the query
$result = mysqli_query($connection_user_db, $sql_query);

// Check if there are any results
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        // Append the row to the data array
        $users[] = $row;
    }
} else {
    echo "0 results";
}

// Convert the data array to a JSON object
$users_json = json_encode($users);

// Close the connection
mysqli_close($connection_user_db);
?>
