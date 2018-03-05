<?php
/**
* Clase que representa una celda de una tabla HTML y celdas en una hoja de Excel.
* @author    : Agustin Rios Reyes <nitsugario@gmail.com>
* @copyright : Copyright (c) 2017 AR2
* @package   : Tabla
*/
class Celda
{
	private $lstId             = '';        //--> Identificador único de la celda
	private $lstClass          = '';        //--> Especifica uno o más nombres de clase ej: "Normal" => <th class="Normal">
	private $lstStyle          = '';        //--> Especifica un estilo CSS en línea ej: "color:blue;text-align:center" => <th style="color:blue;text-align:center">
	private $lstTabindex       = '';        //--> Especifica el orden de tabulación 
	private $lstAccesskey      = '';        //--> Especifica una tecla de método abreviado para activar / enfocar
	private $lstTitle          = '';        //--> Especifica información adicional sobre la celda
	private $lstAbbr           = '';        //--> Especifica una versión abreviada del contenido en una celda  ej: "text" => <td abbr="text"> * < html5
	private $lstScope          = '';        //--> Asociar celdas de encabezado y celdas de datos : col|row|colgroup|rowgroup     * < html5
	private $lnuColspan        =  0;        //--> Número de columnas que una celda debe abarcar
	private $lnuRowspan        =  0;        //--> Número de filas que una celda debe abarcar
	private $lstHeaders        = '';        //--> Especifica una o más celdas de encabezado con las que está relacionada una celda
	private $lstHtml           = '';        //--> El valor a mostrar en la celda para la tabla HTML (puede ir cualquier HTML valido)
	private $lstValue          = '';        //--> El valor a mostrar en la celda para Excel o cuando no se tiene html para insertar en la celda.
	private $lstCapsulaHtml    = '';        //--> Funciona para encapsular el valor en un elemento HTML Valido; en ## es donde se sustituye el valor. ej: '<strong class="important" >##</strong>'
	private $lstType           = '';        //--> Tipo de celda : td|th
	private $lstWidth 		   = '';        //--> Ancho                   : auto|length(px, cm, %)|initial|inherit
	private $lstHeight		   = '';        //--> Alto                    : auto|length(px, cm, %)|initial|inherit
	private $lstVerticalAlign  = '';        //--> Alineación vertical     : baseline|length|sub|super|top|text-top|middle|bottom|text-bottom|initial|inherit
	private $lstAlign 		   = '';        //--> Alineación horisontal   : left|right|center
	private $lstDataType	   = 'string';  //--> Tipo de Datos a Mostrar : string|int|thousands|date|percentage_n(percentage_0|percentage_1|percentage2|percentage3..)|money|moneyE|decimal_n( decimal_0|decimal_1|decimal_2|decimal_4...)
	private $lstBackgroundColor= ''; //--> Color de fondo          : color|transparent|initial|inherit;
	private $lstBorder         = '1*1*1*1,1px,#000000';                          //--> Borde de la Celda       : left*right*top*bottom,width,color
	private $lstfont           = '16px,"Times New Roman"*Georgia*Serif,#000000'; //--> Tamaño,familia y color  : size,family(Si son más de una se separan por *),color
	private $lboLockedCell     = false;     //--> La Celda esta Bloqueada : true/false
	private $lboMostrarCeros   = true;      //--> Si el valor esta vacío y se eligió un valor numérico o formato numérico se muestra o no un cero en lugar de vacío.
	private $layAttributesAdd  = array();   //--> Array clave/valor con atributos adicionales y personalizados ej: array( "contenteditable" => "true","IdFela" => "f1")  =>  <td contenteditable="true" IdFela="f1" >
	private $layEvent          = array();   //--> Array clave/valor con eventos agregar a la celda ej: array("ondblclick"=>"myFunction()", "onclick"=>"myFunctionDos()") =>  <td ondblclick="myFunction()" onclick="myFunctionDos()"  >
	/* NOTA: Para Excel se definen las clases o los parámetros predefinidos.*/

