<?php 
	include "includes/config.php";
    include "includes/classes/Artist.php";
    include "includes/classes/Album.php";
    include "includes/classes/Song.php";

	if(isset($_SESSION['userLoggedIn'])){
		$userLoggedIn = $_SESSION['userLoggedIn'];
	}else{
		header("Location: register.php");
	}

?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Musify</title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
    	<div id="mainContainer">
    		<div id="topContainer">
    			<?php include "includes/navBarContainer.php"; ?>
    			<div id="mainViewContainer">
    				<div id="mainContent">