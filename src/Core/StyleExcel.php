<?php
namespace ObjectTablePhp\Core;
use ObjectTablePhp\Core\CssParserToArray;
use ObjectTablePhp\Core\NumberFormat;
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Borders;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Font;

/**
* .
* @author    : Agustin Rios Reyes <nitsugario@gmail.com>
* @copyright : Copyright (c) 2018 nitsugario
* @package   : Core
*/
class StyleExcel
{
	private $lstFileCss        = '';
	private $lstSelector       = '';
	private $lstValueFormat    = '';
	private $lstDataTypeFormat = '';
	private $lnuTotalCss       =  0;
	private $lobCss            = NULL;
	private $lobNumberFormat   = NULL;
	private $layFileCss        = array();
	private $layStyleExcel     = array();
	private $layColorName      = array();
	private $layTypeColor      = array();
	private $layColorString    = array();
	private $layColorStringKey = array();
	private $layColorNameKey   = array();
	private $layUnits          = array();
	
	function __construct()
	{
		$this->lobCss            = new CssParserToArray();
		$this->lobNumberFormat   = new NumberFormat();
		$this->Helper            = new Sample();
		$this->layUnits          = array( 'px','%','em','mm','cm','in','pt','pc','ex','ch','rem','vw','vh','vmin','vmax','vm');
		$this->layColorName      = array('aliceblue' =>'F0F8FF','antiquewhite' =>'FAEBD7','aqua' =>'00FFFF','aquamarine' =>'7FFFD4','azure' =>'F0FFFF','beige' =>'F5F5DC','bisque' =>'FFE4C4','black' =>'000000','blanchedalmond' =>'FFEBCD','blue' =>'0000FF','blueviolet' =>'8A2BE2','brown' =>'A52A2A','burlywood' =>'DEB887','cadetblue' =>'5F9EA0','chartreuse' =>'7FFF00','chocolate' =>'D2691E','coral' =>'FF7F50','cornflowerblue' =>'6495ED','cornsilk' =>'FFF8DC','crimson' =>'DC143C','cyan' =>'00FFFF','darkblue' =>'00008B','darkcyan' =>'008B8B','darkgoldenrod' =>'B8860B','darkgray' =>'A9A9A9','darkgrey' =>'A9A9A9','darkgreen' =>'006400','darkkhaki' =>'BDB76B','darkmagenta' =>'8B008B','darkolivegreen' =>'556B2F','darkorange' =>'FF8C00','darkorchid' =>'9932CC','darkred' =>'8B0000','darksalmon' =>'E9967A','darkseagreen' =>'8FBC8F','darkslateblue' =>'483D8B','darkslategray' =>'2F4F4F','darkslategrey' =>'2F4F4F','darkturquoise' =>'00CED1','darkviolet' =>'9400D3','deeppink' =>'FF1493','deepskyBlue' =>'00BFFF','dimgray' =>'696969','dimgrey' =>'696969','dodgerblue' =>'1E90FF','firebrick' =>'B22222','floralwhite' =>'FFFAF0','forestgreen' =>'228B22','fuchsia' =>'FF00FF','gainsboro' =>'DCDCDC','ghostwhite' =>'F8F8FF','gold' =>'FFD700','goldenrod' =>'DAA520','gray' =>'808080','grey' =>'808080','green' =>'008000','greenyellow' =>'ADFF2F','honeydew' =>'F0FFF0','hotpink' =>'FF69B4','indianred' =>'CD5C5C','indigo' =>'4B0082','ivory' =>'FFFFF0','khaki' =>'F0E68C','lavender' =>'E6E6FA','lavenderblush' =>'FFF0F5','lawngreen' =>'7CFC00','lemonchiffon' =>'FFFACD','lightblue' =>'ADD8E6','lightcoral' =>'F08080','lightcyan' =>'E0FFFF','lightgoldenrodyellow' =>'FAFAD2','lightgray' =>'D3D3D3','lightgrey' =>'D3D3D3','lightgreen' =>'90EE90','lightpink' =>'FFB6C1','lightsalmon' =>'FFA07A','lightseagreen' =>'20B2AA','lightskyblue' =>'87CEFA','lightslategray' =>'778899','lightslategrey' =>'778899','lightsteelblue' =>'B0C4DE','lightyellow' =>'FFFFE0','lime' =>'00FF00','limegreen' =>'32CD32','linen' =>'FAF0E6','magenta' =>'FF00FF','maroon' =>'800000','mediumaquamarine' =>'66CDAA','mediumblue' =>'0000CD','mediumorchid' =>'BA55D3','mediumpurple' =>'9370DB','mediumseaGreen' =>'3CB371','mediumslateBlue' =>'7B68EE','mediumspringGreen' =>'00FA9A','mediumturquoise' =>'48D1CC','mediumvioletred' =>'C71585','midnightblue' =>'191970','mintcream' =>'F5FFFA','mistyrose' =>'FFE4E1','moccasin' =>'FFE4B5','navajowhite' =>'FFDEAD','navy' =>'000080','oldlace' =>'FDF5E6','olive' =>'808000','olivedrab' =>'6B8E23','orange' =>'FFA500','orangered' =>'FF4500','orchid' =>'DA70D6','palegoldenRod' =>'EEE8AA','palegreen' =>'98FB98','paleturquoise' =>'AFEEEE','palevioletred' =>'DB7093','papayawhip' =>'FFEFD5','peachpuff' =>'FFDAB9','peru' =>'CD853F','pink' =>'FFC0CB','plum' =>'DDA0DD','powderblue' =>'B0E0E6','purple' =>'800080','rebeccapurple' =>'663399','red' =>'FF0000','rosybrown' =>'BC8F8F','royalblue' =>'4169E1','saddlebrown' =>'8B4513','salmon' =>'FA8072','sandybrown' =>'F4A460','seagreen' =>'2E8B57','seashell' =>'FFF5EE','sienna' =>'A0522D','silver' =>'C0C0C0','skyblue' =>'87CEEB','slateblue' =>'6A5ACD','slategray' =>'708090','slategrey' =>'708090','snow' =>'FFFAFA','springgreen' =>'00FF7F','steelblue' =>'4682B4','tan' =>'D2B48C','teal' =>'008080','thistle' =>'D8BFD8','tomato' =>'FF6347','turquoise' =>'40E0D0','violet' =>'EE82EE','wheat' =>'F5DEB3','white' =>'FFFFFF','whitesmoke' =>'F5F5F5','yellow' =>'FFFF00','yellowgreen' =>'9ACD32');
		$this->layTypeColor      = array('rgb','rgba','#','hsl','hsla','hwb');
		$this->layColorString    = array('transparent' =>'FFFFFF','initial' =>'FFFFFF','inherit' =>'FFFFFF');
		$this->layColorStringKey = array_keys($this->layColorString);
		$this->layColorNameKey   = array_keys($this->layColorName);
	}

