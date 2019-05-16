<?
	
	function getUserInfo($email)
	{
		$db = mysqli_connect('localhost', 'root', '', 'cap');

		
		echo $email.'</br>';

		$query = "SELECT 'username' FROM users where email = $email";

		echo "ok.</br>";
		$result = mysqli_query($db, $query);

		$array = mysqli_fetch_assoc($result);
		
		return $array;
	}


?>


