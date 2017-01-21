<?php
	include 'include.php';

	$stmt = $connection->prepare("SELECT id, name, address, email FROM tbl_person");
	$stmt->execute();
	$stmt->bind_result($stmtId, $stmtName, $stmtAddress, $stmtEmail);
	
?>

<body>
<div class="container">
	<div class="row">
		<div class="view-container">
			<div align="center">
				<h1>CREATE READ UPDATE DELETE RECORDS</h1>
				<h5>| MySQL | PHP | BOOTSTRAP | HTML5 | CSS | </h5>
			</div>
			<div align="right">
				<a href="add_record.php" class="btn btn-primary btn-Add">Add New Record</a>
			</div>	
			<div class="table-responsive">
				<table class="table custom-table">
					<thead class="thead-inverse">
					<tr>
						<th id='th-name'>Name</th>
						<th id='th-address'>Address</th>
						<th id='th-email'>Email</th>
						<th id='th-manage'>Manage</th>
					</tr>
					</thead>
					
					<tbody>
						<?php
							while($stmt->fetch())
							{
								echo"<tr>";
									echo"<td>$stmtName</td>";
									echo"<td>$stmtAddress</td>";
									echo"<td>$stmtEmail</td>";
									echo"
									<td class='custom-td'>
									<a href='update_record.php?id=$stmtId' class='btn btn-outline-primary btn-update'>
									<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>
									</a>
									<a href='delete_record.php?id=$stmtId'  class='btn btn-outline-danger btn-delete'>
									<span class='glyphicon glyphicon-trash' aria-hidden='true'></span>	
									</a>
									</td>	
										";
								echo"</tr>";
								
							}
							
							$stmt->close();
							$connection->close();
						?>
					</tbody>
				</table>
			</div>	
		</div>	
	</div>
</div>

</body>
