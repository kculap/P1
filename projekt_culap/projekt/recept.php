<?php
include("template_zaglavlje_korisnicko.html");
include("pdo.php");
?>
<div class="row">
<div class="medium-12 large-12 columns">
<?php
    if(isset($_GET['id'])) {
        $query = $db->query("SELECT * FROM recepti where id = ".$_GET['id'].";");
        $blog_post = $query->fetch();

        if($blog_post){
            echo "<div class=\"row medium-10 large-8 columns\">";
            echo "<h2>".$blog_post["naslov"]."</h2>";
            echo "</div>";
            echo "<div class=\"row medium-10 large-8 columns\">";
            echo "<h2>".$blog_post["tekst_posta"]."</h2>";
            echo "</div>";
        }else {
            echo "<div class=\"row medium-10 large-8 columns\">";
            echo "<h2>Članak ne postoji</h2>";
            echo "</div>";
        }       

    }else {
        echo "<div class=\"row medium-10 large-8 columns\">";
        echo "<h2>Niste odabrali članak</h2>";
        echo "</div>";
    }
?>

<div class="row medium-10 large-8 columns" style="text-align:center">
<a href="recepti.php" style="background-color:grey; margin-top:5px; border-radius: 100px; border-color:white;padding: 8px; width: 250px" >&lt;&lt; povratak </a></div>

<?php
include("template_podnozje.html");
?>
