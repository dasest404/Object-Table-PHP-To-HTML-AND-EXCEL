<?php
/**
* 
* @author    : Agustin Rios Reyes <nitsugario@gmail.com>
* @copyright : Copyright (c) 2017 AR2
* @package   : Tabla
*/
class Seccion
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
	private $lstSeccionHtml    = '';
	private $lstTypeSeccion    = '';
	private $lstTypeCelda      = '';
	private $lboValidarCelda   = false;
	private $layFilas          = array();   //--> Array que guarda las filas.
	private $layAttributesAdd  = array();
	private $layTypeSeccion    = array("RowsFree"=>"tbody","Thead"=>"thead","Tbody"=>"tbody","Tfoot"=>"tfoot");
	

	function __construct()
	{
		$this->layFilas        = array();
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
	public function getSeccionHtml    (){ return $this->lstSeccionHtml  ; }

	public function setType            ( $pstTipo  = 'RowsFree'){ $this->lstType                     = $pstTipo ; }
	public function setAttributesAdd   ( $payValor = array()   ){ $this->layAttributesAdd            = $payValor; }
	public function setAttribute       ( $pstClave, $pstValor  ){ $this->layAttributesAdd[$pstClave] = $pstValor; }
	public function setStyleClaveValor ( $pstClave, $pstValor  ){ $this->lstStyle                   .= $pstClave.":".$pstValor.";"; }
	public function setFilaS           ( $payFilas ){ $this->layFilas   = $payFilas; }
	public function setFila            ( $pobFila  ){ $this->layFilas[] = $pobFila; }

	public function getFilas           (){ return $this->layFilas                 ; }
	public function getLengthFilas     (){ return count( $this->layFilas )        ; }
	public function getLengthAttributes(){ return count( $this->layAttributesAdd ); }

	public function mCrearSeccionHtml()
	{
		$layClavesSeccion  = array_keys( $this->layTypeSeccion );
		$lstType           = ( $this->lstType      != '' ) ? ( in_array( $this->lstType, $layClavesSeccion ) ) ? $this->lstType : 'RowsFree' : 'RowsFree';
		$lstId             = ( $this->lstId        != '' ) ? ' id="'.$this->lstId.'"'               : '';
		$lstClass          = ( $this->lstClass     != '' ) ? ' class="'.$this->lstClass.'"'         : '';
		$lstStyle          = ( $this->lstStyle     != '' ) ? ' style="'.$this->lstStyle.'"'         : '';
		$lstTabindex       = ( $this->lstTabindex  != '' ) ? ' tabindex="'.$this->lstTabindex.'"'   : '';
		$lstAccesskey      = ( $this->lstAccesskey != '' ) ? ' accesskey="'.$this->lstAccesskey.'"' : '';
		$lstTitle          = ( $this->lstTitle     != '' ) ? ' title="'.$this->lstTitle.'"'         : '';
		$lstWidth          = ( $this->lstWidth     != '' ) ? ' width="'.$this->lstWidth.'"'         : '';
		$lstHeight         = ( $this->lstHeight    != '' ) ? ' height="'.$this->lstHeight.'"'       : '';
		$lstAlign          = ( $this->lstAlign     != '' ) ? ' align="'.$this->lstAlign.'"'         : '';
		$this->lstType     = $lstType;
		$lstType           = $this->layTypeSeccion[ $lstType ];

		//--> Asignamos el tipo de celda de acuerdo al tipo de sección para validación de celdas por sección.
		if( $this->lboValidarCelda )
		{
			$this->lstTypeSeccion = $lstType;
			$this->mTipoCelda();
		}
			
		$lstFilas             = $this->mObtenerFilas();
		$this->lstSeccionHtml = '<'.$lstType.'>'.$lstFilas.'</'.$lstType.'>';
	}

	public function mObtenerFilas()
	{
		$lnuTotalFilas  = $this->getLengthFilas();
		$lstFilasCeldas = '';

		if( $lnuTotalFilas > 0 )
		{
			foreach ( $this->layFilas as $layFilas => $lobFila )
			{
				$lstFila             = '';
				$lstId               = ( $lobFila->getId()        != '' ) ? ' id="'.$lobFila->getId().'"'               : '';
				$lstClass            = ( $lobFila->getClass()     != '' ) ? ' class="'.$lobFila->getClass().'"'         : '';
				$lstStyle            = ( $lobFila->getStyle()     != '' ) ? ' style="'.$lobFila->getStyle().'"'         : '';
				$lstTabindex         = ( $lobFila->getTabindex()  != '' ) ? ' tabindex="'.$lobFila->getTabindex().'"'   : '';
				$lstAccesskey        = ( $lobFila->getAccesskey() != '' ) ? ' accesskey="'.$lobFila->getAccesskey().'"' : '';
				$lstTitle            = ( $lobFila->getTitle()     != '' ) ? ' title="'.$lobFila->getTitle().'"'         : '';
				$lboVisible          = $lobFila->getVisible();
				$lstAtributos        = $lstId.$lstClass.$lstStyle.$lstTabindex.$lstAccesskey.$lstTitle;
				$lnuLengthCeldas     = $lobFila->getLengthCeldas();
				$lnuLengthAttributes = $lobFila->getLengthAttributes();
				$lnuLengthEvents     = $lobFila->getLengthEvents();
				$layCeldas           = ( $lnuLengthCeldas     > 0 ) ? $lobFila->getCeldar()        : array();
				$layAttributesAdd    = ( $lnuLengthAttributes > 0 ) ? $lobFila->getAttributesAdd() : array();
				$layEvent            = ( $lnuLengthEvents     > 0 ) ? $lobFila->getEvent()         : array();
				$lstAtributos       .= $this->mObtenerAttributes( $layAttributesAdd ).$this->mObtenerlstEvents($layEvent);
				$lstCeldas           = $this->mObtenerCeldas( $layCeldas );
				$lstFila             = '<tr'.$lstAtributos.'>'.$lstCeldas.'</tr>';
				$lstFilasCeldas     .= $lstFila;			
			}
		}

		return $lstFilasCeldas;
	}

	public function mObtenerCeldas( $payCeldas )
	{
		$lstCeldas = '';

		if( count( $payCeldas ) > 0 )
		{
			foreach ($payCeldas as $layCeldas => $lobCelda )
			{
				$lstCelda            = '';
				$lstId               = ( $lobCelda->getId()              !='' ) ? ' id="'.$lobCelda->getId().'"'                   : '';
				$lstClass            = ( $lobCelda->getClass()           !='' ) ? ' class="'.$lobCelda->getClass().'"'             : '';
				$lstStyle            = ( $lobCelda->getStyle()           !='' ) ? ' style="'.$lobCelda->getStyle().'"'             : '';
				$lstTabindex         = ( $lobCelda->getTabindex()        !='' ) ? ' tabindex="'.$lobCelda->getTabindex().'"'       : '';
				$lstAccesskey        = ( $lobCelda->getAccesskey()       !='' ) ? ' accesskey="'.$lobCelda->getAccesskey().'"'     : '';
				$lstTitle            = ( $lobCelda->getTitle()           !='' ) ? ' title="'.$lobCelda->getTitle().'"'             : '';
				$lstAbbr             = ( $lobCelda->getAbbr()            !='' ) ? ' abbr="'.$lobCelda->getAbbr().'"'               : '';
				$lstScope            = ( $lobCelda->getScope()           !='' ) ? ' scop="'.$lobCelda->getScope().'"'              : '';
				$lstHeaders          = ( $lobCelda->getHeaders()         !='' ) ? ' headers="'.$lobCelda->getHeaders().'"'         : '';
				$lstWidth            = ( $lobCelda->getWidth()           !='' ) ? ' width="'.$lobCelda->getWidth().'"'             : '';
				$lstHeight           = ( $lobCelda->getHeight()          !='' ) ? ' height="'.$lobCelda->getHeight().'"'           : '';
				$lstVerticalAlign    = ( $lobCelda->getVerticalAlign()   !='' ) ? ' valign="'.$lobCelda->getVerticalAlign().'"'    : '';
				$lstAlign            = ( $lobCelda->getAlign()           !='' ) ? ' align="'.$lobCelda->getAlign().'"'             : '';
				$lstBackgroundColor  = ( $lobCelda->getBackgroundColor() !='' ) ? ' bgcolor="'.$lobCelda->getBackgroundColor().'"' : '';
				$lnuColspan          = ( $lobCelda->getColspan()          > 1 ) ? ' colspan="'.$lobCelda->getColspan().'"'         : '';
				$lnuRowspan          = ( $lobCelda->getRowspan()          > 1 ) ? ' rowspan="'.$lobCelda->getRowspan().'"'         : '';
				//$lstBorder           = ( $lobCelda->getBorder()          !='' ) ? ' ="'.$lobCelda->getBorder().'"'          : '1px solid black';
				//$lstfont             = ( $lobCelda->getfont()            !='' ) ? ' ="'.$lobCelda->getfont().'"'            : '';
				$lstHtml             = ( $lobCelda->getHtml()            !='' ) ? $lobCelda->getHtml()     : '';
				$lstValue            = ( $lobCelda->getValue()           !='' ) ? $lobCelda->getValue()    : '';
				$lstType             = ( $lobCelda->getType()            !='' ) ? $lobCelda->getType()     : 'td';
				$lstDataType         = ( $lobCelda->getDataType()        !='' ) ? $lobCelda->getDataType() : 'string';
				$lstCapsulaHtml      = $lobCelda->getCapsulaHtml();

				$lboLockedCell       = $lobCelda->getLockedCell();
				$lboMostrarCeros     = $lobCelda->getMostrarCeros();
				$lnuLengthEvents     = $lobCelda->getLengthEvents();
				$lnuLengthAttributes = $lobCelda->getLengthAttributes();

				$layEvent            = ( $lnuLengthEvents     > 0 ) ? $lobCelda->getEvent()         : array();
				$layAttributesAdd    = ( $lnuLengthAttributes > 0 ) ? $lobCelda->getAttributesAdd() : array();

				$lstAtributos        = $lstId.$lstClass.$lnuColspan.$lnuRowspan.$lstStyle.$lstTabindex.$lstAccesskey.$lstTitle.$lstAbbr.$lstScope.$lstHeaders.$lstWidth.$lstHeight.$lstVerticalAlign.$lstAlign.$lstBackgroundColor;
				$lstAtributos       .= $this->mObtenerAttributes($layAttributesAdd).$this->mObtenerlstEvents($layEvent);

				if ( $this->lboValidarCelda )
				{
					if( $this->lstType == 'RowsFree' )
						$lstType = $lstType;
					else
						$lstType = $this->lstTypeCelda;
				}

				if( $lstHtml == '' && $lstValue == '' )
				{
					//--> Si esta activa el mostrar ceros y la celda no tiene valor se muestra el cero en el formato indicado.
					if( $lboMostrarCeros )
						$lstvalor     = ( $lstDataType != '' && $lstDataType != 'string') ? $this->mAplicarFormato( '',$lstDataType ) : 0;
					else
						$lstvalor = '';
				}
				else
				{
					//--> Validamos si el valor para HTML existe si no se intenta validar si value tiene algún valor y se usa eso.
					$lstvalor = ( $lstHtml == '' && $lstValue != '' ) ? $lstValue : ( $lstHtml != '' && $lstValue == '' ) ? $lstHtml : ( $lstHtml != '' && $lstValue == '' ) ? $lstHtml : $lstHtml;
					$lstvalor = ( $lstDataType != '' && $lstDataType != 'string' ) ? $this->mAplicarFormato( $lstvalor,$lstDataType ) : $lstvalor;
				}

				if( $lstCapsulaHtml != '' )
				{
					$lstvalor = str_replace( '##', $lstvalor, $lstCapsulaHtml );
				}

				$lstCelda   = '<'.$lstType.$lstAtributos.'>'.$lstvalor.'</'.$lstType.'>';
				$lstCeldas .= $lstCelda;
			}
			
		}

		return $lstCeldas;
	}

	public function mAplicarFormato( $pstValorHtml, $pstDataType )
	{
		$layMonedas    = array("Peso"=>"$","Dolar"=>"$","Euro"=>"e");
		$layMonedasKey = array_keys($layMonedas);

		//--> Validamos si se trata de un tipo con _
		$lboExiste_    = strpos( $pstDataType, '_' );

		if( $lboExiste_ !== false )
		{
			$layTipoDatos    = explode( '_', $pstDataType);
			$lsTipoDato      = ( isset($layTipoDatos[0]) ) ? $layTipoDatos[0] : '';
			$lsCantidadTipo  = ( isset($layTipoDatos[1]) ) ? $layTipoDatos[1] : 0;
			$lsValorTipo     = ( isset($layTipoDatos[2]) ) ? $layTipoDatos[2] : '';
			$lsFormatoTipo   = ( isset($layTipoDatos[2]) ) ? $layTipoDatos[2] : '';

			if ( $lsTipoDato == 'Porcentaje' )
			{
				//-->Ejemplos: Porcentaje_0|Porcentaje_1|Porcentaje_2|Porcentaje_3 ...
				$pstValorHtml = number_format( $pstValorHtml, $lsCantidadTipo, '.', ',' );
				$pstValorHtml = $pstValorHtml.'%';
			}
			else if ( $lsTipoDato   == 'Miles' )
			{
				//-->Ejemplos: Miles_2|Miles_2_%|Miles_0_%|Miles_2_$ ...
				if( $lsValorTipo == '' )
					$pstValorHtml	= $this->mstFormatearAMiles( $pstValorHtml, $lsCantidadTipo );
				else if( $lsValorTipo == '%' )
				{
					$pstValorHtml	= $this->mstFormatearAMiles( $pstValorHtml, $lsCantidadTipo );
					$pstValorHtml	= $pstValorHtml.'%';
				}
				else if( $lsValorTipo == '$' )
				{
					$pstValorHtml	= $this->mstFormatearAMiles( $pstValorHtml, $lsCantidadTipo );
					$pstValorHtml	= '$ '.$pstValorHtml;
				}
				else if( $lsValorTipo == 'e' )
				{
					$pstValorHtml	= $this->mstFormatearAMiles( $pstValorHtml, $lsCantidadTipo );
					$pstValorHtml	= 'e '.$pstValorHtml;
				}
			}
			else if ( $lsTipoDato   == 'Decimal' )
			{
				//-->Ejemplos: Decimal_0|Decimal_1|Decimal_2|Decimal_3 ...
				$pstValorHtml = number_format( $pstValorHtml, $lsCantidadTipo, '.', ',' );
			}
			else if ( $lsTipoDato   == 'Moneda' )
			{
				//-->Ejemplos: Moneda_0_Peso|Moneda_1_Peso|Moneda_0_Dolar|Moneda_2_Dolar|Moneda_0_Euro ....
				$lstTipoMoneda  = ( in_array( $lsValorTipo, $layMonedasKey ) ) ? $layMonedas[$lsValorTipo] : $lsValorTipo;
				$pstValorHtml	= ( $lsCantidadTipo == 0 ) ? $pstValorHtml : number_format( $pstValorHtml, $lsCantidadTipo, '.', ',' );
				$pstValorHtml	= $lstTipoMoneda.' '.$pstValorHtml;
			}
			else if ( $lsTipoDato   == 'Redondear' )
			{
				//-->Ejemplos: Redondear_2|Redondear_2_%|Redondear_0_%|Redondear_2_$ ...
				if( $lsValorTipo == '' )
					$pstValorHtml	= round( $pstValorHtml, $lsCantidadTipo );
				else if( $lsValorTipo == '%' )
				{
					$pstValorHtml	= round( $pstValorHtml, $lsCantidadTipo );
					$pstValorHtml	= $pstValorHtml.'%';
				}
				else if( $lsValorTipo == '$' )
				{
					$pstValorHtml	= round( $pstValorHtml, $lsCantidadTipo );
					$pstValorHtml	= '$ '.$pstValorHtml;
				}
				else if( $lsValorTipo == 'e' )
				{
					$pstValorHtml	= round( $pstValorHtml, $lsCantidadTipo );
					$pstValorHtml	= 'e '.$pstValorHtml;
				}
			}
			else if ( $lsTipoDato   == 'Fecha' )
			{
				//-->Ejemplos: 
				$pstValorHtml = $pstValorHtml;
			}
			else if ( $lsTipoDato   == '' )
				$pstValorHtml = $pstValorHtml;
		}
		else
		{
			if ( $pstDataType   == 'Porcentaje' )
			{
				$pstValorHtml	= $pstValorHtml.'%';
			}
			else if ( $pstDataType   == 'Decimal' )
			{
				$pstValorHtml = number_format( $pstValorHtml, 2, '.', ',' );
			}
			else if ( $pstDataType   == 'Moneda' )
			{
				$pstValorHtml	= '$ '.$pstValorHtml;
			}
			else if ( $pstDataType   == 'Redondear' )
			{
				$pstValorHtml	= round( $pstValorHtml );
			}
			else if ( $pstDataType   == 'Cadena' )
			{
				$pstValorHtml = $pstValorHtml;
			}
			else if ( $pstDataType   == 'Entero' )
			{
				$pstValorHtml = $pstValorHtml;
			}
			else if ( $pstDataType   == 'Miles' )
			{
				$pstValorHtml	= $this->mstFormatearAMiles( $pstValorHtml );
			}
			else if ( $pstDataType   == 'Fecha' )
			{
				#
				$pstValorHtml = $pstValorHtml;
			}
			else if ( $pstDataType   == '' )
				$pstValorHtml = $pstValorHtml;
		}

		return $pstValorHtml;
	}
	
	public function mstFormatearAMiles( $pstCantidad, $pnuDecimales = 1 )
	{
		$pstCantidad    = trim( $pstCantidad );

		if( !is_numeric( $pstCantidad ) )
		{
			return '';
		}

		$lnuPosPunto	= strrpos($pstCantidad, ".");

		if( $lnuPosPunto > 0 )
		{
			$lnuFormateada = number_format( $pstCantidad, $pnuDecimales, '.', ',' );
		}
		else
		{            
			$lnuFormateada = number_format( $pstCantidad, 0, '.', ',' );
		}

		if( $lnuFormateada * 1 == 0 )
			$lnuFormateada = '';

		return $lnuFormateada;
	}

	public function mObtenerAttributes( $payAttributes )
	{
		if ( count( $payAttributes ) > 0 )
			return $this->mObtenerClaveValor( $payAttributes );
		else
			return '';		
	}

	public function mObtenerlstEvents( $payEvents )
	{
		if ( count( $payEvents ) > 0 )
			return $this->mObtenerClaveValor( $payEvents );
		else
			return '';		
	}

	private function mObtenerClaveValor( $payArray )
	{
		$lstResultado = '';

		foreach ( $payArray as $lstCave => $lstValor )
		{
			$lstResultado .= ' '.$lstCave.'="'.$lstValor.'"';
		}

		return $lstResultado;
	}

	private function mTipoCelda()
	{
		$this->lstTypeCelda = ( $this->lstTypeSeccion == 'thead' ) ? 'th' : 'td';
	}
}
?>