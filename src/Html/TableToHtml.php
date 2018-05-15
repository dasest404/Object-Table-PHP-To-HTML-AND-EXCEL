<?php
namespace ObjectTablePhp\Html;
use ObjectTablePhp\Core\NumberFormat;
/**
* Parsea un objeto Tabla y crea su versión HTML5.
* @author    : Agustin Rios Reyes
* @copyright : Copyright (c) 2018 AR2
* @package   : Html
*/
class TableToHtml
{
	private $lstId                = '';
	private $lstClass             = '';
	private $lstStyle             = '';
	private $lstTabindex          = '';
	private $lstAccesskey         = '';
	private $lstTitle             = '';
	private $lstWidth             = '';
	private $lstHeight            = '';
	private $lstAlign             = '';
	private $lstCellpadding       = '';
	private $lstCellspacing       = '';
	private $lstBorder            = '';
	private $lstTablaHtml5        = '';
	private $lstAttributes        = '';
	private $lstEvents            = '';
	private $lstCaption           = '';
	private $lstColgroup          = '';
	private $lstSeccionesHtml     = '';
	private $lstCaptionHtml       = '';
	private $lstColgroupHtml      = '';
	private $lnuLengthSecciones   = 0;
	private $lnuLengthAttributes  = 0;
	private $lnuLengthEvent       = 0;
	private $lboLog               = true;
	private $lobObjectTable       = NULL;
	private $lobCaption           = NULL;
	private $lobColgroup          = NULL;
	private $lobNumberFormat      = NULL;
	private $layAttributesAdd     = array();
	private $layEvent             = array();
	private $laySectiones         = array();

	function __construct()
	{
		$this->lobNumberFormat = new NumberFormat();
	}

	public function setLog        ( $pboValue = true ){ $this->lboLog         = $pboValue; }
	public function setObjectTable( $pobValor = NULL ){ $this->lobObjectTable = $pobValor; }

	public function mPrintObjectTableInHtml()
	{
		if( is_null( $this->lobObjectTable  ) || !is_object( $this->lobObjectTable ) )
		{
			if( $this->lboLog )
			{
				error_log("Class: TableToHtml Method: mPrintObjectTableInHtml  Erro: El objeto Tabla esta vacío o no fue indicado. ");
				return '';
			}
			else
				return '';
		}
		else
		{
			//--> Obtener datos de la Tabla
			$this->lstId              = ( $this->lobObjectTable->getId()          !='' ) ? ' id="'.$this->lobObjectTable->getId().'"'                   : '';
			$this->lstClass           = ( $this->lobObjectTable->getClass()       !='' ) ? ' class="'.$this->lobObjectTable->getClass().'"'             : '';
			$this->lstStyle           = ( $this->lobObjectTable->getStyle()       !='' ) ? ' style="'.$this->lobObjectTable->getStyle().'"'             : '';
			$this->lstTabindex        = ( $this->lobObjectTable->getTabindex()    !='' ) ? ' tabindex="'.$this->lobObjectTable->getTabindex().'"'       : '';
			$this->lstAccesskey       = ( $this->lobObjectTable->getAccesskey()   !='' ) ? ' accesskey="'.$this->lobObjectTable->getAccesskey().'"'     : '';
			$this->lstTitle           = ( $this->lobObjectTable->getTitle()       !='' ) ? ' title="'.$this->lobObjectTable->getTitle().'"'             : '';
			$this->lstWidth 		  = ( $this->lobObjectTable->getWidth()       !='' ) ? ' width="'.$this->lobObjectTable->getWidth().'"'             : '';
			$this->lstHeight		  = ( $this->lobObjectTable->getHeight()      !='' ) ? ' height="'.$this->lobObjectTable->getHeight().'"'           : '';
			$this->lstAlign 		  = ( $this->lobObjectTable->getAlign()       !='' ) ? ' align="'.$this->lobObjectTable->getAlign().'"'             : '';
			$this->lstCellpadding     = ( $this->lobObjectTable->getCellpadding() !='' ) ? ' cellpadding="'.$this->lobObjectTable->getCellpadding().'"' : '';
			$this->lstCellspacing     = ( $this->lobObjectTable->getCellspacing() !='' ) ? ' cellspacing="'.$this->lobObjectTable->getCellspacing().'"' : '';
			$this->lstBorder          = ( $this->lobObjectTable->getBorder()      !='' ) ? ' border="'.$this->lobObjectTable->getBorder().'"'           : '';
			$this->lnuLengthAttributes= $this->lobObjectTable->getLengthAttributes();
			$this->lnuLengthEvent     = $this->lobObjectTable->getLengthEvent();
			$this->layAttributesAdd   = ( $this->lnuLengthAttributes > 0 ) ? $this->lobObjectTable->getAttributesAdd() : array();
			$this->layEvent           = ( $this->lnuLengthEvent > 0      ) ? $this->lobObjectTable->getEvent()         : array();

			$this->lstAttributes      = $this->lstId.$this->lstClass.$this->lstStyle.$this->lstTabindex.$this->lstAccesskey.$this->lstTitle.$this->lstWidth.$this->lstHeight.$this->lstAlign.$this->lstCellpadding.$this->lstCellspacing.$this->lstBorder;
			$this->lstAttributes     .= $this->mGetAttributes( $this->layAttributesAdd );
			$this->lstEvents          = $this->mGetEvents( $this->layEvent );

			//-->Obtener Caption
			$this->lobCaption         = $this->lobObjectTable->getCaption();

			if( !is_null($this->lobCaption) )
				$this->mGetCaptionHTML( $this->lobCaption );

			//-->Obtener Col Group
			$this->lobColgroup        =$this->lobObjectTable->getColgroup();

			if( !is_null($this->lobColgroup) )
				$this->mGetColgroupHTML( $this->lobColgroup );

			//-->Obtenemos las Secciones thead,tbody y tfoot
			$this->lnuLengthSecciones = $this->lobObjectTable->getLengthSections();
			$this->laySecciones       = ( $this->lnuLengthSecciones > 0  ) ? $this->lobObjectTable->getSections()     : array();
			
			if( $this->lnuLengthSecciones > 0  )
				$this->mGetSectionsHTML( $this->laySecciones );

			//-->Iniciamos a construir la tabla.
			$this->lstTablaHtml5     .= "\n<table".$this->lstAttributes.$this->lstEvents.'>';
			$this->lstTablaHtml5     .= $this->lstCaptionHtml;
			$this->lstTablaHtml5     .= $this->lstColgroupHtml;
			$this->lstTablaHtml5     .= $this->lstSeccionesHtml;
			$this->lstTablaHtml5     .= "\n</table>\n";

			return $this->lstTablaHtml5;
		}
	}

