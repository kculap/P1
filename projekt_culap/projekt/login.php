<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Prijava</title>
</head>
<body>
<?php
include("template_zaglavlje_korisnicko.html");
include("pdo.php");

if(isset($_POST["submit"])){

    $query=$db->prepare("
    SELECT * FROM administratori WHERE 
    korisnicko_ime = :korisnicko_ime
     AND lozinka = :lozinka
    ");
    
    $podaci = array(
        "korisnicko_ime" => $_POST["username"],
        "lozinka" => $_POST["pass"]
    );
    $query -> execute($podaci);
    $rezultati = $query->fetchAll();

    if(count($rezultati) > 0){
        session_start();
        $_SESSION["ulogiran"] = true;
        header("Location:slastice.php");
        exit;
    }else{
        echo  "Pogrešni pristupni podaci!";
    }

}

?>

<div style="margin-left: 350px;margin-right:400px; padding:16px;" align="center" >
        <br><h2 style="color:white;margin-left: 250px;margin-right:400px;  ">Prijava</h2><br>
<form method="post" action="">

<div class="ime">
Korisničko ime:<br>
<input name="username" type="text"><br>

Lozinka:<br>
<input name="pass" type="text"><br>
<div class="btn">
<input type="submit" name="submit" class="btn" value="Prijavi se" style="background-color:grey; margin-top:5px; border-radius: 100px; border-color:white;padding: 8px; width: 250px">
</div>
</form>
</div>
</div>

<?php
include("template_podnozje.html");
?>