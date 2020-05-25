<?php

error_reporting(E_ALL);
include_once("AccesoDatos.php");


class Casa{

private $ncvecasa=0;
private $snombrecasa="";
private $ncuartos=0;	

   
	function setNcveCasa($pnValor){
       $this->ncveCasa = $pnValor;
	}
   
	function getNcveCasa(){
       return $this->ncveCasa;
	}
   
	function setSnombreCasa($pnValor){
       $this->snombrecasa = $pnValor;
	}
   
	function getSnombreCasa(){
       return $this->snombrecasa;
	}
   
   function setNCuartos($pnValor){
       $this->ncuartos = $pnValor;
	}
   
	function geNcuartos(){
       return $this->ncuartos;
	}

	function buscar(){
		$oAccesoDatos=new AccesoDatos();
		$sQuery="";
		$arrRS=null;
		$bRet = false;
		
			if ($this->ncvecasa==0)
				throw new Exception("Casa->buscar(): faltan datos");
			else{
				if ($oAccesoDatos->conectar()){
					 $sQuery = "SELECT snombrecasa, ncuartos
								FROM casa
								WHERE ncvecasa = '".$this->ncvecasa."'";
					$arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
					$oAccesoDatos->desconectar();
					if ($arrRS){
						$this->snombrecasa = $arrRS[0][0];
						$this->ncuartos = $arrRS[0][1];
						
						$bRet = true;
					}
				} 
			}
			return $bRet;
		}

	function buscarTodos(){
	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$arrRS=null;
	$arrCasas = null;
	$arrLinea=null;
	$j=0;
	$oClie=null;
		if ($oAccesoDatos->conectar()){
		 	$sQuery = "SELECT *	FROM casa
				    	ORDER BY ncvecasa";
			$arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
			$oAccesoDatos->desconectar();
			if ($arrRS){
				foreach($arrRS as $arrLinea){
					$oCas = new Casa();
					$oCas->setNcveCasa($arrLinea[0]);
					$oCas->setSnombreCasa($arrLinea[1]);
					$oCas->setNcuartos($arrLinea[2]);
            		$arrCasas[$j] = $oCas;
					$j=$j+1;
                }
			}
        }
		return $arrCasas;
	}
 }
 ?>