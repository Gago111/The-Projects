<html>
<head>
</head>
<body>
  <form action="" method="POST">
    Your Email:<br /><input type="text" name="email" size="30" /><br />
    <input type="submit" name="submit" value="Submit"/>
  </form>

    <?php
    $email = $_POST['email'];
    $submit = $_POST['submit'];

    $db = mysqli_connect('localhost', 'root', 'admin50', 'registration');

    #mysql_select_db("registration", $connect);

    if ($submit) {

      $email_check = mysql_query("SELECT * FROM users WHERE email='".$email."'");
      $count = mysql_num_rows($email_check);

      if ($count != 0) {
        $random = rand(72891, 92729);
        $new_password = $random;

        $email_password = $new_password;

        $new_password = md5($new_password);

        mysql_query("update users set password='".$new_password."' WHERE email='".$email."'");

        $subject = "Login Information";
        $message = "Your password has been changed to $email_password";
        $from = "From: example@example.com";

        mail($email, $subject, $message, $from);
        echo "Your new password has been sent to you.";
      }
      else {
        echo "This email does not exist.";
      }
    }
     ?>
