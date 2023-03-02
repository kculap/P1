<?php
include("template_zaglavlje_korisnicko.html");
include("pdo.php");
?>
<body>

<div style="margin-left: 350px;margin-right:400px; padding:16px;" align="center" >

<div class="row medium-10 large-8 columns" style="color:white; ">
<h2>Recepti, savjeti i zanimljivosti...</h2>

<div class=tekstovi style="color:white;">
<?php 
    $query = $db->query("SELECT * FROM recepti ORDER BY datum DESC;");
    $blogovi = $query->fetchAll();

    foreach($blogovi as $blog){
        echo "<div class=\"row medium-10 large-8 columns\">";
        echo "<a href=\"recept.php?id=".$blog["id"]."\">".$blog["naslov"]."</a></div>";
    }

?>
</div>

<?php
include("template_podnozje.html");
?>
