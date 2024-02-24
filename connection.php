<?php
    $connection_user_db  = mysqli_connect('localhost','root','','users');

    if(mysqli_connect_errno()) {
        echo 'Database Connection Error';
    }
?>
