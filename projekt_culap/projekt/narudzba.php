<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css" >
	<title>Prijava</title>
</head>
<?php
include("template_zaglavlje_korisnicko.html");

include("pdo.php");
?>
<body>


<div style="margin-left: 350px;margin-right:400px; padding:16px;" align="center" >
        <br><h2 style="color:white;margin-left: 250px;margin-right:400px;  ">Narudžba</h2><br>
<form method="post" action="">

<div class="ime">
Ime:<br>
<input name="ime" type="text"><br>

Prezime:<br>
<input name="prezime" type="text"><br>



Email:<br>
<input name="email" type="text"><br>

Broj mobitela:<br>
<input name="mobitel" type="text"><br>

Poruka:<br>
<textarea name="poruka" type="text"></textarea><br>


<input type="submit" name="submit" class="btn" value="Pošalji" style="background-color:grey; margin-top:5px; border-radius: 100px; border-color:white;padding: 8px; width: 250px">


<?php 
$con=mysqli_connect("localhost","root","","projekt") or die(mysqli_error());
if((isset($_POST['submit'])))
{
$Ime = $con->real_escape_string($_POST['ime']); 
$Prezime = $con->real_escape_string($_POST['prezime']);
$Email= $con->real_escape_string($_POST['email']);
$Mobitel = $con->real_escape_string($_POST['mobitel']);
$Poruka = $con->real_escape_string($_POST['poruka']);

$sql="INSERT INTO narudzba (ime, prezime, email, mobitel, poruka) VALUES ('".$Ime."','".$Prezime."', '".$Email."', '".$Mobitel."', '".$Poruka."')";

if(!$result = $con->query($sql)){
die('Error occured [' . $conn->error . ']');
}
else
   echo "Uskoro ćemo Vam se javiti!";
}
?>

