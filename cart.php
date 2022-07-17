<?php session_start(); 

	if(isset($_SESSION['carrito'])){
		$carrito_mio=$_SESSION['carrito'];
		if(isset($_POST['titulo'])){
			$titulo=$_POST['titulo'];
			$precio=$_POST['precio'];
			$cantidad=$_POST['cantidad'];
			$tamaño=$_POST['tamaño'];
			$toste=$_POST['toste'];
			$num=0;
			if($tamaño == "pequeña"){
				$precio = 1000;
				$carrito_mio[]=array("titulo"=>$titulo,"precio"=>$precio,"cantidad"=>$cantidad, "tamaño"=>$tamaño, "toste"=>$toste);
			}else if($tamaño == "mediana"){
				$precio = 2000;
				$carrito_mio[]=array("titulo"=>$titulo,"precio"=>$precio,"cantidad"=>$cantidad, "tamaño"=>$tamaño, "toste"=>$toste);
			}else if($tamaño == "grande"){
				$precio = 3000;
				$carrito_mio[]=array("titulo"=>$titulo,"precio"=>$precio,"cantidad"=>$cantidad, "tamaño"=>$tamaño, "toste"=>$toste);
			}else{
				$precio = 4000;
				$carrito_mio[]=array("titulo"=>$titulo,"precio"=>$precio,"cantidad"=>$cantidad, "tamaño"=>$tamaño, "toste"=>$toste);
			}
     		
 		}
	}else{
		$titulo=$_POST['titulo'];
		$precio=$_POST['precio'];
		$cantidad=$_POST['cantidad'];
		$tamaño=$_POST['tamaño'];
		$toste=$_POST['toste'];
		if($tamaño == "pequeña"){
			$precio = 1000;
			$carrito_mio[]=array("titulo"=>$titulo,"precio"=>$precio,"cantidad"=>$cantidad, "tamaño"=>$tamaño, "toste"=>$toste);	
		}else if($tamaño == "mediana"){
			$precio = 2000;
			$carrito_mio[]=array("titulo"=>$titulo,"precio"=>$precio,"cantidad"=>$cantidad, "tamaño"=>$tamaño, "toste"=>$toste);	
		}else if($tamaño == "grande"){
			$precio = 3000;
			$carrito_mio[]=array("titulo"=>$titulo,"precio"=>$precio,"cantidad"=>$cantidad, "tamaño"=>$tamaño," toste"=>$toste);	
		}else{
			$precio = 4000;
			$carrito_mio[]=array("titulo"=>$titulo,"precio"=>$precio,"cantidad"=>$cantidad, "tamaño"=>$tamaño, "toste"=>$toste);	
		}
		
	}
	

$_SESSION['carrito']=$carrito_mio;


header("Location: ".$_SERVER['HTTP_REFERER']."");
?>



