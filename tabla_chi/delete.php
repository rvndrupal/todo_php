<?php  
	$connect = mysqli_connect("localhost", "rodrigo", "rorro", "buscar_jquery"); 
	$sql = "DELETE FROM tbl_sample WHERE id = '".$_POST["id"]."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Registro Eliminado';  
	}  
 ?>