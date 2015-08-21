<?php
	$link = mysqli_connect("128.199.83.62", "user", "ici", "employeemasterfile") or die("Error " . mysqli_error($link));

	function conString($query){
		$link = mysqli_connect("128.199.83.62", "user", "ici", "employeemasterfile") or die("Error " . mysqli_error($link));
		$result = $link->query($query);
		return $result;
	}
?>