	public function setStyleSelector( $pstValue = '' ){ $this->lstSelector = $pstValue;}
	public function getStyleSelector(){ return $this->lstSelector;}
	public function getNumberFormat(){ return $this->lstDataTypeFormat; }
	public function getValueNumberFormat(){ return $this->lstValueFormat; }

	public function setNumberFormat( $pstValue, $plstDataType )
	{
		$this->lobNumberFormat->setDocumentType('EXCEL');
		$this->lstDataTypeFormat  = $this->lobNumberFormat->mApplyFormat( $pstValue,$plstDataType );
		$this->lstValueFormat     = $this->lobNumberFormat->getValueFormat();
	}
	
	public function setStyleFileCss( $pstValue = '' )
	{
		$this->lstFileCss  = $pstValue;

		$this->lobCss->setFileCss( $this->lstFileCss );

		$this->lnuTotalCss = $this->lobCss->getCountCss();
		$this->layFileCss  = $this->lobCss->getCssParser();
	}

	public function setStyleDataCss( $pstCss = '' )
	{
		$this->lobCss->setDataCss($pstCss);

		$this->lnuTotalCss = $this->lobCss->getCountCss();
		$this->layFileCss  = $this->lobCss->getCssParser();
	}

	public function setStyleAlignment( $pstAlign )
	{
		if( $pstAlign == '' )
			return ;
		 
		if( $pstAlign == 'center' )
			$this->layStyleExcel['alignment']['horizontal']	= Alignment::HORIZONTAL_CENTER;							
		if( $pstAlign == 'right'  )
			$this->layStyleExcel['alignment']['horizontal']	= Alignment::HORIZONTAL_RIGHT;		
		if( $pstAlign == 'left'   )
			$this->layStyleExcel['alignment']['horizontal']	= Alignment::HORIZONTAL_LEFT;
	}

	public function setStyleFont( $pstFontClass )
	{
		if( $pstFontClass == '' )
			return ;
						
		$lstFontColor	= $this->lobCss->getProperty( $pstFontClass, 'color' );		
		$lstFontColor	= $this->mValidateColor( $lstFontColor );		
				
		$this->layStyleExcel['font']['color']['rgb'] 	= $lstFontColor;
	}

	public function getStyleExcel()
	{
		$this->mCssParserToExcel();
		return $this->layStyleExcel;
	}

