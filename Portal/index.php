<?php
#$page = $_SERVER['PHP_SELF'];
#$sec = "30";
#header("Refresh: $sec; url=$page");


	session_start();

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<head>
<link href="https://fonts.googleapis.com/css?family=Spectral+SC" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="./style/style.css">


<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Online file storage </title>
</head>
<body>

<div id="notes">
<a href="search/index.php">Go to Notes</a>
</div>
<div id="img">
<img src="upload.png">
</div>

  <div id="container">
      <h1>Online File Storage</h1>

      <body>
			<form action="upload.php" method="POST" enctype="multipart/form-data">
			<input type="file" name="file" id="input"><br>
			<button type="submit"  id="upload" name="submit">UPLOAD</button>

             <?php



				 if (isset($_GET['uploadsucces']))
       {
            if (isset($_GET['location'])) {
            $location = $_GET['location'];

}
          else{

            $location = null;
            }

				  	$arr = array_diff(scandir('uploads'),["." , ".."]);
				  	foreach ($arr as $a)
				  	{
								$arr2 = scandir('uploads/'.$a);
                $arr2 = array_diff($arr2,["." , ".."]);
                if (count($arr2)==0) continue;
								$folder = $a;
                if ($location != null && $folder != $location) continue;
								foreach ($arr2 as $f) {

				          $file = "uploads/$folder/$f";
				          $fileName = explode('.', $f);
				          $fileActualExt = strtolower(end($fileName));


				echo "<br>";
								}
				    }
				}
				?>
	    <a class="btn" href="login.php">Logout</a>

  <fieldset>
  <div id="legend">
</div>
    <legend>Previousely uploaded files</legend>
  <ul id="menu">
        <li><a href="allfiles.php?uploadsucces">All files</a></li>
        <li><a href="doc.php?uploadsucces">Document</a></li>
        <li><a href="images.php?uploadsucces">Images</a></li>
        <li><a href="">Applications</a></li>


    </ul>

    <ul id="files">
    </ul>
</fieldset>

  </div>

		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>

				<h3 class="h3">
					<?php
						echo $_SESSION['success'];          // edit hier de you are now logged in//
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- de user info -->
		<?php  if (isset($_SESSION['username'])) : ?>
			<p class="p">Welcome <strong><?php echo $_SESSION['username']; ?></strong></p><p>
			<p> <a href="index.php?logout='1'" style="color: blue;"></a> </p>
		<?php endif ?>
	</div>

</body>
</html>
