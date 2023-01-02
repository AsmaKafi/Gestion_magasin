<?php 
include ("db.php");
$id=$_GET['id'];

  $sql = "DELETE FROM categorie  WHERE `id` = ".$id;

  
if (mysqli_query($conn, $sql)) {
	echo "<script>window.location.href='gestion_categorie.php?message=suppression avec succes'</script>";
  
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

 ?>