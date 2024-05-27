<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "inResearch";
$conn = mysqli_connect($server,$user,$password,$db);

if($conn){
    $id = $_POST['id'];
    $name =  $_POST['name'];
    $email =  $_POST['email'];
		$phone = $_POST['phone'];
    $role = $_POST['role'];
    $matric = $_POST['matric'];
    $password = $_POST['password'];
		echo "id" . $id . "";
    
    // Update query using prepared statement
    $sql = "UPDATE users SET name='$name', email='$email', phone='$phone', role='$role', matric='$matric', password='$password' WHERE id='$id'";
		if(mysqli_query($conn, $sql)){
			// Redirect to index.php after successful insertion
			header("Location: addUser.php");
			exit(); // Stop further execution
	} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}




?>


<!-- <div style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; text-align: center; font-size: 30px; position: relative; top: 150px;">
<a href="#editEmployeeModal" class="edit" data-toggle="modal">Click Here to Update<i class="material-icons" data-toggle="tooltip" title="Update">&#xE254;</i></a>
</div>							 -->

