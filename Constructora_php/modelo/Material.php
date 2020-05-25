<?php
error_reporting(E_ALL);
include_once("AccesoDatos.php");
include_once("Usuario.php");

class Material extends Usuario{

private $ncvematerial=0;
private $snombrematerial="";
private $nexistencia=0;	

   
	function setNcveMaterial($pnValor){
       $this->ncvematerial = $pnValor;
	}
   
	function getNcveMaterial(){
       return $this->ncvematerial;
	}
   
	function setSnombreMaterial($pnValor){
       $this->snombrematerial = $pnValor;
	}
   
	function getSnombreMaterial(){
       return $this->snombrematerial;
	}
   
   function setNExistencia($pnValor){
       $this->nexistencia = $pnValor;
	}
   
	function getNExistencia(){
       return $this->nexistencia;
	}

	function buscar(){
		$oAccesoDatos=new AccesoDatos();
		$sQuery="";
		$arrRS=null;
		$bRet = false;
		
			if ($this->ncvematerial==0)
				throw new Exception("Material->buscar(): faltan datos");
			else{
				if ($oAccesoDatos->conectar()){
					 $sQuery = "SELECT snombrematerial, nexistencia
								FROM material
								WHERE ncvematerial = '".$this->ncvematerial."'";
					$arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
					$oAccesoDatos->desconectar();
					if ($arrRS){
						$this->snombrematerial = $arrRS[0][0];
						$this->nexistencia = $arrRS[0][1];
						
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
                throw new Exception("Material->insertar(): faltan datos");
            else{
                if ($oAccesoDatos->conectar()){
                     $sQuery = parent::getInsertar();
                    $sQuery = $sQuery."
                        INSERT INTO material ( ncvematerial, nexistencia, sCveUsuario) 
                        VALUES (".$this->ncvematerial.",".$this->nexistencia.",".$this->sCveUsu.");";
                       error_log($sQuery,0);    
                    $nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
                    $oAccesoDatos->desconectar();		
                }
            }
        return $nAfectados;
    }
    
    function modificar(){
        $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $nAfectados=-1;
            if ($this->sCveUsu=="" || $this->sContrasenia == "" || $this->sNombre == "")
                throw new Exception("Material->modificar(): faltan datos");
            else{
                if ($oAccesoDatos->conectar()){
                     $sQuery = parent::getModificar();
                    $sQuery = $sQuery."
                        UPDATE material
                        SET	ncvematerial = ".$this->ncvematerial.", 
                        nexistencia=".$this->nexistencia.", 
                        WHERE sCveUsuario = '".$this->sCveUsu."';";
                        error_log($sQuery,0); 
                    $nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
                    $oAccesoDatos->desconectar();
                }
            }
        return $nAfectados;
    }

    function borrar(){
        $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $nAfectados=-1;
            if ($this->sCveUsu=="")
                throw new Exception("Material->borrar(): faltan datos");
            else{
                if ($oAccesoDatos->conectar()){
                    $sQuery = "DELETE FROM material WHERE sCveUsuario = '".$this->sCveUsu."'; ";
                     $sQuery = $sQuery." ".parent::getBorrar();
                    $nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
                    $oAccesoDatos->desconectar();
                }
            }
        return $nAfectados;
    }

	function buscarTodos(){
	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$arrRS=null;
	$arrMateriales = null;
	$arrLinea=null;
	$j=0;
	$oMat=null;
		if ($oAccesoDatos->conectar()){
		 	$sQuery = "SELECT t1.sCveUsuario, t1.sContrasenia, t1.sNombre, t1.sApePat, 
						t1.sApeMat, t2.ncvematerial, t2.nexistencia
						FROM usuario t1, material t2
						WHERE t2.sCveUsuario = t1.sCveUsuario
						ORDER BY t1.sCveUsuario";
			$arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
			$oAccesoDatos->desconectar();
			if ($arrRS){
				foreach($arrRS as $arrLinea){
					$oMat = new Cliente();
					$oMat->setClave($arrLinea[0]);
					$oMat->setPwd($arrLinea[1]);
					$oMat->setNombre($arrLinea[2]);
					$oMat->setApePat($arrLinea[3]);
					$oMat->setApeMat($arrLinea[4]);
					$oMat->setNcveMaterial($arrLinea[5]);
					$oMat->setNExistencia($arrLinea[6]);
            		$arrMateriales[$j] = $oMat;
					$j=$j+1;
                }
			}
        }
		return $arrMateriales;
	}
 }
 ?>