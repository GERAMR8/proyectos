<?php

error_reporting(E_ALL);
include_once("AccesoDatos.php");
include_once("Usuario.php");



class Cliente extends Usuario{

private $nnumcontrol=0;
private $ncvearea=0;

   
	function setNumControl($pnValor){
       $this->nnumcontrol = $pnValor;
	}
   
	function getNumControl(){
       return $this->nnumcontrol;
	}
   
	function setCveArea($pnValor){
       $this->ncvearea = $pnValor;
	}
   
	function getCveArea(){
       return $this->ncvearea;
	}
   

	function buscar(){
	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$arrRS=null;
	$bRet = false;
	
		if ($this->sCveUsu==0)
			throw new Exception("Cliente->buscar(): faltan datos");
		else{
			if ($oAccesoDatos->conectar()){

		 		$sQuery = "SELECT t1.sNombre, t1.sApePat, t1.sApeMat, 
							t1.sContrasenia, t2.nnumcontrol
							FROM usuario t1, cliente t2
							WHERE t1.sCveUsuario = '".$this->sCveUsu."' 
							AND t2.sCveUsuario = t1.sCveUsuario;";
				$arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
				$oAccesoDatos->desconectar();
				if ($arrRS){
					$this->sNombre = $arrRS[0][0];
					$this->sApePat = $arrRS[0][1];
					$this->sApeMat = $arrRS[0][2];
					$this->sContrasenia = $arrRS[0][3];
					$this->nnumcontrol = $arrRS[0][4];
					
					
					$bRet = true;
				}
			} 
		}
		return $bRet;
	}
	
	function insertar(){
	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$nAfectados=-1;
		if ($this->sCveUsu=="" || $this->sContrasenia == "" || $this->sNombre == "")
			throw new Exception("Cliente->insertar(): faltan datos");
		else{
			if ($oAccesoDatos->conectar()){
		 		$sQuery = parent::getInsertar();
				$sQuery = $sQuery."
					INSERT INTO cliente ( nnumcontrol, ncvearea, sCveUsuario) 
					VALUES (".$this->nnumcontrol.",".$this->ncvearea.",".$this->sCveUsu.");";
                   error_log($sQuery,0);    
				$nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
				$oAccesoDatos->desconectar();		
			}
		}
		return $nAfectados;
	}
	
	/*Modificar, regresa el número de registros modificados*/
	function modificar(){
	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$nAfectados=-1;
		if ($this->sCveUsu=="" || $this->sContrasenia == "" || $this->sNombre == "")
			throw new Exception("Cliente->modificar(): faltan datos");
		else{
			if ($oAccesoDatos->conectar()){
				
		 		$sQuery = parent::getModificar();
				$sQuery = $sQuery."
					UPDATE cliente
					SET	nnumcontrol = ".$this->nnumcontrol.", 
					ncvearea=".$this->ncvearea."
					WHERE sCveUsuario = '".$this->sCveUsu."';";
					error_log($sQuery,0); 
				$nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
				$oAccesoDatos->desconectar();
			}
		}
		return $nAfectados;
	}
	
	/*Borrar, regresa el número de registros eliminados*/
	function borrar(){
	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$nAfectados=-1;
		if ($this->sCveUsu=="")
			throw new Exception("Cliente->borrar(): faltan datos");
		else{
			if ($oAccesoDatos->conectar()){
				
				$sQuery = "DELETE FROM cliente WHERE sCveUsuario = '".$this->sCveUsu."'; ";
		 		$sQuery = $sQuery." ".parent::getBorrar();
				$nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
				$oAccesoDatos->desconectar();
			}
		}
		return $nAfectados;
	}
	
	/*Busca todos los clientees, regresa nulos si no hay información o 
	  un arreglo de clientes*/
	function buscarTodos(){
	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$arrRS=null;
	$arrClientes = null;
	$arrLinea=null;
	$j=0;
	$oClie=null;
		if ($oAccesoDatos->conectar()){
		 	$sQuery = "SELECT t1.sCveUsuario, t1.sContrasenia, t1.sNombre, t1.sApePat, 
						t1.sApeMat, t2.nnumcontrol, t2.ncvearea
						FROM usuario t1, cliente t2
						WHERE t2.sCveUsuario = t1.sCveUsuario
						ORDER BY t1.sCveUsuario";
			$arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
			$oAccesoDatos->desconectar();
			if ($arrRS){
				foreach($arrRS as $arrLinea){
					$oClie = new Cliente();
					$oClie->setClave($arrLinea[0]);
					$oClie->setPwd($arrLinea[1]);
					$oClie->setNombre($arrLinea[2]);
					$oClie->setApePat($arrLinea[3]);
					$oClie->setApeMat($arrLinea[4]);
					$oClie->setNumControl($arrLinea[5]);
					$oClie->setCveArea($arrLinea[6]);
            		$arrClientes[$j] = $oClie;
					$j=$j+1;
                }
			}
        }
		return $arrClientes;
	}
 }
 ?>