	public function mGetCaptionHTML( $pobCaption )
	{
		//--> Obtener el Caption.
		$lnuCuentaDatos = 0;

		if( $pobCaption->getCaptionId   () != '' )
		{
			$lstId    = ' id="'.$pobCaption->getCaptionId().'"'; 
			$lnuCuentaDatos++;     
		}
		else{$lstId    = '';}

		if( $pobCaption->getCaptionClass() != '' )
		{
			$lstClass = ' class="'.$pobCaption->getCaptionClass().'"';
			$lnuCuentaDatos++;
		}
		else{$lstClass = '';} 

		if( $pobCaption->getCaptionStyle() != '' )
		{
			$lstStyle = ' style="'.$pobCaption->getCaptionStyle().'"';
			$lnuCuentaDatos++;
		}
		else{$lstStyle = '';}

		if( $pobCaption->getCaptionAlign() != '' )
		{
			$lstAlign = ' align="'.$pobCaption->getCaptionAlign().'"';
			$lnuCuentaDatos++;
		}
		else{$lstAlign = '';}

		if( $pobCaption->getCaptionText () != '' )
		{
			$lstText  = $pobCaption->getCaptionText ();
			$lnuCuentaDatos++;
		}
		else{$lstText  = '';}

		if( $lnuCuentaDatos > 0 )
			$this->lstCaptionHtml = "\n\t<caption".$lstId.$lstClass.$lstStyle.$lstAlign.'>'.$lstText.'</caption>';
	}
	
