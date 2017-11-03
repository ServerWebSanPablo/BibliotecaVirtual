<?php
	ini_set('display_errors', true);
        error_reporting(E_ALL);
	echo "Hola";	
	$fichero_subido="../libros/eltunel.pdf";
	echo '<pre>';
        if (move_uploaded_file($_FILES['libro']['tmp_name'], $fichero_subido)) {
                echo "El libro es válido y se subió con éxito.\n";
        } else {
                echo "Fallo la subida.\n";
        }
        print "</pre>";
	$fichero_subidoP = "../portadas/eltu.jpg";
        echo '<pre>';
        if (move_uploaded_file($_FILES['portada']['tmp_name'], $fichero_subidoP)) {
                echo "La imagen es válida y se subió con éxito.\n";
        } else {
            echo "Fallo la subida.\n";
        }

?>
