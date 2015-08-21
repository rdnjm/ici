<?php
	$link = mysqli_connect("127.0.0.1", "root", "toor", "employeemasterfile") or die("Error " . mysqli_error($link));

	function conString($query){
		$link = mysqli_connect("127.0.0.1", "root", "toor", "employeemasterfile") or die("Error " . mysqli_error($link));
		$result = $link->query($query);
		return $result;
	}
?>