<?php
include ("../dao/Connection_bd.php");


class  index_modelo{
    /* Member variables */
    var $id;
    var $email;
    var $pass;
    var $name;
    var $ap;
    var $am;
    var $tel; 
	
    /* Member functions */

    function setEmail($id){
      $this->id = $id;
    }


    function setEmail($Email){
       $this->email = $Email;
    }
    
	function getEmail(){
       return $this->email;
    }

	function setPass($Pass){
       $this->pass= $Pass;
    }
    function getPass(){
       return $this->pass;   
    }
	
	 function setName($Name){
       $this->name= $Name;
    }
    function getName(){
       return $this->name;   
    }
	
    function setAp($Ap){
       $this->ap= $Ap;
    }
    function getAp(){
       return $this->ap;   
    }
	
	  function setAm($Am){
       $this->am=$Am;
    }
    function getAm(){
       return $this->am;   
    }
	
    function setTel($Tel){
       $this->tel= $Tel;
    }
    function getTel(){
       return $this->tel;   
    }

	public function register_Modelo(){
		$conexion = new Connection_bd();
     	return $conexion->register_Bd($this->getEmail(),$this->getPass(),$this->getName(),$this->getAp(),$this->getAm(),$this->getTel());
	}

}

?>