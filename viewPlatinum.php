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
/* Your CSS styles from the original code */
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
		<a href="login.php" style=" font-size: 40px; color:black; text-decoration:none;"><i class="fa fa-arrow-circle-left" aria-hidden="true" style="color:#4070f4"></i></i></a>
	</div>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				
				<div class="row">
					<div class="col-sm-6">
						<h2>View <b>All Platinum</b></h2>
					</div>
					
				</div>
			</div>
			
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Full Name</th>
						<th>Email</th>
            <th>View Profile</th>
						<th>Phone</th>
						<th>Role</th>
						<th>Matric ID</th>
					</tr>
				</thead>
				<tbody>
					<?php
					include 'database.php';
					$query = "SELECT * FROM users WHERE role='Platinum'";
					$mysqliquery = mysqli_query($conn, $query);
					while ($result = mysqli_fetch_assoc($mysqliquery)) {
						?>
						<tr>
							<td><?php echo $result['name']; ?></td>
							<td><?php echo $result['email']; ?></td>
              <td><a href="viewAllUserProfile.php?id=<?php echo $result['id']; ?>" class="btn btn-info">View Profile</a></td>
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

<!-- Add User Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="insert.php">
				<div class="modal-header">						
					<h4 class="modal-title">Add User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Full Name</label>
						<input type="text" name="name" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" name="phone" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Role</label>
						<select name="role" class="form-control" required>
							<option value="CRMP">CRMP</option>
							<option value="Platinum" selected>Platinum</option>
							<option value="Staff">Staff</option>
							<option value="Mentor">Mentor</option>
						</select>
					</div>
					<div class="form-group">
						<label>Matric ID</label>
						<input type="text" name="matric" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control" required>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" name="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>
