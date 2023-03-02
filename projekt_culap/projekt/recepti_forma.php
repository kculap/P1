<?php
include("template_zaglavlje_administracijsko.html");
include("session.php");
include("pdo.php");
?>
 
<div class="row">
<div class="medium-12 large-12 columns">

<?php 
 if(isset($_POST["submit"])){
     if(isset($_GET["uredi"])) {
        $query = $db->prepare("UPDATE recepti SET naslov = ?, datum = ?, tekst_posta = ? WHERE id = ?");
        $novi_blog = $query->execute([$_POST["naslov"], $_POST["datum"], $_POST["tekst"], $_GET["uredi"]]);
        if($query->rowCount() > 0) {
            echo "<h3>Uspješno ažuriran blog post s id-em ".$_GET["uredi"];
        }else {
            echo "<h3>Nije moguće ažurirati dokument s id-em ".$_GET["uredi"];
        }
     }else {
        $query = $db->prepare("INSERT INTO recepti (naslov, datum, tekst_posta) VALUES (?, ?, ?)");
        $novi_blog = $query->execute([$_POST["naslov"], $_POST["datum"], $_POST["tekst"]]);
     }
 }
?>


<form method="post" action="">
<?php 
     if(isset($_GET["uredi"])){
        $query = $db->query("SELECT * FROM recepti where id = ".$_GET['uredi'].";");
        $blog_post = $query->fetch();
        
        if($blog_post) {
            echo "Naslov teksta: <input type=\"text\" name=\"naslov\" value=\"".$blog_post["naslov"]."\"><br>";
            echo "Datum objave(u obliku YYYY-MM-DD): <input type=\"text\" name=\"datum\" value=\"".$blog_post["datum"]."\"> <br>";
            echo "Puni tekst: <br><textarea name=\"tekst\" rows=\"10\">".$blog_post["tekst_posta"]."</textarea>";
        }else {
            echo "Naslov teksta: <input type=\"text\" name=\"naslov\" value=\"\"><br>";
            echo "Datum objave(u obliku YYYY-MM-DD): <input type=\"text\" name=\"datum\" value=\"\"> <br>";
            echo "Puni tekst: <br><textarea name=\"tekst\" rows=\"10\"></textarea>";  
        }
     }else {
        echo "Naslov teksta: <input type=\"text\" name=\"naslov\" value=\"\"><br>";
        echo "Datum objave(u obliku YYYY-MM-DD): <input type=\"text\" name=\"datum\" value=\"\"> <br>";
        echo "Puni tekst: <br><textarea name=\"tekst\" rows=\"10\"></textarea>";
     } 
?>

<input type="submit" name="submit" value="Dodaj" class="btn">
</form>

<?php
include("template_podnozje.html");
?>
