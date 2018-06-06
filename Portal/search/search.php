<h1>search page</h1>

<div class="article-container">
<?php
	include '../search/header.php';

	if (isset($_POST["submit"])) {
		$search = mysqli_real_escape_string($conn, $_POST['search']);
		$sql = "SELECT * FROM article WHERE a_title LIKE '%$search%' OR a_text LIKE '%$search%' OR a_date LIKE '%$search%' OR a_author LIKE '%$search%'";
		$result = mysqli_query($conn, $sql);
		$queryResult = mysqli_num_rows($result);
		if ($queryResult > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<a href='../search/article.php?title=".$row['a_title']."&date=".$row['a_date']."'><div class='article-box'>";
					echo "<h3>".$row['a_title']."</h3>";
					echo "<p>".$row['a_text']."</p>";
					echo "<p>".$row['a_date']."</p>";
					echo "<p>".$row['a_author']."</p>";
				echo "</div></a>";
			}
		} else {
			echo "There are no articles.";
		}
	} else {
		echo "There are no results!";
	}
?>
</div>