	private function mCssParserToExcel()
	{
		$this->layStyleExcel								= array();	
		$this->layStyleExcel['font']						= array();
		$this->layStyleExcel['font']['name']				= 'Arial';
		$this->layStyleExcel['font']['bold']				= false;
		$this->layStyleExcel['font']['italic']				= false;
		//$this->layStyleExcel['font']['underline']	        = Font::UNDERLINE_DOUBLE;
		//$this->layStyleExcel['font']['strikethrough']	    = false;
		$this->layStyleExcel['font']['color']				= array( 'rgb' => '000000' );
		$this->layStyleExcel['font']['size']				= 8;
		
		
		$this->layStyleExcel['borders']						= array();
		//$this->layStyleExcel['borders']['borderStyle']	= Border::BORDER_DASHDOT ;
		//$this->layStyleExcel['borders']['color']			= array( 'argb' => Color::COLOR_BLACK );
		//$this->layStyleExcel['borders']['color']			= array( 'rgb'  => 'FFFFFF' );
		
		$this->layStyleExcel['alignment']					= array();
		$this->layStyleExcel['alignment']['vertical']		= Alignment::VERTICAL_CENTER;
		$this->layStyleExcel['alignment']['wrap']			= true;
		
		$this->layStyleExcel['fill']						= array();
		$this->layStyleExcel['fill']['fillType']			= Fill::FILL_SOLID;
				
		//-- Borders --//
		$layBorder            = $this->getStyleBorder();
		$lstBorderTopWidth    = $layBorder['Top']['Width'];
		$lstBorderTopStyle    = $layBorder['Top']['Style'];
		$lstBorderTopColor    = $layBorder['Top']['Color'];

		$lstBorderRightWidth  = $layBorder['Righ']['Width'];
		$lstBorderRightStyle  = $layBorder['Righ']['Style'];
		$lstBorderRightColor  = $layBorder['Righ']['Color'];

		$lstBorderBottomWidth = $layBorder['Bottom']['Width'];
		$lstBorderBottomStyle = $layBorder['Bottom']['Style'];
		$lstBorderBottomColor = $layBorder['Bottom']['Color'];

		$lstBorderLeftWidth   = $layBorder['Left']['Width'];
		$lstBorderLeftStyle   = $layBorder['Left']['Style'];
		$lstBorderLeftColor   = $layBorder['Left']['Color'];

		if( $lstBorderTopWidth != '' || $lstBorderTopStyle != '' )
			$this->layStyleExcel['borders']['top'] 	 = array( 'borderStyle' => $lstBorderTopStyle   ,'color' => array('rgb' => $lstBorderTopColor    ) );

		if( $lstBorderRightWidth != '' || $lstBorderRightStyle != '' )
			$this->layStyleExcel['borders']['right']  = array( 'borderStyle' => $lstBorderRightStyle ,'color' => array('rgb' => $lstBorderRightColor  ) );

		if( $lstBorderBottomWidth != '' || $lstBorderBottomStyle != '' )
			$this->layStyleExcel['borders']['bottom'] = array( 'borderStyle' => $lstBorderBottomStyle ,'color' => array('rgb' => $lstBorderBottomColor ) );

		if( $lstBorderLeftWidth != '' || $lstBorderLeftStyle != '' )
			$this->layStyleExcel['borders']['left']   = array( 'borderStyle' => $lstBorderLeftStyle   ,'color' => array('rgb' => $lstBorderLeftColor   ) );
		
		//-- Background --//
		$lstBackgroundColor	  = $this->getStyleBackground();

		if( $lstBackgroundColor != '' )
			$this->layStyleExcel['fill']['color']['rgb'] = $lstBackgroundColor;
				
		//-- Alignment --//
		$lstTextAlign		  = $this->lobCss->getProperty( $this->lstSelector, 'text-align' );

		if( $lstTextAlign != '' ) 
		{
			if( $lstTextAlign == 'center' )
				$this->layStyleExcel['alignment']['horizontal']	= Alignment::HORIZONTAL_CENTER;									
			elseif( $lstTextAlign == 'right' )
				$this->layStyleExcel['alignment']['horizontal']	= Alignment::HORIZONTAL_RIGHT;				
			elseif( $lstTextAlign == 'left' )
				$this->layStyleExcel['alignment']['horizontal']	= Alignment::HORIZONTAL_LEFT;
			else
				$this->layStyleExcel['alignment']['horizontal']	= Alignment::HORIZONTAL_LEFT;
		}
		
		//-- Font --//
		//-->Without support for font: font-style font-variant font-weight font-size/line-height font-family|caption|icon|menu|message-box|small-caption|status-bar|initial|inherit; 
		$layFontStringName  = array('initial'=>'Arial','inherit'=>'Arial');
		$layFontStringSize  = array('xx-small'=>9,'x-small'=>10,'small'=>11,'medium'=>13,'large'=>15,'x-large'=>16,'xx-large'=>17,'smaller'=>19,'larger'=>21,'initial'=>11,'inherit'=>11);
		$lstFontFamily		= $this->lobCss->getProperty( $this->lstSelector, 'font-family' );
		$lstFontStyle		= $this->lobCss->getProperty( $this->lstSelector, 'font-style'  );
		$lstFontWeight		= $this->lobCss->getProperty( $this->lstSelector, 'font-weight' );
		$lstFontSize		= $this->lobCss->getProperty( $this->lstSelector, 'font-size'   );
		$lstFontColor		= $this->lobCss->getProperty( $this->lstSelector, 'color'       );
		
		if( $lstFontFamily  != '' )
		{
			if( !in_array($lstFontFamily, $layFontStringName))
				$lstFontFamily = $layFontStringName[$lstFontFamily];

			$this->layStyleExcel['font']['name']	= $lstFontFamily;
		}

		if( $lstFontStyle  == 'italic' )
			$this->layStyleExcel['font']['italic']	= true;
		else
			$this->layStyleExcel['font']['italic']	= false;

		if( $lstFontWeight  == 'bold' || $lstFontWeight  == '600' || $lstFontWeight  == '700' || $lstFontWeight  == '800'|| $lstFontWeight  == '900' )
			$this->layStyleExcel['font']['bold']	= true;
		else
			$this->layStyleExcel['font']['bold']	= false;
				
		if( $lstFontSize != '' )
		{
			if( !in_array($lstFontSize, $layFontStringSize))
				$lstFontSize = $layFontStringSize[$lstFontSize];
			else
				$lstFontSize = $this->mRemoveTypeUnits( $lstFontSize );

			$this->layStyleExcel['font']['size'] = $lstFontSize;
		}
		
		if( $lstFontColor != '' )
		{
			$lstFontColor	= $this->mValidateColor($lstFontColor );				
			$this->layStyleExcel['font']['color']['rgb'] = $lstFontColor;
		}
	}
	
