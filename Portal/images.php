<html>
<h1> images </h1>

           <?php

       if (isset($_GET['uploadsucces']))
     {
          if (isset($_GET['location'])) {
          $location = $_GET['location'];

}
        else{

          $location = null;
          }

          $arr = array_diff(scandir('/var/www/html2/Portal/uploads'),["." , ".."]);
          foreach ($arr as $a)
          {
              $arr2 = scandir('/var/www/html2/Portal/uploads/'.$a);
              $arr2 = array_diff($arr2,["." , ".."]);
              if (count($arr2)==0) continue;
              $folder = $a;
              if ($location != null && $folder != $location) continue;
              foreach ($arr2 as $f) {

                $file = "/var/www/html2/Portal/uploads/$folder/$f";
                $fileName = explode('.', $f);
                $fileActualExt = strtolower(end($fileName));


      echo "<br>";

                  if ($fileActualExt == "png" || $fileActualExt == "jpg") {
                  print_r("<img src=".$file." width=\"300\" /><br>");
                  }
              }
          }
      }
      ?>
