<?php
	include '../search/header.php';
?>
<html>
<head>
<link rel="stylesheet" href="style5.css">
<body>

<form action="../search/search.php" method="POST">
	<input type="text" name="search" >
	<button type="submit" name="submit">Search</button>
	<div class="add">
  Upload Notes
</div>
	<div class="spanx">
		<a href="../search/add.php"<span>&#43;</span></a>
</div>
<div class="span3">
<a href="../index.php"<span>&#9166;</span></a>
</div>
</form>
<h1>Front page</h1>
<h2>All Notes:</h2>

<div class="article-container">
<?php
	$sql = "SELECT * FROM article";
	$result = mysqli_query($conn, $sql);
	$queryResult = mysqli_num_rows($result);
	if ($queryResult > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<div class='article-box'>";
				echo "<h3>".nl2br($row['a_title'])."</h3>";
				echo "<p>".nl2br($row['a_text']) ."</p>";
				echo "<p>".nl2br($row['a_date'])."</p>";
				echo "<p>".nl2br($row['a_author'])."</p>";

          echo "<a href='edit.php?edit=$row[a_id]'>edit</a><br />";
			echo "</div>";
       echo "<a href='delete.php?delete=$row[a_id]' onClick=\"return confirm('Are you sure you wanna delete this note?');\">delete</a><br />";
		}
	} else {
		echo "There are no notes.";
	}
?>

<?php
	include_once('dbh.php');

	if(isset($_POST['a_text']))
	{
	  $a_text = $_POST['a_text'];

	  if(mysqli_query($conn,"INSERT INTO article VALUES('','$a_text')"))
		echo "Successful Insertion!";
	  else
		echo "Please try again";
	}


	$res = mysqli_query($conn,"SELECT * FROM article ");


?>


<?php
	include_once('dbh.php');

	if(isset($_POST['a_title']))
	{
	  $a_text = $_POST['a_title'];

	  if(mysqli_query($conn,"INSERT INTO article VALUES('','$a_title')"))
		echo "Successful Insertion!";
	  else
		echo "Please try again";
	}


	$res = mysqli_query($conn,"SELECT * FROM article ");


?>


</div>

</body>
</html>
