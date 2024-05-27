<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>InResearch</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
<link rel="stylesheet" href="style.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
/* ... (rest of your CSS styles) ... */
</style>
<script>
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>
</head>
<body>

<div class="crud">
	<a href="login.php" style=" font-size: 40px; color:black; text-decoration:none;"><i class="fa fa-arrow-circle-left" aria-hidden="true" style="color:#4070f4"></i></a>
</div>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>View <b>All Users</b></h2>
					</div>
				</div>
			</div>
			
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Full Name</th>
						<th>Email</th>
						<th>View Profile</th>
            <th>address</th>
						<th>Phone</th>
						<th>Role</th>
						<th>Matric ID</th>
					</tr>
				</thead>
				<tbody>
				<?php
				include 'database.php';
				$query = 'SELECT * FROM users';
				$mysqliquery = mysqli_query($conn, $query);
				while ($result = mysqli_fetch_assoc($mysqliquery)) {
					?>
					<tr>
						<td><?php echo $result['name']; ?></td>
						<td><?php echo $result['email']; ?></td>
						<td><a href="viewAllUserProfile.php?id=<?php echo $result['id']; ?>" class="btn btn-info">View Profile</a></td>
            <td><?php echo $result['address']; ?></td>
						<td><?php echo $result['phone']; ?></td>
						<td><?php echo $result['role']; ?></td>
						<td><?php echo $result['matric']; ?></td>
					</tr>
					<?php
				}
				?>
				</tbody>
			</table>
		</div>        
	</div>
</div>
</body>
</html>
