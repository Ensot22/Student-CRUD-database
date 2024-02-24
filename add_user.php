<?php
include('connection.php');
$username = $_POST['uname'];
$age = $_POST['age'];
$birthdate = $_POST['birthdate'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];
$qualification = $_POST['qualification'];
$employmentstatus = $_POST['employmentstatus'];
$id = $_POST['id'];

$sql = "UPDATE `users` SET  `name`='$name' , `age`= '$age', `birthdate`= '$birthdate',`gender`= '$gender', 
`email`= '$email', `mobile`='$mobile',  `address`='$address', `qualification`='$qualification', `employmentstatus`='$employmentstatus'
 WHERE id='$id' ";
$query= mysqli_query($connection_user_db,$sql);
$lastId = mysqli_insert_id($connection_user_db);
if($query ==true)
{
    $users = array(
        'status'=>'true',
    );

    echo json_encode($users);
}
else
{
    $users = array(
        'status'=>'false',
    );

    echo json_encode($users);
}
?>