	private function getStyleBackground()
	{
		$lstBackground		  = $this->lobCss->getProperty( $this->lstSelector, 'background' );
		$lstBackgroundColor	  = $this->lobCss->getProperty( $this->lstSelector, 'background-color' );

		if( $lstBackground != '' )
		{
			$lstColor          = mb_strtolower($lstBackground, 'UTF-8');
			$lstColor          = trim($lstColor);
			$layMatchs         = array();

			preg_match_all( $this->mCreateRegularExpression(), $lstColor,$layMatchs);
			$lnuTotal = count($layMatchs[0]);
			//$this->Helper->log("CssColorT ".$lnuTotal);
			if( $lnuTotal > 0 )
				return $this->mValidateColor($layMatchs[0][0]);
			else
				return '';
		}

		if( $lstBackgroundColor != '')
			return $this->mValidateColor($lstBackgroundColor);
	}
	
	private function getStyleBorder()
	{
		$lstBorders 		  = '';
		$lstBorderWidth       = '';
		$lstBorderColor       = '';
		$lstBorderStyle       = '';
		$lstBorderTopWidth    = '';
		$lstBorderTopColor    = '';
		$lstBorderTopStyle    = '';
		$lstBorderRightWidth  = '';
		$lstBorderRightColor  = '';
		$lstBorderRightStyle  = '';
		$lstBorderBottomWidth = '';
		$lstBorderBottomColor = '';
		$lstBorderBottomStyle = '';
		$lstBorderLeftWidth   = '';
		$lstBorderLeftColor   = '';
		$lstBorderLeftStyle   = '';

		$lstRBordeTopWidth    = '';
		$lstRBordeTopStyle    = '';
		$lstRBordeTopColor    = '';

		$lstRBordeRightWidth  = '';
		$lstRBordeRightStyle  = '';
		$lstRBordeRightColor  = '';

		$lstRBordeBottomWidth = '';
		$lstRBordeBottomStyle = '';
		$lstRBordeBottomColor = '';

		$lstRBordeLeftWidth   = '';
		$lstRBordeLeftStyle   = '';
		$lstRBordeLeftColor   = '';

		$layPropertiesBorder  = array();

		$lstBorders 		  = $this->lobCss->getProperty( $this->lstSelector, 'border'              );

		$lstBorderWidth       = $this->lobCss->getProperty( $this->lstSelector, 'border-width'        );
		$lstBorderStyle       = $this->lobCss->getProperty( $this->lstSelector, 'border-style'        );
		$lstBorderColor       = $this->lobCss->getProperty( $this->lstSelector, 'border-color'        );

		$lstBorderTopWidth    = $this->lobCss->getProperty( $this->lstSelector, 'border-top-width'    );
		$lstBorderTopStyle    = $this->lobCss->getProperty( $this->lstSelector, 'border-top-style'    );
		$lstBorderTopColor    = $this->lobCss->getProperty( $this->lstSelector, 'border-top-color'    );

		$lstBorderRightWidth  = $this->lobCss->getProperty( $this->lstSelector, 'border-right-width'  );
		$lstBorderRightStyle  = $this->lobCss->getProperty( $this->lstSelector, 'border-right-style'  );
		$lstBorderRightColor  = $this->lobCss->getProperty( $this->lstSelector, 'border-right-color'  );

		$lstBorderBottomWidth = $this->lobCss->getProperty( $this->lstSelector, 'border-bottom-width' );
		$lstBorderBottomStyle = $this->lobCss->getProperty( $this->lstSelector, 'border-bottom-style' );
		$lstBorderBottomColor = $this->lobCss->getProperty( $this->lstSelector, 'border-bottom-color' );

		$lstBorderLeftWidth   = $this->lobCss->getProperty( $this->lstSelector, 'border-left-width'   );
		$lstBorderLeftStyle   = $this->lobCss->getProperty( $this->lstSelector, 'border-left-style'   );
		$lstBorderLeftColor   = $this->lobCss->getProperty( $this->lstSelector, 'border-left-color'   );

		if( $lstBorders != '' )
		{
			$layPropertiesBorde = explode( ' ', trim($lstBorders) );

			$layWidth = ( isset($layPropertiesBorde[0] ) ) ? $this->mWidthParserBorder( $layPropertiesBorde[0], 'Border' )  : $this->mWidthParserBorder( 'px', 'Border' ) ;
			$layStyle = ( isset($layPropertiesBorde[1] ) ) ? $this->mStyleParserBorder( $layPropertiesBorde[1] ) : $this->mStyleParserBorder( ' ' ) ;
			$layColor = ( isset($layPropertiesBorde[2] ) ) ? $this->mColorParserBorder( $layPropertiesBorde[2] ) : $this->mColorParserBorder( ' ' ) ;

			$lstRBordeTopWidth    = $layWidth['Top'];
			$lstRBordeTopStyle    = $layStyle['Top'];
			$lstRBordeTopColor    = $layColor['Top'];
			
			$lstRBordeRightWidth  = $layWidth['Right'];
			$lstRBordeRightStyle  = $layStyle['Right'];
			$lstRBordeRightColor  = $layColor['Right'];
			
			$lstRBordeBottomWidth = $layWidth['Bottom'];
			$lstRBordeBottomStyle = $layStyle['Bottom'];
			$lstRBordeBottomColor = $layColor['Bottom'];
			
			$lstRBordeLeftWidth   = $layWidth['Left'];
			$lstRBordeLeftStyle   = $layStyle['Left'];
			$lstRBordeLeftColor   = $layColor['Left'];		
		}
		else if ( $lstBorderStyle != '' || $lstBorderWidth != '' )
		{
			$layWidth = ( $lstBorderWidth != '' ) ? $this->mWidthParserBorder( $lstBorderWidth, 'Border' )  : $this->mWidthParserBorder( 'px', 'Border' ) ;
			$layStyle = ( $lstBorderStyle != '' ) ? $this->mStyleParserBorder( $lstBorderStyle ) : $this->mStyleParserBorder( ' ' ) ;
			$layColor = ( $lstBorderColor != '' ) ? $this->mColorParserBorder( $lstBorderColor ) : $this->mColorParserBorder( ' ' ) ;

			$lstRBordeTopWidth    = $layWidth['Top'];
			$lstRBordeTopStyle    = $layStyle['Top'];
			$lstRBordeTopColor    = $layColor['Top'];
			
			$lstRBordeRightWidth  = $layWidth['Right'];
			$lstRBordeRightStyle  = $layStyle['Right'];
			$lstRBordeRightColor  = $layColor['Right'];
			
			$lstRBordeBottomWidth = $layWidth['Bottom'];
			$lstRBordeBottomStyle = $layStyle['Bottom'];
			$lstRBordeBottomColor = $layColor['Bottom'];
			
			$lstRBordeLeftWidth   = $layWidth['Left'];
			$lstRBordeLeftStyle   = $layStyle['Left'];
			$lstRBordeLeftColor   = $layColor['Left'];
		}
		else
		{
			$lstRBordeTopWidth    = ( $lstBorderTopWidth    != '' ) ? $this->mValidateBorderWidth( $lstBorderTopWidth   ) : '';
			$lstRBordeTopStyle    = ( $lstBorderTopStyle    != '' ) ? $this->mValidateBorderStyle( $lstBorderTopStyle   ) : '';
			$lstRBordeTopColor    = ( $lstBorderTopColor    != '' ) ? $this->mValidateColor( $lstBorderTopColor )   : '';
			
			$lstRBordeRightWidth  = ( $lstBorderRightWidth  != '' ) ? $this->mValidateBorderWidth( $lstBorderRightWidth ) : '';
			$lstRBordeRightStyle  = ( $lstBorderRightStyle  != '' ) ? $this->mValidateBorderStyle( $lstBorderRightStyle ) : '';
			$lstRBordeRightColor  = ( $lstBorderRightColor  != '' ) ? $this->mValidateColor( $lstBorderRightColor ) : '';
			
			$lstRBordeBottomWidth = ( $lstBorderBottomWidth != '' ) ? $this->mValidateBorderWidth( $lstBorderBottomWidth) : '';
			$lstRBordeBottomStyle = ( $lstBorderBottomStyle != '' ) ? $this->mValidateBorderStyle( $lstBorderBottomStyle) : '';
			$lstRBordeBottomColor = ( $lstBorderBottomColor != '' ) ? $this->mValidateColor( $lstBorderBottomColor ): '';
			
			$lstRBordeLeftWidth   = ( $lstBorderLeftWidth   != '' ) ? $this->mValidateBorderWidth( $lstBorderLeftWidth  ) : '';
			$lstRBordeLeftStyle   = ( $lstBorderLeftStyle   != '' ) ? $this->mValidateBorderStyle( $lstBorderLeftStyle  ) : '';
			$lstRBordeLeftColor   = ( $lstBorderLeftColor   != '' ) ? $this->mValidateColor( $lstBorderLeftColor )  : '';
		}

		$layPropertiesBorder['Top']['Width']    = $lstRBordeTopWidth;
		$layPropertiesBorder['Top']['Style']    = $lstRBordeTopStyle;
		$layPropertiesBorder['Top']['Color']    = $lstRBordeTopColor;

		$layPropertiesBorder['Righ']['Width']   = $lstRBordeRightWidth;
		$layPropertiesBorder['Righ']['Style']   = $lstRBordeRightStyle;
		$layPropertiesBorder['Righ']['Color']   = $lstRBordeRightColor;

		$layPropertiesBorder['Bottom']['Width'] = $lstRBordeBottomWidth;
		$layPropertiesBorder['Bottom']['Style'] = $lstRBordeBottomStyle;
		$layPropertiesBorder['Bottom']['Color'] = $lstRBordeBottomColor;

		$layPropertiesBorder['Left']['Width']   = $lstRBordeLeftWidth;
		$layPropertiesBorder['Left']['Style']   = $lstRBordeLeftStyle;
		$layPropertiesBorder['Left']['Color']   = $lstRBordeLeftColor;

		return $layPropertiesBorder;
	}

