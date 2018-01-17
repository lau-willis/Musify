<?php 
include "includes/includedFiles.php";
?>

<h1 class="pageHeadingBig">You Might Also Like</h1>

<div class="gridViewContainer">
	<?php 
		$albumQuery = mysqli_query($con, "SELECT * FROM albums ORDER BY RAND() LIMIT 10");

		while($row = mysqli_fetch_assoc($albumQuery)){
			$albumTitle = $row['title'];
			$artworkPath = $row['artworkPath'];
			$albumId = $row['id'];
			
			echo "<div class='gridViewItem'>
					<span role='link' tabindex='0' onclick='openPage(\"album.php?id=$albumId\")'>
						<img src='$artworkPath'>
						<div class='gridViewInfo'>
							$albumTitle 
						</div>
					</span>
				  </div>";
		}
	?>
</div>

    					
