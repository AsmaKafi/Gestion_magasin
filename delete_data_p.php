<?php 
include ("db.php");
$id=$_GET['id'];

  $sql = "DELETE FROM produit  WHERE `id_produit` = ".$id;

  
if (mysqli_query($conn, $sql)) {
	echo "<script>window.location.href='gestion_produit.php?message=suppression avec succes'</script>";
  
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

 ?>