<?php
include('connection.php');

$user_id = $_POST['id'];
$sql = "DELETE FROM users WHERE id='$user_id'";
$delQuery =mysqli_query($connection_user_db,$sql);
if($delQuery==true)
{
	 $users = array(
        'status'=>'success',
    );

    echo json_encode($users);
}
else
{
     $users = array(
        'status'=>'failed',
    );

    echo json_encode($users);
}
?>
