<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://fonts.googleapis.com/css?family=Pangolin" rel="stylesheet">
  <link rel="stylesheet" href="../search/style8.css">
<meta charset="UTF-8">
<title>Add Record Form</title>
</head>
<body>
<h1> Upload your Notes here </h1>
<div id=span3>
 <a href="../search/index.php"<span>&#9166;</span></a>
     </div>

<form action="../search/insert.php" method="post">
    <p>
        <label for="title"></label>
        <input type="text" name="a_title" placeholder="Title of document" id="title" required>
    </p>
    <p>
        <label for="text"></label>
        <textarea cols="10" rows="10" name="a_text" placeholder="Enter text..." id="text" required></textarea>
    </p>
    <p>
      <label for="author"></label>
      <input type="text" name="a_author" placeholder="Name.." id="author" required>
    <p>
        <label for="date"></label>
        <input type="date" name="a_date" id="date" required>
    </p>
    <input type="submit" value="Submit" id="submit">
</form>
</body>
</html>
