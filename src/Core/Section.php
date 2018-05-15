<?php
namespace ObjectTablePhp\Core;
/**
* 
* @author    : Agustin Rios Reyes <nitsugario@gmail.com>
* @copyright : Copyright (c) 2018 nitsugario
* @package   : Core
*/
class Section
{
	private $lstType           = 'RowsFree'; //--> Tipo: RowsFree,Thead,Tbody y Tfoot
	private $lstId             = '';    
	private $lstClass          = '';    
	private $lstStyle          = '';    
	private $lstTabindex       = '';    
	private $lstAccesskey      = '';    
	private $lstTitle          = '';        
	private $lstWidth 		   = '';
	private $lstHeight		   = '';
	private $lstAlign 		   = '';
	private $lstTypeSeccion    = '';
	private $lstTypeCelda      = '';
	private $lboValidarCelda   = false;
	private $layRows           = array();   //--> Array que guarda las filas.
	private $layRowCells       = array();
	private $layAttributesAdd  = array();
	private $layTypeSeccion    = array("RowsFree"=>"tbody","Thead"=>"thead","Tbody"=>"tbody","Tfoot"=>"tfoot");
	

	function __construct()
	{
		$this->layRows        = array();
		$this->layRowCells    = array();
	}

	public function setId             ( $pstValor = '' ){ $this->lstId        = $pstValor; }
	public function setClass          ( $pstValor = '' ){ $this->lstClass     = $pstValor; }
	public function setStyle          ( $pstValor = '' ){ $this->lstStyle     = $pstValor; }
	public function setTabindex       ( $pstValor = '' ){ $this->lstTabindex  = $pstValor; }
	public function setAccesskey      ( $pstValor = '' ){ $this->lstAccesskey = $pstValor; }
	public function setTitle          ( $pstValor = '' ){ $this->lstTitle     = $pstValor; }
	public function setWidth 		  ( $pstValor = '' ){ $this->lstWidth     = $pstValor; }
	public function setHeight		  ( $pstValor = '' ){ $this->lstHeight    = $pstValor; }
	public function setAlign 		  ( $pstValor = '' ){ $this->lstAlign     = $pstValor; }
	public function setTypeSeccion    ( $payValor = '' ){ $this->layTypeSeccion = $payValor; }
	
	public function getId             (){ return $this->lstId           ; }
	public function getType           (){ return $this->lstType         ; }
	public function getClass          (){ return $this->lstClass        ; }
	public function getStyle          (){ return $this->lstStyle        ; }
	public function getTabindex       (){ return $this->lstTabindex     ; }
	public function getAccesskey      (){ return $this->lstAccesskey    ; }
	public function getTitle          (){ return $this->lstTitle        ; }
	public function getWidth 		  (){ return $this->lstWidth 		; }
	public function getHeight		  (){ return $this->lstHeight		; }
	public function getAlign 		  (){ return $this->lstAlign 		; }
	public function getAttributesAdd  (){ return $this->layAttributesAdd; }
	public function getTypeSeccion    (){ return $this->layTypeSeccion  ; }

	public function setType            ( $pstTipo  = 'RowsFree'){ $this->lstType                     = $pstTipo ; }
	public function setAttributesAdd   ( $payValor = array()   ){ $this->layAttributesAdd            = $payValor; }
	public function setAttribute       ( $pstClave, $pstValor  ){ $this->layAttributesAdd[$pstClave] = $pstValor; }
	public function setStyleClaveValor ( $pstClave, $pstValor  ){ $this->lstStyle                   .= $pstClave.":".$pstValor.";"; }
	public function setRowS            ( $payRows ){ $this->layRows   = $payRows; }
	public function setRow             ( $pobRow  )
	{
		$this->layRows[]     = $pobRow;
		$this->layRowCells[] = $pobRow->getLengthCells();
	}

	public function getRows            (){ return $this->layRows                 ;  }
	public function getRowCells        (){ return $this->layRowCells             ;  }
	public function getLengthRows      (){ return count( $this->layRows )        ;  }
	public function getLengthAttributes(){ return count( $this->layAttributesAdd ); }
}
?>