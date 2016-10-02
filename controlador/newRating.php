<?php if(!isset($_SESSION))
    session_start();

    if(isset($_GET)){ 

        include ("../dao/Connection_bd.php");
        $conexion = new Connection_bd;  
        $conn = $conexion->conection("localhost","root","","dietas");
        $now = date("Y-m-d H:i:s");

        // Update your score in DB
        if(isset($_SESSION['rates'][$_GET['diet']])){ 
            $rate_id = $_SESSION['rates'][$_GET['diet']]['id']; 
            $sql = "UPDATE dietasvaloracion 
                    SET valoracion = ".$_GET['rate'].", fecha = '".$now."'
                    WHERE idDietasValoracion = ".$rate_id;
            $conn -> query($sql);
            $_SESSION['rates'][$_GET['diet']]['rate'] = $_GET['rate'];
        }

        // or Insert your new score
        else{
            $sql = "INSERT INTO dietasvaloracion (Dietas_idDietas, valoracion, fecha ) 
                    VALUES (\"".$_GET['diet']."\", ".$_GET['rate'].", \"".$now."\")";
            $conn -> query($sql);
            $rate_id = $conn -> insert_id;    
            $_SESSION['rates'][$_GET['diet']] =  [
                "rate" => $_GET['rate'],
                "id"   => $rate_id
            ];          
        } 
        // print_r($_SESSION['rates']);
        $conn->close();
        
    }
?>