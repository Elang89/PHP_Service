<?php
	
	//Database user connection, set with UTF-8 to allow accented characters
	function request_connection()
	{
		$server = "localhost";
		$user = "AMCareerUser";
		$password = "S{ZT,J)nzsAm";
		$database = "AMCareerDB";
		$conn = mysqli_connect($server, $user, $password, $database);
		mysqli_query($conn,"SET NAMES 'utf8'");
		
		if(!$conn->errno)
		{
			return $conn;
		}			
		return;
	}
	
	//Closes database connection, call this when finished using connection
	function close_connection($conn)
	{
		mysqli_close($conn);
	}
?>