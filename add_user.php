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
$query= mysqli_query($con,$sql);
$lastId = mysqli_insert_id($con);
if($query ==true)
{
   
    $data = array(
        'status'=>'true',
       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'false',
      
    );

    echo json_encode($data);
} 

?>