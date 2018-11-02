<!DOCTYPE html>
<head>
<title>Palaute</title>
</head>
<body>
<?php
if (isset($_POST['submit'])) {
  $to = 'maria.niku@finlit.fi';
  $from = $_POST['email'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $subject = 'Palautetta Lönnrot-julkaisualustasta';
  $message = $_POST['message'];

  $headers = 'From: ' . $from;
  mail($to,$subject,$message,$headers);
  echo 'Palaute lähetetty onnistuneesti, kiitos!',

}
?>
<form action="" method="post">
  Etunimi: <input type="text" name="first_name"><br>
  Sukunimi: <input type="text" name="last_name"><br>
  Sähköposti: <input type="text" name="email"><br>
  Viesti: <br><textarea rows="5" name="message" cols="30"></textarea><br>
  <input type="submit" name="submit" value="Lähetä">
</form>

</body>
</html>
