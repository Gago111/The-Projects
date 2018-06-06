<?php

 if (isset($_POST['submit'])) {
   $file = $_FILES['file'];

  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];

 $fileExt = explode('.', $fileName);
 $fileActualExt = strtolower(end($fileExt));

$allowed = array('jpg', 'jpeg', 'png', 'pdf', 'PDF', 'gif', 'doc', 'docx', 'xlsx' );

if (in_array($fileActualExt, $allowed)) {
 if ($fileError === 0) {
  if ($fileSize < 1000000) {
    $fileNameNew = uniqid('', true).".".$fileActualExt;
     switch($fileActualExt) {

     case "jpg":
     case "png":

      $fileDestination = '/var/www/html2/Portal/uploads/images/'.$fileNameNew;
    break;


     case "doc":
     case "docx":
     case "xlsx":
     case "PDF":
     case "pdf":
      $fileDestination = '/var/www/html2/Portal/uploads/documents/'.$fileNameNew;
    break;


      $fileDestination = '/var/www/html2/Portal/uploads/allfiles/'.$fileNameNew;
    case "doc":
    case "docx":
    case "jpg":
    case "png":


 break;


 //$fileDestination = 'uploads/allfiles/'.$fileNameNew;
//break;


  default: $fileDestination = 'uploads/unsorted/'.$fileNameNew;
  break;


}
      move_uploaded_file($fileTmpName, $fileDestination);
      header("Location: index.php?uploadsucces");

    /*move_uploaded_file($fileTmpName, $fileDestination);
    header("Location: doc.php?uploadsucces");*/
 } else {
echo "Your file is too big!";
 }

 } else {
 echo "There was an error uploading your file!";
 }

 } else {
echo "You cannot upload files of this type!";
 }

}

?>
