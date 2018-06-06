<?php
 include_once('dbh.php');

if(isset($_GET['delete']) )
{
  $id = $_GET['delete'];
  $sql = "DELETE FROM article WHERE a_id = $id";
}
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

header("refresh:0.5; url=index.php");

$conn->close();


 ?>