	private function mWidthParserBorder( $pstWidth, $pstType = '' )
	{
		$lstTopWidth    = '';
		$lstRightWidth  = '';
		$lstBottomWidth = '';
		$lstLeftWidth   = '';
		$lnuTotalString = 0;
		$layWidth       = array();
		$layWidthResul  = array();
		$lstWidth       = mb_strtolower($pstWidth, 'UTF-8');

		$lnuTotalString = strlen( trim($lstWidth) );

		if( $lnuTotalString > 0)
		{
			$layWidth = explode(' ', trim( $lstWidth ) );
			$lnuTotal = count($layWidth);
			switch ( $lnuTotal) {
				case 1:
					if( $pstType == 'Border')
					{
						$lstWidth       = $this->mValidateBorderWidth( $layWidth[0]);
						$lstTopWidth    = $lstWidth;
						$lstRightWidth  = $lstWidth;
						$lstBottomWidth = $lstWidth;
						$lstLeftWidth   = $lstWidth;
					}
					else
					{
						$lstWidth       = $this->mValidateValueWidth( $layWidth[0] );
						$lstTopWidth    = $lstWidth;
						$lstRightWidth  = $lstWidth;
						$lstBottomWidth = $lstWidth;
						$lstLeftWidth   = $lstWidth;
					}
					break;
				case 2:
				case 3:
					if( $pstType == 'Border')
					{
						$lstWidthTB     = $this->mValidateBorderWidth( $layWidth[0]);
						$lstWidthLR     = $this->mValidateBorderWidth( $layWidth[1]);
						$lstTopWidth    = $lstWidthTB;
						$lstRightWidth  = $lstWidthLR;
						$lstBottomWidth = $lstWidthTB;
						$lstLeftWidth   = $lstWidthLR;
					}
					else
					{
						$lstWidthTB     = $this->mValidateValueWidth( $layWidth[0] );
						$lstWidthLR     = $this->mValidateValueWidth( $layWidth[1] );
						$lstTopWidth    = $lstWidthTB;
						$lstRightWidth  = $lstWidthLR;
						$lstBottomWidth = $lstWidthTB;
						$lstLeftWidth   = $lstWidthLR;
					}
					break;
				case 4:
					if( $pstType == 'Border')
					{
						$lstTopWidth    = $this->mValidateBorderWidth( $layWidth[0]);
						$lstRightWidth  = $this->mValidateBorderWidth( $layWidth[1]);
						$lstBottomWidth = $this->mValidateBorderWidth( $layWidth[2]);
						$lstLeftWidth   = $this->mValidateBorderWidth( $layWidth[4]);
					}
					else
					{
						$lstTopWidth    = $this->mValidateValueWidth( $layWidth[0] );
						$lstRightWidth  = $this->mValidateValueWidth( $layWidth[1] );
						$lstBottomWidth = $this->mValidateValueWidth( $layWidth[2] );
						$lstLeftWidth   = $this->mValidateValueWidth( $layWidth[4] );
					}
					break;
				default:
					$lstTopWidth    = '';
					$lstRightWidth  = '';
					$lstBottomWidth = '';
					$lstLeftWidth   = '';
					break;
			}
		}

		$layWidthResul['Top']    = $lstTopWidth;
		$layWidthResul['Right']  = $lstRightWidth;
		$layWidthResul['Bottom'] = $lstBottomWidth;
		$layWidthResul['Left']   = $lstLeftWidth;

		return $layWidthResul;
	}

