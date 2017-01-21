<?php
	include 'include.php';

	$record_to_delete=$_GET['id'];

	$stmt = $connection->prepare("DELETE FROM tbl_person WHERE id=?");
	$stmt->bind_param("i",$record_to_delete);
	$stmt->execute();
	$stmt->close();
	$connection->close();
	header('Location:index.php');
?>