	public function mGetColgroupHTML( $pobColgroup )
	{

		$lstColgroupId    = ( $pobColgroup->getColgroupId()        != '' ) ? ' id="'.$pobColgroup->getColgroupId().'"'       : '';
		$lstColgroupClass = ( $pobColgroup->getColgroupClass()     != '' ) ? ' class="'.$pobColgroup->getColgroupClass().'"' : '';
		$lstColgroupStyle = ( $pobColgroup->getColgroupStyle()     != '' ) ? ' style="'.$pobColgroup->getColgroupStyle().'"' : '';
		$lstColgroupSpan  = ( $pobColgroup->getColgroupSpan()      != '' ) ? ' span="'.$pobColgroup->getColgroupSpan().'"'   : '';
		$layColgroupCol   = ( $pobColgroup->getLengthColgroupCol()  > 0  ) ? $pobColgroup->getColgroupCol()                  : array();
		$lnuTotalCol      = $pobColgroup->getLengthColgroupCol();

		if ($lnuTotalCol > 0 )
		{
			$lstCols      = '';

			foreach ( $layColgroupCol as $layCols => $layParametros )
			{
				$lstId      = '';
				$lstClass   = '';
				$lstStyle   = '';
				$lstSpan    = '';
				$lnuCuentaP = 0;

				if( $layParametros['lstId'] != '' )
				{
					$lstId    = ' id="'.$layParametros['lstId'].'"';
					$lnuCuentaP++;
				}

				if( $layParametros['lstClass'] != '' )
				{
					$lstClass = ' class="'.$layParametros['lstClass'].'"';
					$lnuCuentaP++;
				}

				if( $layParametros['lstStyle'] != '' )
				{
					$lstStyle = ' style="'.$layParametros['lstStyle'].'"';
					$lnuCuentaP++;
				}

				if( $layParametros['lstSpan'] != '' )
				{
					$lstSpan  = ' span="'.$layParametros['lstSpan'].'"';
					$lnuCuentaP++;
				}

				if( $lnuCuentaP > 0 )
					$lstCols  .= "\n\t\t<col".$lstId.$lstClass.$lstSpan.$lstStyle.'>';
				else
					continue;
			}

			$this->lstColgroupHtml = "\n\t<colgroup".$lstColgroupId.$lstColgroupClass.$lstColgroupSpan.$lstColgroupStyle.'>'.$lstCols."\n\t</colgroup>";
		}
		else
			$this->lstColgroupHtml = "\n\t<colgroup".$lstColgroupId.$lstColgroupClass.$lstColgroupSpan.$lstColgroupStyle.">\n\t</colgroup>";
	}

	public function mGetSectionsHTML( $paySections )
	{
		foreach ( $paySections as $laySection => $lobSection )
		{
			$lstRows           = '';
			$layTypeSection    = $lobSection->getTypeSeccion();
			$layKeysSection    = array_keys( $layTypeSection );
			$lstType           = ( $lobSection->getType()      != '' ) ? ( in_array( $lobSection->getType(), $layKeysSection ) ) ? $lobSection->getType() : 'RowsFree' : 'RowsFree';
			$lstId             = ( $lobSection->getId()        != '' ) ? ' id="'.$lobSection->getId().'"'               : '';
			$lstClass          = ( $lobSection->getClass()     != '' ) ? ' class="'.$lobSection->getClass().'"'         : '';
			$lstStyle          = ( $lobSection->getStyle()     != '' ) ? ' style="'.$lobSection->getStyle().'"'         : '';
			$lstTabindex       = ( $lobSection->getTabindex()  != '' ) ? ' tabindex="'.$lobSection->getTabindex().'"'   : '';
			$lstAccesskey      = ( $lobSection->getAccesskey() != '' ) ? ' accesskey="'.$lobSection->getAccesskey().'"' : '';
			$lstTitle          = ( $lobSection->getTitle()     != '' ) ? ' title="'.$lobSection->getTitle().'"'         : '';
			$lstWidth          = ( $lobSection->getWidth()     != '' ) ? ' width="'.$lobSection->getWidth().'"'         : '';
			$lstHeight         = ( $lobSection->getHeight()    != '' ) ? ' height="'.$lobSection->getHeight().'"'       : '';
			$lstAlign          = ( $lobSection->getAlign()     != '' ) ? ' align="'.$lobSection->getAlign().'"'         : '';
			$lstTypeHtml       = $layTypeSection[ $lstType ];
			$lstAttributes     = $lstId.$lstClass.$lstStyle.$lstTabindex.$lstAccesskey.$lstTitle.$lstWidth.$lstHeight.$lstAlign;

			$lnuTotalRows  = $lobSection->getLengthRows();
			$layRows       = $lobSection->getRows();

			if( $lnuTotalRows > 0 )
				$lstRows       = $this->mGetRowsHTML( $layRows,$lnuTotalRows,$lstTypeHtml );
			
			$this->lstSeccionesHtml .= "\n\t<".$lstTypeHtml.$lstAttributes.'>'.$lstRows."\n\t</".$lstTypeHtml.'>';
		}
	}