	private function mValidateBorderWidth( $pstWidth )
	{
		$layBorder      = array('medium' => 'medium','thin' => 'thin','thick' => 'thick','initial' => 'thin','inherit' => 'hair','auto' =>'thin');
		$layBorderKey   = array_keys($layBorder);
		$lstWidth       = mb_strtolower($pstWidth, 'UTF-8');
		$lstWidth       = trim($lstWidth);
		$lnuTotalString = strlen( trim($lstWidth) );

		if( $lnuTotalString > 0)
		{
			if( in_array($lstWidth, $layBorderKey))
				$lstWidth = $layBorder[$lstWidth];
			else
				$lstWidth =  $this->mValidateValueWidth( $lstWidth );
		}
		else
			$lstWidth = '';

		return $lstWidth;
	}

	private function mValidateValueWidth( $pstWidth )
	{
		$laySting       = array('auto' => 1,'initial' => 1,'inherit' => 1);
		$layStingKey    = array_keys($laySting);
		$lstWidth       = mb_strtolower($pstWidth, 'UTF-8');
		$lstWidth       = trim($lstWidth);
		$lnuTotalString = strlen( trim($lstWidth) );

		if( $lnuTotalString > 0)
		{
			for ($xS=0; $xS < count($layStingKey) ; $xS++)
			{ 
				if( strpos($lstWidth ,$layStingKey[$xS] ) !== false )
					$lstWidth = str_replace( $layStingKey[$xS], $laySting[$layStingKey[$xS]], $lstWidth);
				else
					continue;
			}

			$lstWidth = $this->mRemoveTypeUnits( $lstWidth );
		}
		else
			$lstWidth = '';

		return $lstWidth;
	}

	private function mRemoveTypeUnits( $pstString )
	{
		for ($xU=0; $xU < count($this->layUnits) ; $xU++)
			{
				if( strpos($pstString ,$this->layUnits[$xU] ) !== false )
					$pstString = str_replace( $this->layUnits[$xU], '', $pstString);
				else
					continue;
			}

		return $pstString;
	}

