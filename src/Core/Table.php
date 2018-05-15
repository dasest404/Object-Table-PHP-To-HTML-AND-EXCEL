<?php
namespace ObjectTablePhp\Core;
/**
* Clase que representa una Tabla HTML5 o una hoja de Excel.
* @author    : Agustin Rios Reyes <nitsugario@gmail.com>
* @copyright : Copyright (c) 2018 nitsugario
* @package   : Core
*/
class Table
{
	private $lstId             = '';        //--> Identificador único de la Tabla
	private $lstClass          = '';        //--> Especifica uno o más nombres de clase ej: "Normal" => <teble class="Normal">
	private $lstStyle          = '';        //--> Especifica un estilo CSS en línea ej: "color:blue;text-align:center" => <table style="color:blue;text-align:center">
	private $lstTabindex       = '';        //--> Especifica el orden de tabulación 
	private $lstAccesskey      = '';        //--> Especifica una tecla de método abreviado para activar / enfocar
	private $lstTitle          = '';        //--> Especifica información adicional sobre la Tabla
	private $lstScript         = '';        //--> Script JavaScript que utilisa la Tabla
	private $lstWidth 		   = '';        //--> Ancho                   : auto|length(px, cm, %)|initial|inherit
	private $lstHeight		   = '';        //--> Alto                    : auto|length(px, cm, %)|initial|inherit
	private $lstAlign 		   = '';        //--> Alineación horisontal   : left|right|center
	private $lstCellpadding    = '';
	private $lstCellspacing    = '';
	private $lstBorder         = '';
	private $layTotalRows      =  0;
	private $lobCaption        = NULL;
	private $lobColgroup       = NULL;
	private $laySecciones      = array();   //--> Array que guarda las Secciones.
	private $layAttributesAdd  = array();   //--> Array clave/valor con atributos adicionales y personalizados ej: array( "contenteditable" => "true","IdFela" => "f1")  =>  <teble contenteditable="true" IdFela="f1" >
	private $layEvent          = array();   //--> Array clave/valor con eventos agregar a la Tabla ej: array("ondblclick"=>"myFunction()", "onclick"=>"myFunctionDos()") =>  <teble ondblclick="myFunction()" onclick="myFunctionDos()"  >

	function __construct()
	{
		$this->laySecciones      = array();
		$this->layAttributesAdd  = array();
		$this->layEvent          = array();
	}

	public function setId               ( $pstValor = '' ){ $this->lstId          = $pstValor; }
	public function setClass            ( $pstValor = '' ){ $this->lstClass       = $pstValor; }
	public function setStyle            ( $pstValor = '' ){ $this->lstStyle       = $pstValor; }
	public function setTabindex         ( $pstValor = '' ){ $this->lstTabindex    = $pstValor; }
	public function setAccesskey        ( $pstValor = '' ){ $this->lstAccesskey   = $pstValor; }
	public function setTitle            ( $pstValor = '' ){ $this->lstTitle       = $pstValor; }
	public function setWidth 		    ( $pstValor = '' ){ $this->lstWidth       = $pstValor; }
	public function setHeight		    ( $pstValor = '' ){ $this->lstHeight      = $pstValor; }
	public function setAlign 		    ( $pstValor = '' ){ $this->lstAlign       = $pstValor; }
	public function setCellpadding      ( $pstValor = '' ){ $this->lstCellpadding = $pstValor; }
	public function setCellspacing      ( $pstValor = '' ){ $this->lstCellspacing = $pstValor; }
	public function setBorder           ( $pstValor = '' ){ $this->lstBorder      = $pstValor; }

	public function setSections         ( $payValor = array() ){ $this->laySecciones     = $payValor; }
	public function setCaption          ( $pobValor = NULL    ){ $this->lobCaption       = $pobValor; }
	public function setColgroup         ( $pobValor = NULL    ){ $this->lobColgroup      = $pobValor; }
	public function setAttributesAdd    ( $payValor = array() ){ $this->layAttributesAdd = $payValor; }
	public function setEvent            ( $payValor = array() ){ $this->layEvent         = $payValor; }

	public function getId               (){ return $this->lstId           ; }
	public function getClass            (){ return $this->lstClass        ; }
	public function getStyle            (){ return $this->lstStyle        ; }
	public function getTabindex         (){ return $this->lstTabindex     ; }
	public function getAccesskey        (){ return $this->lstAccesskey    ; }
	public function getTitle            (){ return $this->lstTitle        ; }
	public function getWidth 		    (){ return $this->lstWidth 		  ; }
	public function getHeight		    (){ return $this->lstHeight		  ; }
	public function getAlign 		    (){ return $this->lstAlign 		  ; }
	public function getAttributesAdd    (){ return $this->layAttributesAdd; }
	public function getEvent            (){ return $this->layEvent        ; }
	public function getSections         (){ return $this->laySecciones    ; }
	public function getCaption          (){ return $this->lobCaption      ; }
	public function getColgroup         (){ return $this->lobColgroup     ; }
	public function getCellpadding      (){ return $this->lstCellpadding  ; }
	public function getCellspacing      (){ return $this->lstCellspacing  ; }
	public function getBorder           (){ return $this->lstBorder       ; }

	public function setEventClaveValor  ( $pstClave, $pstValor ){ $this->layEvent[$pstClave]    = $pstValor; }
	public function setAttributeCaption ( $pstClave, $pstValor ){ $this->layCaption[$pstClave]  = $pstValor; }
	public function setStyleClaveValor  ( $pstClave, $pstValor ){ $this->lstStyle              .= $pstClave.":".$pstValor.";"; }
	public function setAttribute        ( $pstClave, $pstValor ){ $this->layAttributesAdd[$pstClave]   = $pstValor; }

	public function getLengthSections   (){ return count( $this->laySecciones     ); }
	public function getLengthAttributes (){ return count( $this->layAttributesAdd ); }
	public function getLengthEvent      (){ return count( $this->layEvent         ); }
	public function getLengthRows       (){ return $this->layTotalRows             ; }

	public function setSection( $payValor = array() )
	{
		$this->laySecciones[]  = $payValor;
		$this->layTotalRows   += $payValor->getLengthRows();
	}
}
?>