	public function mGetRowsHTML( $payRows,$pnuTotalRows,$pstTypeHtml )
	{
		$lnuTotalRows   = $pnuTotalRows;
		$lstRowsCells   = '';
		$lstTypeCell    = ( $pstTypeHtml == 'thead' ) ? 'th' : 'td';

		if( $lnuTotalRows > 0 )
		{
			foreach ( $payRows as $layRows => $lobRow )
			{
				$lstRow              = '';
				$lstId               = ( $lobRow->getId()        != '' ) ? ' id="'.$lobRow->getId().'"'               : '';
				$lstClass            = ( $lobRow->getClass()     != '' ) ? ' class="'.$lobRow->getClass().'"'         : '';
				$lstStyle            = ( $lobRow->getStyle()     != '' ) ? ' style="'.$lobRow->getStyle().'"'         : '';
				$lstTabindex         = ( $lobRow->getTabindex()  != '' ) ? ' tabindex="'.$lobRow->getTabindex().'"'   : '';
				$lstAccesskey        = ( $lobRow->getAccesskey() != '' ) ? ' accesskey="'.$lobRow->getAccesskey().'"' : '';
				$lstTitle            = ( $lobRow->getTitle()     != '' ) ? ' title="'.$lobRow->getTitle().'"'         : '';
				$lboVisible          = $lobRow->getVisible();
				$lstAtributos        = $lstId.$lstClass.$lstStyle.$lstTabindex.$lstAccesskey.$lstTitle;
				$lnuLengthCeldas     = $lobRow->getLengthCells();
				$lnuLengthAttributes = $lobRow->getLengthAttributes();
				$lnuLengthEvents     = $lobRow->getLengthEvents();
				$layCells            = ( $lnuLengthCeldas     > 0 ) ? $lobRow->getCells()        : array();
				$layAttributesAdd    = ( $lnuLengthAttributes > 0 ) ? $lobRow->getAttributesAdd() : array();
				$layEvent            = ( $lnuLengthEvents     > 0 ) ? $lobRow->getEvent()         : array();
				$lstAtributos       .= $this->mGetAttributes( $layAttributesAdd ).$this->mGetEvents($layEvent);
				$lstCells            = $this->mGetCellsHTML( $layCells,$lstTypeCell );
				$lstRow              = "\n\t\t<tr".$lstAtributos.">".$lstCells."\n\t\t</tr>";
				$lstRowsCells       .= $lstRow;			
			}
		}

		return $lstRowsCells;
	}

