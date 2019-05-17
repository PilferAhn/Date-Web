<?php
	
	function getUserInfo($email)
	{
		$db = mysqli_connect('localhost', 'root', '', 'cap');

		$query = "SELECT * FROM users WHERE email = '$email'";
		
		$result = mysqli_query($db, $query);

		$array = mysqli_fetch_assoc($result);		

		return $array;
	}


?> 


