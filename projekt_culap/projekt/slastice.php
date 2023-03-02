<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Katine slastice</title>
</head>
<body>

<?php
include("template_zaglavlje_korisnicko.html");
include("pdo.php");


$query = $db->query("SELECT * FROM slastice");
$rezultati = $query->fetchAll();

?>
<div class="serije">
<?php  
 
 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "projekt");  
 if(isset($_POST["dodaj"]))  
 {  
      if(isset($_SESSION["kosarica"]))  
      {  
           $item_array_id = array_column($_SESSION["kosarica"], "i_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["kosarica"]);  
                $item_array = array(  
                     'i_id'               =>     $_GET["id"],  
                     'naziv'              =>     $_POST["hidden_name"],  
                     'cijena'             =>     $_POST["hidden_price"],  
                     'kolicina'           =>     $_POST["quantity"]  
                );  
                $_SESSION["kosarica"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Ova slastica je već dodana!")</script>';  
                echo '<script>window.location="slastice.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'i_id'               =>     $_GET["id"],  
                'naziv'              =>     $_POST["hidden_name"],  
                'cijena'             =>     $_POST["hidden_price"],  
                'kolicina'           =>     $_POST["quantity"]  
           );  
           $_SESSION["kosarica"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["kosarica"] as $keys => $values)  
           {  
                if($values["i_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["kosarica"][$keys]);  
                     echo '<script>alert("😧😧 Izbrisano 😢😢 ")</script>';  
                     echo '<script>window.location="slastice.php"</script>';  
                }  
           }  
      }  
 }  
 ?>  

			

                <?php  
                $query = "SELECT * FROM slastice ORDER BY id ASC";  
                $result = mysqli_query($connect, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
                <div class="col-md-4">  
                     <form method="post" action="slastice.php?action=add&id=<?php echo $row["id"]; ?>">  
                          <div style="margin-left: 400px;margin-right:400px; background-color:#f1f1f1; padding:16px;" align="center">  
                               <img width= 600px; src="slike/<?php echo $row["slika"]; ?>" class="img-responsive" /><br />  
                               <h4 class="text-info"><?php echo $row["naziv"]; ?></h4>  
                               <h4 class="text-danger">kn <?php echo $row["cijena"]; ?></h4>  
                               <input type="text" name="quantity" class="form-control" value="1" />  
                               <input type="hidden" name="hidden_name" value="<?php echo $row["naziv"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["cijena"]; ?>" />  
                               <input type="submit" name="dodaj" style="margin-top:5px; border-radius: 100px; border-color:white;padding: 8px; width: 250px" class="btn" value="Dodaj u košaricu" />  
                          </div>  
                     </form>  
                </div>  
                <?php  
                     }  
                }  
                ?>   
                <br>  
                <h3>Ukupna cijena</h3>  
                <div class="table-responsive">  
                     <table style="width: 800px; margin-left: 400px;margin-right:400px; background-color:#f1f1f1; padding:16px;">  
                          <tr>  
                               <th width="40%">Naziv</th>  
                               <th width="10%">Količina</th>  
                               <th width="20%">Cijena</th>  
                               <th width="15%">Ukupno</th>  
                                
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["kosarica"]))  
                          {  
                               $ukupno = 0;  
                               foreach($_SESSION["kosarica"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["naziv"]; ?></td>  
                               <td><?php echo $values["kolicina"]; ?></td>  
                               <td><?php echo $values["cijena"]; ?>kn</td>  
                               <td><?php echo number_format($values["kolicina"] * $values["cijena"], 2); ?>kn</td>  
                               <td><a href="slastice.php?action=delete&id=<?php echo $values["i_id"]; ?>"><span class="text-danger">Obriši</span></a></td>  
                          </tr>  
                          <?php  
                                    $ukupno = $ukupno + ($values["kolicina"] * $values["cijena"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Ukupno</td>  
                               <td align="right"> <?php echo number_format($ukupno, 2); ?>kn</td>  
                               <td><a href="narudzba.php"><input type="submit" style="margin-top:5px; border-radius: 80px; border-color:white;padding: 8px; width: 200px" class="btn btn-success" value="Naruči" /></a></td> 
                               <br>
                                
                          </tr>  
                          
                          <?php  
                          }  
                          ?>  
                          
                     </table>  
                </div>  
           </div>  
           <br />  
           
      </body>  

	  <?php
include("template_podnozje.html");
?>
 </html>