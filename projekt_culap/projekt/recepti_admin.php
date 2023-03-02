<?php
include("template_zaglavlje_administracijsko.html");
include("session.php");
include("pdo.php");
?>

<div class="row medium-10 large-8 columns">
<h2></h2>

<?php 
    if(isset($_GET["obrisi"])){
        $query = $db->prepare("DELETE FROM recepti WHERE id = ?");
        $obrisano = $query->execute([$_GET["obrisi"]]);
        if($query->rowCount() > 0) {
            echo "<h3>Uspješno obrisan blog post s id-em ".$_GET["obrisi"];
        }else {
            echo "<h3>Nije moguće obrisati dokument s id-em".$_GET["obrisi"];
        }
    }
?>

</div>
<div class="row medium-10 large-8 columns" style="text-align:right">
<a href="recepti_forma.php">Novi post</a>
</div>
<div class="row medium-10 large-8 columns">
<table width="100%">
<?php 
    $query = $db->query("SELECT * FROM recepti ORDER BY datum DESC;");
    $blogovi = $query->fetchAll();

    foreach($blogovi as $blog){
        echo "<tr>";
        echo "<td>";
        echo "<a href=\"recepti_forma.php\">".$blog["naslov"]."</a>";
        echo "</td>";
        echo "<td style=\"text-align:right\"> <a href=\"recepti_forma.php?uredi=".$blog["id"]."\">uredi</a> | <a href=\"recepti_admin.php?obrisi=".$blog["id"]."\">pobriši</a></td>";
        echo "</tr>";
    }

?>

</table>
<?php
include("template_podnozje.html");
?>

