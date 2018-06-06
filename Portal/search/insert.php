<?php
$link = mysqli_connect("localhost", "root", "raspberry", "search22");

if($link === false){
  die("ERROR: Could not connect. " . mysqli_connect_error());
}

$a_title = mysqli_real_escape_string($link, $_REQUEST['a_title']);
$a_text = mysqli_real_escape_string($link, $_REQUEST['a_text']);
$a_author = mysqli_real_escape_string($link, $_REQUEST['a_author']);
$a_date = mysqli_real_escape_string($link, $_REQUEST['a_date']);

$sql = "INSERT INTO article (a_title, a_text, a_author, a_date) VALUES ('$a_title', '$a_text', '$a_author', '$a_date')";

if(mysqli_query($link, $sql)){
  echo "Notes addded!.";

header("refresh:0.5; url=index.php");

}else{
  echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}

mysqli_close($link);


 ?>
