<?php
	include 'include.php';

	if(isset($_POST['submit'])){
		$name=$_POST['name'];
		$address=$_POST['address'];
		$email=$_POST['email'];
		

		$stmt = $connection -> prepare("INSERT INTO tbl_person(name,address,email) VALUES(?,?,?)");
		$stmt -> bind_param("sss", $stmtName,$stmtAddress,$stmtEmail);
		$stmtName=$name;
		$stmtAddress=$address;
		$stmtEmail=$email;
		
		$stmt->execute();
		$stmt->close();
		$connection->close();
		header('Location:index.php');
	}


?>

<body>

<div class="container">
	<div class="row">
		<p class="title-Add-Record">Add New Record</p>
		<div class="col-lg-6 offset-lg-3">
			<form method="POST">
				<div class="form-group">
					<label for="inputName">Name</label>
					<input type="text" class="form-control" placeholder="Your Name" name="name"/>
				</div>
				<div class="form-group">
					<label for="inputAddress">Address</label>
					<input type="text" class="form-control" placeholder="Your Address" name="address"/>
				</div>
				<div class="form-group">
					<label for="inputEmail">Email</label>
					<input type="email" class="form-control" placeholder="Your Email" name="email"/>	
				</div>
				<div class="form-group">
					<button type="submit" name="submit" class="btn btn-primary"> <span class="glyphicon glyphicon-file" aria-hidden="true"></span> Save</button>
				</div>	
			</form>
		</div>	
	</div>
</div>	

</body>
