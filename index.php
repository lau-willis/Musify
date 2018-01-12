<?php include "includes/header.php";?>

<h1 class="pageHeadingBig">You Might Also Like</h1>

<div class="gridViewContainer">
	<?php 
		$albumQuery = mysqli_query($con, "SELECT * FROM albums ORDER BY RAND() LIMIT 10");

		while($row = mysqli_fetch_assoc($albumQuery)){
			$albumTitle = $row['title'];
			$artworkPath = $row['artworkPath'];
			$albumId = $row['id'];
			
			echo "<div class='gridViewItem'>
					<a href='album.php?id=$albumId'>
						<img src='$artworkPath'>
						<div class='gridViewInfo'>
							$albumTitle 
						</div>
					</a>
				  </div>";
		}
	?>
</div>

<?php include "includes/footer.php";?>

    					
