<?php 

include '../dbconnect.php';

if ($_REQUEST) {

	$contenttitle = $_REQUEST['name'];
	$content = $_REQUEST['content'];
	$assignment = $_REQUEST['assignment'];

	//Check for the Same PROPOSAL Registration
	$multiCheck = mysqli_query($coninfo,"SELECT * FROM content WHERE title='" . $contenttitle . "'");
	if (count(mysqli_fetch_assoc($multiCheck)) > 0) {
		mysqli_close($coninfo);
		header('Location: http://localhost/proposalgen/admin/index.php');
	}
	else {
		$query = "INSERT INTO content (TITLE, CONTENT, ASSIGNMENT) VALUES ('".$contenttitle."','".$content."','".$assignment."')";
		mysqli_query($coninfo, $query);
		header('Location: http://localhost/proposalgen/admin/single-content-editor.php');
	}
}

?>