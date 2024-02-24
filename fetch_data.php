<?php include('connection.php');

$output= array();
$sql = " SELECT * FROM users ";

$totalQuery = mysqli_query($connection_user_db,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	0 => 'id',
	1 => 'name',
	2 => 'age',
	3 => 'birthdate',
	4 => 'gender',
	5 => 'email',
	6 => 'mobile',
	7 => 'address',
	8 => 'qualification',
	9 => 'employmentstatus',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE name like '%".$search_value."%'";
	$sql .= " OR age like '%".$search_value."%'";
	$sql .= " OR birthdate like '%".$search_value."%'";
	$sql .= " OR gender like '%".$search_value."%'";
	$sql .= " OR email like '%".$search_value."%'";
	$sql .= " OR mobile like '%".$search_value."%'";
	$sql .= " OR address like '%".$search_value."%'";
	$sql .= " OR qualification like '%".$search_value."%'";
	$sql .= " OR employmentstatus like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY id desc";
}

if($_POST['length'] != -1)
{
	$start = $_POST['start'];
	$length = $_POST['length'];
	$sql .= " LIMIT  ".$start.", ".$length;
}	

$query = mysqli_query($connection_user_db,$sql);
$count_rows = mysqli_num_rows($query);
$data = array();
while($row = mysqli_fetch_assoc($query))
{
	$sub_array = array();
	$sub_array[] = $row['id'];
	$sub_array[] = $row['name'];
	$sub_array[] = $row['age'];
	$sub_array[] = $row['gender'];
	$sub_array[] = $row['email'];
	$sub_array[] = $row['mobile'];
	$sub_array[] = $row['address'];	
	$sub_array[] = $row['birthdate'];
	$sub_array[] = $row['qualificaiton'];	
	$sub_array[] = $row['employmentstatus'];	
	$sub_array[] = '<a href="javascript:void();" data-id="'.$row['id'].'"  class="btn btn-info btn-sm editbtn" >Edit</a> 
	 <a href="javascript:void();" data-id="'.$row['id'].'"  class="btn btn-danger btn-sm deleteBtn" >Delete</a>';
	$data[] = $sub_array;
}

$output = array(
	'draw'=>intval($_POST['draw']),
	'recordsTotal'=>$count_rows ,
	'recordsFiltered'=>$total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);

?>