	public function mGetCellsHTML( $payCells,$pstTypeCelda )
	{
		$lstCells = '';

		if( count( $payCells ) > 0 )
		{
			foreach ($payCells as $layCells => $lobCell )
			{
				$lstCell             = '';
				$lstId               = ( $lobCell->getId()              !='' ) ? ' id="'.$lobCell->getId().'"'                   : '';
				$lstClass            = ( $lobCell->getClass()           !='' ) ? ' class="'.$lobCell->getClass().'"'             : '';
				$lstStyle            = ( $lobCell->getStyle()           !='' ) ? ' style="'.$lobCell->getStyle().'"'             : '';
				$lstTabindex         = ( $lobCell->getTabindex()        !='' ) ? ' tabindex="'.$lobCell->getTabindex().'"'       : '';
				$lstAccesskey        = ( $lobCell->getAccesskey()       !='' ) ? ' accesskey="'.$lobCell->getAccesskey().'"'     : '';
				$lstTitle            = ( $lobCell->getTitle()           !='' ) ? ' title="'.$lobCell->getTitle().'"'             : '';
				$lstAbbr             = ( $lobCell->getAbbr()            !='' ) ? ' abbr="'.$lobCell->getAbbr().'"'               : '';
				$lstScope            = ( $lobCell->getScope()           !='' ) ? ' scop="'.$lobCell->getScope().'"'              : '';
				$lstHeaders          = ( $lobCell->getHeaders()         !='' ) ? ' headers="'.$lobCell->getHeaders().'"'         : '';
				$lstWidth            = ( $lobCell->getWidth()           !='' ) ? ' width="'.$lobCell->getWidth().'"'             : '';
				$lstHeight           = ( $lobCell->getHeight()          !='' ) ? ' height="'.$lobCell->getHeight().'"'           : '';
				$lstVerticalAlign    = ( $lobCell->getVerticalAlign()   !='' ) ? ' valign="'.$lobCell->getVerticalAlign().'"'    : '';
				$lstAlign            = ( $lobCell->getAlign()           !='' ) ? ' align="'.$lobCell->getAlign().'"'             : '';
				$lstBackgroundColor  = ( $lobCell->getBackgroundColor() !='' ) ? ' bgcolor="'.$lobCell->getBackgroundColor().'"' : '';
				$lnuColspan          = ( $lobCell->getColspan()          > 1 ) ? ' colspan="'.$lobCell->getColspan().'"'         : '';
				$lnuRowspan          = ( $lobCell->getRowspan()          > 1 ) ? ' rowspan="'.$lobCell->getRowspan().'"'         : '';
				//$lstBorder           = ( $lobCell->getBorder()          !='' ) ? ' ="'.$lobCell->getBorder().'"'          : '1px solid black';
				//$lstfont             = ( $lobCell->getfont()            !='' ) ? ' ="'.$lobCell->getfont().'"'            : '';
				$lstHtml             = ( $lobCell->getHtml()            !='' ) ? $lobCell->getHtml()     : '';
				$lstValue            = ( $lobCell->getValue()           !='' ) ? $lobCell->getValue()    : '';
				$lstType             = ( $lobCell->getType()            !='' ) ? $lobCell->getType()     : $pstTypeCelda;
				$lstDataType         = ( $lobCell->getDataType()        !='' ) ? $lobCell->getDataType() : 'string';
				$lstCapsulaHtml      = $lobCell->getCapsulaHtml();

				$lboUnlockedCell     = $lobCell->getUnlockedCell();
				$lboMostrarCeros     = $lobCell->getMostrarCeros();
				$lnuLengthEvents     = $lobCell->getLengthEvents();
				$lnuLengthAttributes = $lobCell->getLengthAttributes();

				$layEvent            = ( $lnuLengthEvents     > 0 ) ? $lobCell->getEvent()         : array();
				$layAttributesAdd    = ( $lnuLengthAttributes > 0 ) ? $lobCell->getAttributesAdd() : array();

				$lstAtributos        = $lstId.$lstClass.$lnuColspan.$lnuRowspan.$lstStyle.$lstTabindex.$lstAccesskey.$lstTitle.$lstAbbr.$lstScope.$lstHeaders.$lstWidth.$lstHeight.$lstVerticalAlign.$lstAlign.$lstBackgroundColor;
				$lstAtributos       .= $this->mGetAttributes($layAttributesAdd).$this->mGetEvents($layEvent);

				$this->lobNumberFormat->setDocumentType('HTML');

				if( $lstHtml == '' && $lstValue == '' )
				{
					//--> Si esta activa el mostrar ceros y la celda no tiene valor se muestra el cero en el formato indicado.
					if( $lboMostrarCeros )
						$lstValue     = ( $lstDataType != '' && $lstDataType != 'string') ? $this->lobNumberFormat->mApplyFormat( '',$lstDataType ) : 0;
					else
						$lstValue = '';
				}
				else
				{
					//--> Validamos si el valor para HTML existe si no se intenta validar si value tiene algún valor y se usa eso.
					$lstValue = ( $lstHtml == '' && $lstValue != '' ) ? $lstValue : ( $lstHtml != '' && $lstValue == '' ) ? $lstHtml : ( $lstHtml != '' && $lstValue == '' ) ? $lstHtml : $lstHtml;
					$lstValue = ( $lstDataType != '' && $lstDataType != 'string' ) ? $this->lobNumberFormat->mApplyFormat( $lstValue,$lstDataType ) : $lstValue;
				}

				if( $lstCapsulaHtml != '' )
				{
					$lstValue = str_replace( '##', $lstValue, $lstCapsulaHtml );
				}

				//$lstCell   = "\n\t\t\t<".$lstType.$lstAtributos.">\n\t\t\t\t".$lstValue."\n\t\t\t</".$lstType.'>';
				$lstCell   = "\n\t\t\t<".$lstType.$lstAtributos.">".$lstValue."</".$lstType.'>';
				$lstCells .= $lstCell;
			}
			
		}

		return $lstCells;
	}

	public function mGetAttributes( $payAttributes )
	{
		if ( count( $payAttributes ) > 0 )
			return $this->mGetKeyValue( $payAttributes );
		else
			return '';		
	}

	public function mGetEvents( $payEvents )
	{
		if ( count( $payEvents ) > 0 )
			return $this->mGetKeyValue( $payEvents );
		else
			return '';		
	}

	private function mGetKeyValue( $payArray )
	{
		$lstResultado = '';

		foreach ( $payArray as $lstCave => $lstValue )
		{
			$lstResultado .= ' '.$lstCave.'="'.$lstValue.'"';
		}

		return $lstResultado;
	}
}

?>