	private function mStyleParserBorder( $pstStyle )
	{
		$lstTopStyle    = '';
		$lstRightStyle  = '';
		$lstBottomStyle = '';
		$lstLeftStyle   = '';
		$layStyleResul  = array();
		$lstStyle       = mb_strtolower($pstStyle, 'UTF-8');
		$lstStyle       = trim($lstStyle);
		$lnuTotalString = strlen( trim($lstStyle) );

		if( $lnuTotalString > 0)
		{
			$layStyle = explode(' ', trim( $lstStyle ) );
			$lnuTotal = count($layStyle);

			switch ( $lnuTotal ) {
				case 1:
					$lstStyle       = $this->mValidateBorderStyle( $layStyle[0]);
					$lstTopStyle    = $lstStyle;
					$lstRightStyle  = $lstStyle;
					$lstBottomStyle = $lstStyle;
					$lstLeftStyle   = $lstStyle;
					break;
				case 2:
				case 3:
					$lstStyleTB     = $this->mValidateBorderStyle( $layStyle[0]);
					$lstStyleLR     = $this->mValidateBorderStyle( $layStyle[1]);
					$lstTopStyle    = $lstStyleTB;
					$lstRightStyle  = $lstStyleLR;
					$lstBottomStyle = $lstStyleTB;
					$lstLeftStyle   = $lstStyleLR;
					break;
				case 4:
					$lstTopStyle    = $this->mValidateBorderStyle( $layStyle[0]);
					$lstRightStyle  = $this->mValidateBorderStyle( $layStyle[1]);
					$lstBottomStyle = $this->mValidateBorderStyle( $layStyle[2]);
					$lstLeftStyle   = $this->mValidateBorderStyle( $layStyle[3]);
					break;
				default:
					$lstTopStyle    = '';
					$lstRightStyle  = '';
					$lstBottomStyle = '';
					$lstLeftStyle   = '';
					break;
			}
		}
		
		$layStyleResul['Top']    = $lstTopStyle;
		$layStyleResul['Right']  = $lstRightStyle;
		$layStyleResul['Bottom'] = $lstBottomStyle;
		$layStyleResul['Left']   = $lstLeftStyle;

		return $layStyleResul;
	}

	private function mValidateBorderStyle( $pstStyle )
	{
		$layStyle       = array('none' => 'none','hidden' => 'none','dotted' => 'dotted','dashed' => 'dashed','solid' => 'thin','double' => 'double','groove' => 'medium','ridge' => 'medium','inset' => 'medium','outset' => 'medium','initial' => 'thin','inherit' => 'medium');
		$layStyleKey    = array_keys($layStyle);
		$lstStyle       = mb_strtolower($pstStyle, 'UTF-8');
		$lstStyle       = trim($lstStyle);
		$lnuTotalString = strlen( trim($lstStyle) );

		if( $lnuTotalString > 0)
		{
			if( in_array( $lstStyle, $layStyleKey ) )
				$lstStyle = $layStyle[$lstStyle];
			else
				$lstStyle = 'thin';	
		}
		else
			$lstStyle = 'thin';

		return $lstStyle;
	}

	private function mColorParserBorder( $pstColor )
	{
		$lstTopColor       = '';
		$lstRightColor     = '';
		$lstBottomColor    = '';
		$lstLeftColor      = '';
		$lstColor          = mb_strtolower($pstColor, 'UTF-8');
		$lstColor          = trim($lstColor);
		$lnuTotalString    = strlen($lstColor);
		$layMatchs         = array();
		$layColorResul     = array();
		$lnuTotal          = 0;
		if( $lnuTotalString > 0)
		{
			preg_match_all( $this->mCreateRegularExpression(), $lstColor,$layMatchs);
			$lnuTotal = count($layMatchs[0]);
			if( $lnuTotal > 0 )
			{
				switch ($lnuTotal) {
					case 1:
						$lstColor       = $this->mValidateColor($layMatchs[0][0]);
						$lstTopColor    = $lstColor;
						$lstRightColor  = $lstColor;
						$lstBottomColor = $lstColor;
						$lstLeftColor   = $lstColor;
						break;
					case 2:
						$lstColorTB     = $this->mValidateColor($layMatchs[0][0]);
						$lstColorLR     = $this->mValidateColor($layMatchs[0][1]);
						$lstTopColor    = $lstColorTB;
						$lstRightColor  = $lstColorLR;
						$lstBottomColor = $lstColorTB;
						$lstLeftColor   = $lstColorLR;
						break;
					case 3:
						$lstColorT      = $this->mValidateColor($layMatchs[0][0]);
						$lstColorR      = $this->mValidateColor($layMatchs[0][1]);
						$lstColorB      = $this->mValidateColor($layMatchs[0][2]);
						$lstTopColor    = $lstColorT;
						$lstRightColor  = $lstColorR;
						$lstBottomColor = $lstColorB;
						$lstLeftColor   = $lstColorR;
						break;
					case 4:
						$lstColorT      = $this->mValidateColor($layMatchs[0][0]);
						$lstColorR      = $this->mValidateColor($layMatchs[0][1]);
						$lstColorB      = $this->mValidateColor($layMatchs[0][2]);
						$lstColorL      = $this->mValidateColor($layMatchs[0][3]);
						$lstTopColor    = $lstColorT;
						$lstRightColor  = $lstColorR;
						$lstBottomColor = $lstColorB;
						$lstLeftColor   = $lstColorL;
						break;
					default:
						$lstColorT      = $this->mValidateColor($layMatchs[0][0]);
						$lstColorR      = $this->mValidateColor($layMatchs[0][1]);
						$lstColorB      = $this->mValidateColor($layMatchs[0][2]);
						$lstColorL      = $this->mValidateColor($layMatchs[0][3]);
						$lstTopColor    = $lstColorT;
						$lstRightColor  = $lstColorR;
						$lstBottomColor = $lstColorB;
						$lstLeftColor   = $lstColorL;
						break;
				}
			}
		}
		
		$layColorResul['Top']    = $lstTopColor;
		$layColorResul['Right']  = $lstRightColor;
		$layColorResul['Bottom'] = $lstBottomColor;
		$layColorResul['Left']   = $lstLeftColor;

		return $layColorResul;
	}

