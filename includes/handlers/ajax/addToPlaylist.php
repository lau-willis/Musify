<?php 
include "../../config.php";

if(isset($_POST['playlistId']) && isset($_POST['songId'])){
	$playlistId = $_POST['playlistId'];
	$songId = $_POST['songId'];

	$orderIdQuery = mysqli_query($con, "SELECT IFNULL(MAX(playlistOrder) + 1, 1) as playlistOrder FROM playlistsongs WHERE playlistId='$playlistId'");
	$row = mysqli_fetch_assoc($orderIdQuery);
	$order = $row['playlistOrder'];

	$query = mysqli_query($con, "INSERT INTO playlistsongs VALUES('', '$songId', '$playlistId', '$order')");
}else{
	echo "playlistid or songId was not passed into addToPlaylist.php";
}

?>

