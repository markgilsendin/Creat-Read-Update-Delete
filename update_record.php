<?php
	include 'include.php';
	
	$record_to_update=$_GET['id'];
	
	if(isset($_POST['submit'])){
		
		$stmtUpdate = $connection->prepare("UPDATE tbl_person SET name=?, address=?, email=? WHERE id=?");
		$stmtUpdate->bind_param("sssi",$stmtNameUpdate, $stmtAddressUpdate, $stmtEmailUpdate, $record_to_update);
		$stmtNameUpdate=$_POST['name'];
		$stmtAddressUpdate=$_POST['address'];
		$stmtEmailUpdate=$_POST['email'];

		
		$stmtUpdate->execute();
		header('Location:index.php');
		//echo $stmtNameUpdate;
		
	}

	if(isset($_GET['id'])){
		$record_to_update=$_GET['id'];
		$stmt = $connection->prepare("SELECT name,address,email FROM tbl_person WHERE id=?");
		$stmt->bind_param("i",$record_to_update);
		$stmt->bind_result($stmtName, $stmtAddress, $stmtEmail);
		$stmt->execute();
	}


?>

<body>

<div class="container">
	<div class="row">
		<p class="title-Add-Record">Update Record</p>
		<div class="col-lg-6 offset-lg-3">
			<form method="POST">
				<?php
					while($stmt->fetch()){
						echo"<div class='form-group'>";
						echo"<label for='inputName'>Name</label>";
						echo"	<input type='text' class='form-control' name='name' value='$stmtName'/>";
						echo"</div>";
						echo"<div class='form-group'>";
						echo"	<label for='inputAddress'>Address</label>";
						echo"	<input type='text' class='form-control' name='address' value='$stmtAddress'/>";
						echo"</div>";
						echo"<div class='form-group'>";
						echo"	<label for='inputEmail'>Email</label>";
						echo"	<input type='email' class='form-control' name='email' value='$stmtEmail'/>";	
						echo"</div>";
						
						echo"<div class='form-group'>";
						echo"	<input type='submit' name='submit' class='btn btn-primary' value='Update'/>";
						echo"</div>";
					}
				?>	
			</form>
		</div>	
	</div>
</div>	

</body>