	private function mValidateColor( $pstColor )
	{
		$lstColor          = mb_strtolower($pstColor, 'UTF-8');
		$lstColor          = trim($lstColor);
		$lnuTotalString    = strlen($lstColor);

		if( $lnuTotalString > 0)
		{
			if( in_array($lstColor, $this->layColorStringKey) )
				return $this->layColorString[$lstColor];

			if( in_array($lstColor, $this->layColorNameKey) )
				return $this->layColorName[$lstColor];

			if( strpos($lstColor, '#') !== false )
				return str_replace('#', '', $lstColor );
			
			if( strpos($lstColor, 'rgba(') !== false || strpos($lstColor, 'rgb(') !== false )
			{
				$lstColor = str_replace('rgba(', '', $lstColor );
				$lstColor = str_replace('rgb(', '', $lstColor );
				$lstColor = trim(str_replace(')', '', $lstColor ));
				$layColor = explode(',',$lstColor);
				$lstRed   = trim($layColor[0]);
				$lstGreen = trim($layColor[1]);
				$lstBlue  = trim($layColor[2]);
				//$lstAlpha = trim($layColor[3]);

				return $this->RGBToHex($lstRed,$lstGreen,$lstBlue);
			}

			if( strpos($lstColor, 'hsla(') !== false || strpos($lstColor, 'hsl(') !== false )
			{
				$lstColor      = str_replace('hsla(', '', $lstColor );
				$lstColor      = str_replace('hsl(', '', $lstColor );
				$lstColor      = trim(str_replace(')', '', $lstColor ));
				$layColor      = explode(',',$lstColor);
				$lstHue        = trim($layColor[0]);
				$lstSaturation = trim($layColor[1]);
				$lstLightness  = trim($layColor[2]);
				//$lstAlpha = trim($layColor[3]);

				return $this->HSLToHex($lstHue,$lstSaturation,$lstLightness);
			}
		}
		else
			return $lstColor = '';
	}

	private function mCreateRegularExpression()
	{
		$lstNameColor    = '';
		$lstRegularExp   = '/(#([0-9a-f]{3}){1,2}|(rgba|hsla)\(\s?\d{1,3}%?(\s?,\s?\d{1,3}%?){2}\s?,\s?(1|0?\.\d+)\s?\)|(rgb|hsl)\(\s?\d{1,3}%?(\s?,\s?\d{1,3}%?){2}\s?\)|(';
		$lnuTotalName    = count( $this->layColorNameKey );
		$lnuTotalString  = count( $this->layColorStringKey );

		for ($xN=0; $xN < $lnuTotalName ; $xN++)
		{ 
			$lstNameColor .= $this->layColorNameKey[$xN].'|';
		}

		for ($xS=0; $xS < $lnuTotalString ; $xS++)
		{ 
			$lstNameColor .= $this->layColorStringKey[$xS].'|';
		}

		$lstRegularExp   .= trim($lstNameColor,'|').') )/i';

		return $lstRegularExp;
	}

	private function RGBToHex($lstRed, $lstGreen=-1, $lstBlue=-1)
	{
	    if ( is_array($lstRed) && sizeof($lstRed) == 3 )
	        list( $lstRed, $lstGreen, $lstBlue )  = $lstRed;

	    $lstRed   = intval($lstRed);
	    $lstGreen = intval($lstGreen);
	    $lstBlue  = intval($lstBlue);

	    $lstRed   = dechex( ($lstRed   < 0) ? 0 : ( $lstRed   > 255 ? 255 : $lstRed  ) );
	    $lstGreen = dechex( ($lstGreen < 0) ? 0 : ( $lstGreen > 255 ? 255 : $lstGreen) );
	    $lstBlue  = dechex( ($lstBlue  < 0) ? 0 : ( $lstBlue  > 255 ? 255 : $lstBlue ) );

	    $color    = (strlen($lstRed)   < 2 ? '0' : '').$lstRed;
	    $color   .= (strlen($lstGreen) < 2 ? '0' : '').$lstGreen;
	    $color   .= (strlen($lstBlue)  < 2 ? '0' : '').$lstBlue;
	    return $color;
	}

	private function HSLToHex($h, $s=-1, $l=-1)
	{
		if ( is_array($h) && sizeof($h) == 3 )
	    	list($h, $s, $l) = $h;

	    if ($s == 0) {
	        $r = $g = $b = 1;
	    } else {
	        $q = $l < 0.5 ? $l * (1 + $s) : $l + $s - $l * $s;
	        $p = 2 * $l - $q;

	        $r = $this->hue2rgb($p, $q, $h + 1/3);
	        $g = $this->hue2rgb($p, $q, $h);
	        $b = $this->hue2rgb($p, $q, $h - 1/3);
	    }

	    return $this->RGBToHex($r,$g,$b);
	}

	private function hue2rgb($p, $q, $t)
	{
	    if ($t < 0) $t += 1;
	    if ($t > 1) $t -= 1;
	    if ($t < 1/6) return $p + ($q - $p) * 6 * $t;
	    if ($t < 1/2) return $q;
	    if ($t < 2/3) return $p + ($q - $p) * (2/3 - $t) * 6;

	    return $p;
	}
}
?>