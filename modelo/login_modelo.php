<?php
include ("../dao/Connection_bd.php");


class  login_modelo{
    /* Member variables */
    var $id;
    var $name; 
    var $apPat;
    var $apMat;
    var $email;
    var $pass;
    
    /* Member functions */
    function setId($id){
        $this->id = $id;
    } 

    function setName($name){
        $this->name = $name;
    } 

    function setApPat($apPat){
        $this->apPat = $apPat;
    } 

    function setApMat($apMat){
        $this->apMat = $apMat;
    } 

    function setEmail($Email){
        $this->email = $Email;
    } 

	function setPass($Pass){
        $this->pass= $Pass;
    }

    function getId(){
        return $this->id;
    }

     function getName(){
        return $this->name;
    }

    function getApPat(){
        return $this->apPat;
    }

    function getApMat(){
        return $this->apMat;
    }

    function getEmail(){
        return $this->email;
    }

    function getPass(){
        return $this->pass;
    }

	function login_Modelo(){
		$conexion = new Connection_bd();
     	return $conexion->login_Query($this->getEmail(),$this->getPass());
	}

}

?>
