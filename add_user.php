<?php
include('connection.php');
include('classes/User.php');

$user = new User($_POST);

$sql = "INSERT INTO `users` (`name`, `age`, `birthdate`, `gender`, `email`, `mobile`, `address`, `qualification`, `employmentstatus`)
    VALUES ('$user->name', '$user->age', '$user->birth_date', '$user->gender', '$user->email', '$user->mobile', '$user->address', '$user->qualification', '$user->employment_status');
";

$query = mysqli_query($connection_user_db, $sql);
$lastId = mysqli_insert_id($connection_user_db);

if ($query == true) {
    $users = array(
        'status' => 'true',
    );

    echo json_encode($users);
} else {
    $users = array(
        'status' => 'false',
    );

    echo json_encode($users);
}
?>