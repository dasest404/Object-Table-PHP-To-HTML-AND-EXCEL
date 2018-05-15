<?php
namespace ObjectTablePhp\Core;
/**
* Clase que representa una Fila de una tabla HTML y fila en una hoja de Excel.
* @author    : Agustin Rios Reyes <nitsugario@gmail.com>
* @copyright : Copyright (c) 2018 nitsugario
* @package   : Core
*/
class Row
{
	
	private $lstId             = '';        //--> Identificador único de la fila
	private $lstClass          = '';        //--> Especifica uno o más nombres de clase ej: "Normal" => <tr class="Normal">
	private $lstStyle          = '';        //--> Especifica un estilo CSS en línea ej: "color:blue;text-align:center" => <tr style="color:blue;text-align:center">
	private $lstTabindex       = '';        //--> Especifica el orden de tabulación 
	private $lstAccesskey      = '';        //--> Especifica una tecla de método abreviado para activar / enfocar
	private $lstTitle          = '';        //--> Especifica información adicional sobre la fila
	private $lboVisible        = true;      //--> Determina si una fila se muestra o permanece oculta
	private $layCeldas         = array();   //--> Array con las celdas de una fila.
	private $layAttributesAdd  = array();   //--> Array clave/valor con atributos adicionales y personalizados ej: array( "contenteditable" => "true","IdFela" => "f1")  =>  <tr contenteditable="true" IdFela="f1" >
	private $layEvent          = array();   //--> Array clave/valor con eventos agregar a la fila ej: array("ondblclick"=>"myFunction()", "onclick"=>"myFunctionDos()") =>  <tr ondblclick="myFunction()" onclick="myFunctionDos()"  >

	function __construct(){ $this->layCeldas = array(); }

	public function setId             ( $pstValor = '' ){ $this->lstId                 = $pstValor; }
	public function setClass          ( $pstValor = '' ){ $this->lstClass              = $pstValor; }
	public function setStyle          ( $pstValor = '' ){ $this->lstStyle              = $pstValor; }
	public function setTabindex       ( $pstValor = '' ){ $this->lstTabindex           = $pstValor; }
	public function setAccesskey      ( $pstValor = '' ){ $this->lstAccesskey          = $pstValor; }
	public function setTitle          ( $pstValor = '' ){ $this->lstTitle              = $pstValor; }
	public function setCell           ( $pobCelda = NULL    ){ $this->layCeldas[]      = $pobCelda; }
	public function setVisible        ( $pboValor = true    ){ $this->lboVisible       = $pboValor; }
	public function setAttributesAdd  ( $payValor = array() ){ $this->layAttributesAdd = $payValor; }
	public function setEvent          ( $payValor = array() ){ $this->layEvent         = $payValor; }
	public function setCells          ( $payValor = array() ){ $this->layCeldas        = $payValor; }

	public function getId              (){ return $this->lstId                    ; }
	public function getClass           (){ return $this->lstClass                 ; }
	public function getStyle           (){ return $this->lstStyle                 ; }
	public function getTabindex        (){ return $this->lstTabindex              ; }
	public function getAccesskey       (){ return $this->lstAccesskey             ; }
	public function getTitle           (){ return $this->lstTitle                 ; }
	public function getVisible         (){ return $this->lboVisible               ; }
	public function getCells           (){ return $this->layCeldas                ; }
	public function getAttributesAdd   (){ return $this->layAttributesAdd         ; }
	public function getEvent           (){ return $this->layEvent                 ; }
	public function getLengthCells     (){ return count( $this->layCeldas )       ; }
	public function getLengthAttributes(){ return count( $this->layAttributesAdd ); }
	public function getLengthEvents    (){ return count( $this->layEvent )        ; }
   
	public function setAttribute      ( $pstClave, $pstValor ){ $this->layAttributesAdd[$pstClave] = $pstValor; }
	public function setEventClaveValor( $pstClave, $pstValor ){ $this->layEvent[$pstClave]         = $pstValor; }
	public function setStyleClaveValor( $pstClave, $pstValor ){ $this->lstStyle                   .= $pstClave.":".$pstValor.";"; }
}
?>