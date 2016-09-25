<?php

	include "Utilities/connector.php";

	$row;
	$id;
	$result;
	$conn = request_connection();
	$section_data = array();
	
	$stmt = mysqli_prepare($conn, "SELECT idSubsection,image_file_path, video_file_path,title,text
		FROM subsection, section_image, section_video,section_additional_text 
		WHERE 'subsection.section_idSection' = ?
		AND 'section_image.section_idSection' = ?
		AND 'section_additional_text.section_idSection' = ?
		AND 'section_video.section_idSection' = ?");
	
	if($_GET["id"])
	{
		$id = $_GET["id"];
		mysqli_stmt_bind_param($stmt, 'dddd', $id, $id, $id, $id);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		
		if(!$result)
		{
			echo 'MySQL Error: ' . mysqli_error($conn);
			exit;
		}
		
		while($row = mysqli_fetch_assoc($result))
		{
			$section_data[] = $row;
		}
		print json_encode($section_data,JSON_UNESCAPED_UNICODE);
		close_connection($conn);
	}


?>