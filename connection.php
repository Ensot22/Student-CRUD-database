<?php
    // Database Connection. Rename the database name variable to match your database name.
    $db_name = 'techvoc';
    $connection_user_db  = mysqli_connect('localhost','root','', $db_name);

    if(mysqli_connect_errno()) {
        echo 'Database Connection Error';
    }
?>