	public function setId              ( $pstValor = '' ){ $this->lstId                 = $pstValor; }
	public function setClass           ( $pstValor = '' ){ $this->lstClass              = $pstValor; }
	public function setStyle           ( $pstValor = '' ){ $this->lstStyle              = $pstValor; }
	public function setTabindex        ( $pstValor = '' ){ $this->lstTabindex           = $pstValor; }
	public function setAccesskey       ( $pstValor = '' ){ $this->lstAccesskey          = $pstValor; }
	public function setTitle           ( $pstValor = '' ){ $this->lstTitle              = $pstValor; }
	public function setAbbr            ( $pstValor = '' ){ $this->lstAbbr               = $pstValor; }
	public function setScope           ( $pstValor = '' ){ $this->lstScope              = $pstValor; }
	public function setColspan         ( $pnuValor = 0  ){ $this->lnuColspan            = $pnuValor; }
	public function setRowspan         ( $pnuValor = 0  ){ $this->lnuRowspan            = $pnuValor; }
	public function setHeaders         ( $pstValor = '' ){ $this->lstHeaders            = $pstValor; }
	public function setHtml            ( $pstValor = '' ){ $this->lstHtml               = $pstValor; }
	public function setValue           ( $pstValor = '' ){ $this->lstValue              = $pstValor; }
	public function setType            ( $pstValor = '' ){ $this->lstType               = $pstValor; }
	public function setWidth 		   ( $pstValor = '' ){ $this->lstWidth 		        = $pstValor; }
	public function setHeight		   ( $pstValor = '' ){ $this->lstHeight		        = $pstValor; }
	public function setVerticalAlign   ( $pstValor = '' ){ $this->lstVerticalAlign      = $pstValor; }
	public function setAlign 		   ( $pstValor = '' ){ $this->lstAlign 		        = $pstValor; }
	public function setDataType	       ( $pstValor = '' ){ $this->lstDataType	        = $pstValor; }
	public function setBackgroundColor ( $pstValor = '' ){ $this->lstBackgroundColor    = $pstValor; }
	public function setBorder          ( $pstValor = '' ){ $this->lstBorder             = $pstValor; }
	public function setfont            ( $pstValor = '' ){ $this->lstfont               = $pstValor; }
	public function setCapsulaHtml     ( $pstValor = '' ){ $this->lstCapsulaHtml        = $pstValor; }
	public function setLockedCell      ( $pboValor = false   ){ $this->lboLockedCell    = $pboValor; }
	public function setAttributesAdd   ( $payValor = array() ){ $this->layAttributesAdd = $payValor; }
	public function setEvent           ( $payValor = array() ){ $this->layEvent         = $payValor; }
	public function setMostrarCeros    ( $pboValor = true    ){ $this->lboMostrarCeros  = $pboValor; }

	public function getId              (){ return $this->lstId             ; }
	public function getClass           (){ return $this->lstClass          ; }
	public function getStyle           (){ return $this->lstStyle          ; }
	public function getTabindex        (){ return $this->lstTabindex       ; }
	public function getAccesskey       (){ return $this->lstAccesskey      ; }
	public function getTitle           (){ return $this->lstTitle          ; }
	public function getAbbr            (){ return $this->lstAbbr           ; }
	public function getScope           (){ return $this->lstScope          ; }
	public function getColspan         (){ return $this->lnuColspan        ; }
	public function getRowspan         (){ return $this->lnuRowspan        ; }
	public function getHeaders         (){ return $this->lstHeaders        ; }
	public function getHtml            (){ return $this->lstHtml           ; }
	public function getValue           (){ return $this->lstValue          ; }
	public function getType            (){ return $this->lstType           ; }
	public function getWidth 		   (){ return $this->lstWidth 		   ; }
	public function getHeight		   (){ return $this->lstHeight		   ; }
	public function getVerticalAlign   (){ return $this->lstVerticalAlign  ; }
	public function getAlign 		   (){ return $this->lstAlign 		   ; }
	public function getDataType	       (){ return $this->lstDataType	   ; }
	public function getBackgroundColor (){ return $this->lstBackgroundColor; }
	public function getBorder          (){ return $this->lstBorder         ; }
	public function getfont            (){ return $this->lstfont           ; }
	public function getCapsulaHtml     (){ return $this->lstCapsulaHtml    ; }
	public function getLockedCell      (){ return $this->lboLockedCell     ; }
	public function getEvent           (){ return $this->layEvent          ; }
	public function getAttributesAdd   (){ return $this->layAttributesAdd  ; }
	public function getMostrarCeros    (){ return $this->lboMostrarCeros   ; }
	public function getLengthEvents    (){ return count( $this->layEvent ) ; }
	public function getLengthAttributes(){ return count( $this->layAttributesAdd ); }
	
	public function setAttribute       ( $pstClave, $pstValor ){ $this->layAttributesAdd[$pstClave] = $pstValor; }
	public function setEventClaveValor ( $pstClave, $pstValor ){ $this->layEvent[$pstClave]         = $pstValor; }
	public function setStyleClaveValor ( $pstClave, $pstValor ){ $this->lstStyle                   .= $pstClave.":".$pstValor.";"; }
}
?>