<?php
	include_once('dbh.php');

	if(isset($_GET['edit']) )
	{
		$id = $_GET['edit'];
		$res= mysqli_query($conn,"SELECT * FROM article WHERE a_id=$id");
		$row= mysqli_fetch_array($res);
	}

	if( isset($_GET['a_id']) )
	{
		$newText = $_GET['a_text'];
		$a_id 	 = $_GET['a_id'];
		$sql     = "UPDATE article SET a_text='$newText' WHERE a_id=$a_id";
		$res 	 = mysqli_query($conn,$sql)
                                    or die("Could not update".mysqli_error($conn));
		echo "<meta http-equiv='refresh' content='0;url=index.php'>";
	}

	if( isset($_GET['a_id']) )
	{
		$newTitle = $_GET['a_title'];
		$a_id 	 = $_GET['a_id'];
		$sql     = "UPDATE article SET a_title='$newTitle' WHERE a_id=$a_id";
		$res 	 = mysqli_query($conn,$sql)
                                    or die("Could not update".mysqli_error($conn));
		echo "<meta http-equiv='refresh' content='0;url=index.php'>";
	}
?>
<form action="edit.php" method="GET">
Title: <textarea cols="40" rows="8"  name="a_title"><?php echo $row[1];?></textarea>
<input type="hidden" name="a_id" value="<?php echo $row[0];?>">

NameText: <textarea cols="40" rows="8" name="a_text"><?php echo $row[2];?></textarea>
<input type="hidden" name="a_id" value="<?php echo $row[0];?>">
<input type="submit" value=" Update "/>
</form>
<?
