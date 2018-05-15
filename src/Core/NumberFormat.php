<?php
namespace ObjectTablePhp\Core;
use PhpOffice\PhpSpreadsheet\Helper\Sample;
/**
* .
* @author    : Agustin Rios Reyes <nitsugario@gmail.com>
* @copyright : Copyright (c) 2018 nitsugario
* @package   : Core
*/
class NumberFormat
{
	private $lstDocumentType    = 'HTML'; //-->HTML and EXCEL
	private $lstDefaultCurrency = 'MXN';
	private $lstValueFormat     = '';
	private $lstDataTypeFormat  = '';
	private $layCurrency        = array();
	private $layCurrencyKey     = array();
	private $layTypeFormats     = array();

	function __construct()
	{
		$this->layCurrency        = array(
								        'ARS' => array('code' => 'ARS','title' => 'Argentine Peso','symbol' => 'AR$'),
								        'AMD' => array('code' => 'AMD','title' => 'Armenian Dram','symbol' => 'Դ'),
								        'AWG' => array('code' => 'AWG','title' => 'Aruban Guilder','symbol' => 'Afl. '),
								        'AUD' => array('code' => 'AUD','title' => 'Australian Dollar','symbol' => 'AU$'),
								        'BSD' => array('code' => 'BSD','title' => 'Bahamian Dollar','symbol' => 'B$'),
								        'BHD' => array('code' => 'BHD','title' => 'Bahraini Dinar','symbol' => null),
								        'BDT' => array('code' => 'BDT','title' => 'Bangladesh, Taka','symbol' => null),
								        'BZD' => array('code' => 'BZD','title' => 'Belize Dollar','symbol' => 'BZ$'),
								        'BMD' => array('code' => 'BMD','title' => 'Bermudian Dollar','symbol' => 'BD$'),
								        'BOB' => array('code' => 'BOB','title' => 'Bolivia, Boliviano','symbol' => 'Bs'),
								        'BAM' => array('code' => 'BAM','title' => 'Bosnia and Herzegovina convertible mark','symbol' => 'KM '),
								        'BWP' => array('code' => 'BWP','title' => 'Botswana, Pula','symbol' => 'p'),
								        'BRL' => array('code' => 'BRL','title' => 'Brazilian Real','symbol' => 'R$'),
								        'BND' => array('code' => 'BND','title' => 'Brunei Dollar','symbol' => 'B$'),
								        'CAD' => array('code' => 'CAD','title' => 'Canadian Dollar','symbol' => 'CA$'),
								        'KYD' => array('code' => 'KYD','title' => 'Cayman Islands Dollar','symbol' => 'CI$'),
								        'CLP' => array('code' => 'CLP','title' => 'Chilean Peso','symbol' => 'CLP$'),
								        'CNY' => array('code' => 'CNY','title' => 'China Yuan Renminbi','symbol' => 'CN¥'),
								        'COP' => array('code' => 'COP','title' => 'Colombian Peso','symbol' => 'COL$'),
								        'CRC' => array('code' => 'CRC','title' => 'Costa Rican Colon','symbol' => '₡'),
								        'HRK' => array('code' => 'HRK','title' => 'Croatian Kuna','symbol' => ' kn'),
								        'CUC' => array('code' => 'CUC','title' => 'Cuban Convertible Peso','symbol' => 'CUC$'),
								        'CUP' => array('code' => 'CUP','title' => 'Cuban Peso','symbol' => 'CUP$'),
								        'CYP' => array('code' => 'CYP','title' => 'Cyprus Pound','symbol' => '£'),
								        'CZK' => array('code' => 'CZK','title' => 'Czech Koruna','symbol' => ' Kč'),
								        'DKK' => array('code' => 'DKK','title' => 'Danish Krone','symbol' => ' kr.'),
								        'DOP' => array('code' => 'DOP','title' => 'Dominican Peso','symbol' => 'RD$'),
								        'XCD' => array('code' => 'XCD','title' => 'East Caribbean Dollar','symbol' => 'EC$'),
								        'EGP' => array('code' => 'EGP','title' => 'Egyptian Pound','symbol' => 'EGP'),
								        'SVC' => array('code' => 'SVC','title' => 'El Salvador Colon','symbol' => '₡'),
								        'EUR' => array('code' => 'EUR','title' => 'Euro','symbol' => '€ '),
								        'GHC' => array('code' => 'GHC','title' => 'Ghana, Cedi','symbol' => 'GH₵'),
								        'GIP' => array('code' => 'GIP','title' => 'Gibraltar Pound','symbol' => '£'),
								        'GTQ' => array('code' => 'GTQ','title' => 'Guatemala, Quetzal','symbol' => 'Q'),
								        'HNL' => array('code' => 'HNL','title' => 'Honduras, Lempira','symbol' => 'L'),
								        'HKD' => array('code' => 'HKD','title' => 'Hong Kong Dollar','symbol' => 'HK$'),
								        'HUF' => array('code' => 'HUF','title' => 'Hungary, Forint','symbol' => ' Ft'),
								        'ISK' => array('code' => 'ISK','title' => 'Iceland Krona','symbol' => ' kr'),
								        'INR' => array('code' => 'INR','title' => 'Indian Rupee ₹','symbol' => '₹'),
								        'IDR' => array('code' => 'IDR','title' => 'Indonesia, Rupiah','symbol' => 'Rp'),
								        'IRR' => array('code' => 'IRR','title' => 'Iranian Rial','symbol' => null),
								        'JMD' => array('code' => 'JMD','title' => 'Jamaican Dollar','symbol' => 'J$'),
								        'JPY' => array('code' => 'JPY','title' => 'Japan, Yen','symbol' => '¥'),
								        'JOD' => array('code' => 'JOD','title' => 'Jordanian Dinar','symbol' => null),
								        'KES' => array('code' => 'KES','title' => 'Kenyan Shilling','symbol' => 'KSh'),
								        'KWD' => array('code' => 'KWD','title' => 'Kuwaiti Dinar','symbol' => 'K.D.'),
								        'LVL' => array('code' => 'LVL','title' => 'Latvian Lats','symbol' => 'Ls'),
								        'LBP' => array('code' => 'LBP','title' => 'Lebanese Pound','symbol' => 'LBP'),
								        'LTL' => array('code' => 'LTL','title' => 'Lithuanian Litas','symbol' => ' Lt'),
								        'MKD' => array('code' => 'MKD','title' => 'Macedonia, Denar','symbol' => 'ден '),
								        'MYR' => array('code' => 'MYR','title' => 'Malaysian Ringgit','symbol' => 'RM'),
								        'MTL' => array('code' => 'MTL','title' => 'Maltese Lira','symbol' => 'Lm'),
								        'MUR' => array('code' => 'MUR','title' => 'Mauritius Rupee','symbol' => 'Rs'),
								        'MXN' => array('code' => 'MXN','title' => 'México Peso','symbol' => 'MX$'),
								        'MZM' => array('code' => 'MZM','title' => 'Mozambique Metical','symbol' => 'MT'),
								        'NPR' => array('code' => 'NPR','title' => 'Nepalese Rupee','symbol' => null),
								        'ANG' => array('code' => 'ANG','title' => 'Netherlands Antillian Guilder','symbol' => 'NAƒ '),
								        'ILS' => array('code' => 'ILS','title' => 'New Israeli Shekel ₪','symbol' => ' ₪'),
								        'TRY' => array('code' => 'TRY','title' => 'New Turkish Lira','symbol' => '₺'),
								        'NZD' => array('code' => 'NZD','title' => 'New Zealand Dollar','symbol' => 'NZ$'),
								        'NOK' => array('code' => 'NOK','title' => 'Norwegian Krone','symbol' => 'kr '),
								        'PKR' => array('code' => 'PKR','title' => 'Pakistan Rupee','symbol' => null),
								        'PEN' => array('code' => 'PEN','title' => 'Peru, Nuevo Sol','symbol' => 'S/.'),
								        'UYU' => array('code' => 'UYU','title' => 'Peso Uruguayo','symbol' => '$U '),
								        'PHP' => array('code' => 'PHP','title' => 'Philippine Peso','symbol' => '₱'),
								        'PLN' => array('code' => 'PLN','title' => 'Poland, Zloty','symbol' => ' zł'),
								        'GBP' => array('code' => 'GBP','title' => 'Pound Sterling','symbol' => '£'),
								        'OMR' => array('code' => 'OMR','title' => 'Rial Omani','symbol' => 'OMR'),
								        'RON' => array('code' => 'RON','title' => 'Romania, New Leu','symbol' => null),
								        'ROL' => array('code' => 'ROL','title' => 'Romania, Old Leu','symbol' => null),
								        'RUB' => array('code' => 'RUB','title' => 'Russian Ruble','symbol' => ' руб'),
								        'SAR' => array('code' => 'SAR','title' => 'Saudi Riyal','symbol' => 'SAR'),
								        'SGD' => array('code' => 'SGD','title' => 'Singapore Dollar','symbol' => 'S$'),
								        'SKK' => array('code' => 'SKK','title' => 'Slovak Koruna','symbol' => ' SKK'),
								        'SIT' => array('code' => 'SIT','title' => 'Slovenia, Tolar','symbol' => null),
								        'ZAR' => array('code' => 'ZAR','title' => 'South Africa, Rand','symbol' => 'R'),
								        'KRW' => array('code' => 'KRW','title' => 'South Korea, Won ₩','symbol' => '₩'),
								        'SZL' => array('code' => 'SZL','title' => 'Swaziland, Lilangeni','symbol' => 'E'),
								        'SEK' => array('code' => 'SEK','title' => 'Swedish Krona','symbol' => ' kr'),
								        'CHF' => array('code' => 'CHF','title' => 'Swiss Franc','symbol' => 'SFr '),
								        'TZS' => array('code' => 'TZS','title' => 'Tanzanian Shilling','symbol' => 'TSh'),
								        'THB' => array('code' => 'THB','title' => 'Thailand, Baht ฿','symbol' => '฿'),
								        'TOP' => array('code' => 'TOP','title' => 'Tonga, Paanga','symbol' => 'T$ '),
								        'AED' => array('code' => 'AED','title' => 'UAE Dirham','symbol' => 'AED'),
								        'UAH' => array('code' => 'UAH','title' => 'Ukraine, Hryvnia','symbol' => ' ₴'),
								        'USD' => array('code' => 'USD','title' => 'US Dollar','symbol' => '$'),
								        'VUV' => array('code' => 'VUV','title' => 'Vanuatu, Vatu','symbol' => 'VT'),
								        'VEF' => array('code' => 'VEF','title' => 'Venezuela Bolivares Fuertes','symbol' => 'Bs.'),
								        'VEB' => array('code' => 'VEB','title' => 'Venezuela, Bolivar','symbol' => 'Bs.'),
								        'VND' => array('code' => 'VND','title' => 'Viet Nam, Dong ₫','symbol' => ' ₫'),
								        'ZWD' => array('code' => 'ZWD','title' => 'Zimbabwe Dollar','symbol' => 'Z$')
						    		);
		$this->layTypeFormats     = array('Percentage','Thousands','Decimal','Money','Round','Date','Integer','String');
		$this->layCurrencyKey     = array_keys($this->layCurrency);
	}

	public function setDocumentType( $pstValue = 'HTML' ){ $this->lstDocumentType = $pstValue; }
	public function getDocumentType()   { return $this->lstDocumentType;  }
	public function getValueFormat()    { return $this->lstValueFormat;   }
	public function getDataTypeFormat() { return $this->lstDataTypeFormat;}

	public function mApplyFormat($pstValue = '', $pstDataType = 'String',$pstSepSymbol='',$pstthousands_sep = ',',$pstdec_point = '.')
	{
		/*
		* Porcentaje-> Percentage
		* Miles	    -> Thousands
		* Decimal	-> Decimal
		* Moneda	-> Currency-Money
		* Redondear	-> Round
		* Fecha	    -> Date    
		* Entero 	-> Integer
		* cadena    -> string
		* $pstDataType = Formato_Tipo_Cantidad_Posición_Símbolo
		* $pstDataType = Format_Type_Quantity_Position_Symbol
		*
		* Example:
		* $va1 = 46765.2324545631;
		* echo $va1." -> ".mApplyFormat($va1,'Percentage__3_before');
		*/
		$lstFormat          = '';
		$lstType            = '';//-->float=f|int=i|string=s
		$lstQuantity        =  0;
		$lstPosition        = '';//-->before,after
		$lstSymbol          = '';
		$lboexists_         = strpos( $pstDataType, '_' );


		if( $lboexists_ !== false )
		{
			$layDataFormat  = explode( '_', $pstDataType);
			$lstFormat      = ( isset($layDataFormat[0]) ) ? $layDataFormat[0]      : '';
			$lstType        = ( isset($layDataFormat[1]) ) ? $layDataFormat[1]      : '';//-->float=f|int=i|string=s|Round=r
			$lstQuantity    = ( isset($layDataFormat[2]) ) ? $layDataFormat[2]      :  0;
			$lstPosition    = ( isset($layDataFormat[3]) ) ? $layDataFormat[3]      : '';//-->before,after
			$lstSymbol      = ( isset($layDataFormat[4]) ) ? $layDataFormat[4]      : '';
		}
		else{
			$lstFormat      = $pstDataType;
		}
		

		if ( in_array( $lstFormat, $this->layTypeFormats) )
		{
			switch ($lstFormat) 
			{
				case 'Percentage':
						/*
						* Example of Use $pstDataType:
						* Percentage__3_before
						* Percentage__5
						* Percentage_f_2
						* Percentage_ _0_after
						* Percentage_f_4_before
						*/
						$lstType     = ( $lstType     != '' && $lstType != ' ' ) ? $lstType     : $this->mTypeData($pstValue);
						$lstQuantity = ( $lstQuantity != 0  ) ? $lstQuantity : (( $lstType == 'f' || $lstType == 'r' ) ? -1: 0);
						$lstPosition = ( $lstPosition != '' ) ? $lstPosition : 'after';
						$lstSymbol   = ( $lstSymbol   != '' ) ? $lstSymbol   : '%';
						if($this->lstDocumentType == 'HTML' )
							$lstValue    = $this->mCreateFormat($pstValue,$lstType,$lstQuantity,$lstPosition,$lstSymbol,$pstSepSymbol,$pstdec_point,$pstthousands_sep);
						else
						{
							$lstValue    = $this->mCreateFormatExcel($pstValue,$lstType,$lstQuantity,$lstPosition,$lstSymbol,$pstSepSymbol,$pstdec_point,$pstthousands_sep);
						}
					break;
				case 'Thousands':
						/*
						* Example of Use $pstDataType:
						* Thousands_i_3
						* Thousands__5
						* Thousands_f_2
						* Thousands_ _0_before_Pesos
						* Thousands_f_4_before_EUR
						*/
						$lstType     = ( $lstType     != '' && $lstType != ' ' ) ? $lstType     : $this->mTypeData($pstValue);
						$lstQuantity = ( $lstQuantity != 0  ) ? $lstQuantity : (( $lstType == 'f' || $lstType == 'r' ) ? -1: 0);
						$lstPosition = ( $lstPosition != '' ) ? $lstPosition : 'before';
						$lstSymbol   = ( $lstSymbol   != '' ) ? $lstSymbol   : '';

						if( in_array($lstSymbol, $this->layCurrencyKey))
							$lstSymbol = $this->layCurrency[$lstSymbol]['symbol'];

						if( $this->lstDocumentType == 'HTML' )
							$lstValue    = $this->mCreateFormat($pstValue,$lstType,$lstQuantity,$lstPosition,$lstSymbol,$pstSepSymbol,$pstdec_point,$pstthousands_sep);
						else
						{
							$lstValue    = $this->mCreateFormatExcel($pstValue,$lstType,$lstQuantity,$lstPosition,$lstSymbol,$pstSepSymbol,$pstdec_point,$pstthousands_sep);
						}
					break;
				case 'Decimal':
						/*
						* Example of Use $pstDataType:
						* Decimal__3
						* Decimal__5
						* Decimal_f_2
						* Decimal_ _0_after_%
						* Decimal_f_4_before_EUR
						*/
						$lstType     = ( $lstType     != '' && $lstType != ' ' ) ? $lstType     : $this->mTypeData($pstValue);
						$lstQuantity = ( $lstQuantity != 0  ) ? $lstQuantity : 2;
						$lstPosition = ( $lstPosition != '' ) ? $lstPosition : 'before';
						$lstSymbol   = ( $lstSymbol   != '' ) ? $lstSymbol   : '';

						if( in_array($lstSymbol, $this->layCurrencyKey))
							$lstSymbol = $this->layCurrency[$lstSymbol]['symbol'];

						if($this->lstDocumentType == 'HTML' )
							$lstValue    = $this->mCreateFormat($pstValue,$lstType,$lstQuantity,$lstPosition,$lstSymbol,$pstSepSymbol,$pstdec_point,$pstthousands_sep);
						else
						{
							$lstValue    = $this->mCreateFormatExcel($pstValue,$lstType,$lstQuantity,$lstPosition,$lstSymbol,$pstSepSymbol,$pstdec_point,$pstthousands_sep);
						}
					break;
				case 'Integer':
						/*
						* Example of Use $pstDataType:
						* Integer_i
						* Integer_i_0
						* Integer_i_
						* Integer_ _0_after_%
						* Integer__0_before_EUR
						*/
						$lstType     = ( $lstType     != '' && $lstType != ' ' ) ? $lstType     : $this->mTypeData($pstValue);
						$lstQuantity = ( $lstQuantity != 0  ) ? $lstQuantity : 0;
						$lstPosition = ( $lstPosition != '' ) ? $lstPosition : 'before';
						$lstSymbol   = ( $lstSymbol   != '' ) ? $lstSymbol   : '';

						if( in_array($lstSymbol, $this->layCurrencyKey))
							$lstSymbol = $this->layCurrency[$lstSymbol]['symbol'];

						if($this->lstDocumentType == 'HTML' )
							$lstValue    = $this->mCreateFormat($pstValue,$lstType,$lstQuantity,$lstPosition,$lstSymbol,$pstSepSymbol,$pstdec_point,$pstthousands_sep);
						else
						{
							$lstValue    = $this->mCreateFormatExcel($pstValue,$lstType,$lstQuantity,$lstPosition,$lstSymbol,$pstSepSymbol,$pstdec_point,$pstthousands_sep);
						}
					break;
				case 'Round':
						/*
						* Example of Use $pstDataType:
						* Round_f_3
						* Round_i_0
						* Round_f_4
						* Round__1_after_%
						* Round_ _5_after_EUR
						*/
						$lstType     = ( $lstType     != '' && $lstType != ' ' ) ? $lstType     : $this->mTypeData($pstValue);
						$lstQuantity = ( $lstQuantity != 0  ) ? $lstQuantity : 2;
						$lstPosition = ( $lstPosition != '' ) ? $lstPosition : 'before';
						$lstSymbol   = ( $lstSymbol   != '' ) ? $lstSymbol   : '';

						if( in_array($lstSymbol, $this->layCurrencyKey))
							$lstSymbol = $this->layCurrency[$lstSymbol]['symbol'];

						if($this->lstDocumentType == 'HTML' )
							$lstValue    = $this->mCreateFormat($pstValue,$lstType,$lstQuantity,$lstPosition,$lstSymbol,$pstSepSymbol,$pstdec_point,$pstthousands_sep);
						else
						{
							$lstValue    = $this->mCreateFormatExcel($pstValue,$lstType,$lstQuantity,$lstPosition,$lstSymbol,$pstSepSymbol,$pstdec_point,$pstthousands_sep);
						}
					break;
				case 'Money':
						/*
						* Example of Use $pstDataType:
						* Money_f_3_before_ARS
						* Money_i_0_before_MXN
						* Money_f_4_after_USD
						* Money__1_before_JPY
						* Money_ _5_after_EUR
						*/
						$lstType     = ( $lstType     != '' && $lstType != ' ' ) ? $lstType     : $this->mTypeData($pstValue);
						$lstQuantity = ( $lstQuantity != 0  ) ? $lstQuantity : (( $lstType == 'f' || $lstType == 'r' ) ? -1: 0);
						$lstPosition = ( $lstPosition != '' ) ? $lstPosition : 'before';
						$lstSymbol   = ( $lstSymbol   != '' ) ? $lstSymbol   : $this->lstDefaultCurrency;
						$lstSymbol   = $this->layCurrency[$lstSymbol]['symbol'];

						if($this->lstDocumentType == 'HTML' )
							$lstValue    = $this->mCreateFormat($pstValue,$lstType,$lstQuantity,$lstPosition,$lstSymbol,$pstSepSymbol,$pstdec_point,$pstthousands_sep);
						else
						{
							$lstValue    = $this->mCreateFormatExcel($pstValue,$lstType,$lstQuantity,$lstPosition,$lstSymbol,$pstSepSymbol,$pstdec_point,$pstthousands_sep);
						}
					break;
				case 'String':
						/*
						* Example of Use $pstDataType:
						* String_s_LowerCase
						* String_s_UpperCase
						* String_s_Title
						* String_s_UppercaseFirst
						*/
						$lstType     = ( $lstType     != '' ) ? $lstType     : 's';
						$lstQuantity = ( $lstQuantity != '' ) ? $lstQuantity : '';
						$lstPosition = ( $lstPosition != '' ) ? $lstPosition : 'after';
						$lstSymbol   = ( $lstSymbol   != '' ) ? $lstSymbol   : '';

						if($this->lstDocumentType == 'HTML' )
							$lstValue    = $this->mCreateFormatString($pstValue,$lstType,$lstQuantity,$lstPosition,$lstSymbol,$pstSepSymbol);
						else
							$lstValue    = $this->mCreateFormatStringExcel($pstValue,$lstType,$lstQuantity,$lstPosition,$lstSymbol,$pstSepSymbol);
					break;
				case 'Date':
						/*
						* Example of Use $pstDataType:
						* Date_d_d/m/Y
						* Date_d_Y-m-d H:i
						* Date_d_d-m-Y
						* Date_d_Ymd
						*/
						$lstToday    = date('d-m-Y');
						$lstType     = ( $lstType     != '' ) ? $lstType     : 's';
						$lstQuantity = ( $lstQuantity != '' ) ? $lstQuantity : 'd-m-Y';
						$lstPosition = ( $lstPosition != '' ) ? $lstPosition : 'before';
						$lstSymbol   = ( $lstSymbol   != '' ) ? $lstSymbol   : '';

						if($this->lstDocumentType == 'HTML' )
							$lstValue    = $this->mCreateFormatDate($pstValue,$lstType,$lstQuantity,$lstPosition,$lstSymbol,$pstSepSymbol);
						else
							$lstValue    = $this->mCreateFormatDateExcel($pstValue,$lstType,$lstQuantity,$lstPosition,$lstSymbol,$pstSepSymbol);
					break;
				default:
					$lstValue = $pstValue;
					break;
			}
		}
		else
		{
			error_log("Class: TableToHtml Method: mApplyFormat  Erro: The type of format indicated does not exist.");
			$lstValue = $pstValue;
		}
		return $lstValue;
	}

	private function mCreateFormatExcel($pstValue,$pstType,$pstQuantity,$pstPosition,$pstSymbol,$pstSepSymbol='',$pstdec_point='.',$pstthousands_sep=',')
	{
		$lnuTemValue = ($pstType == 'i') ? (int)$pstValue : (($pstType == 'f' || $pstType == 'r' ) ? (float)$pstValue : $pstValue);

		if( $pstType == 'i' || $pstType == 'f' || $pstType == 'r' )
		{
			$pstQuantity = ( $pstType == 'i' )? 0 : $pstQuantity;

			if( $pstType == 'f' && ( $pstQuantity === -1 || $pstQuantity === "-1") )
			{
				$layDecimal       = explode('.', (string)$lnuTemValue);
				$lnuTotalDecimal  = strlen( trim($layDecimal[1]) );
				//$lnuTemValue = number_format( $lnuTemValue, 0, $pstdec_point, $pstthousands_sep ).'.'.$lstDecimal;
				$this->lstDataTypeFormat = '#,##0.0_-';
				$this->lstValueFormat    = $lnuTemValue;
			}
			else if( $pstType == 'r' )
			{
				$lnuTemValue = round( $lnuTemValue,$pstQuantity);
				$this->lstDataTypeFormat = '#,##0.'.$this->mAddItem('0',$pstQuantity);
				$this->lstValueFormat    = $lnuTemValue;
			}
			else if( $pstType == 'r' && ( $pstQuantity === -1 || $pstQuantity === "-1") )
			{
				$lnuTemValue = round( $lnuTemValue,2);
				$this->lstDataTypeFormat = '#,##0.00';
				$this->lstValueFormat    = $lnuTemValue;
			}
			else
			{
				//$lnuTemValue = number_format( $lnuTemValue, $pstQuantity, $pstdec_point, $pstthousands_sep );

				if( $pstQuantity == 0 && $pstType == 'i' )
					$this->lstDataTypeFormat = '#,##0';
				else
					$this->lstDataTypeFormat = '#,##0.'.$this->mAddItem('0',$pstQuantity);

				$this->lstValueFormat    = $lnuTemValue;
			}
		}

		//$lstValue    = ( $pstPosition == 'before' )? $pstSymbol.$pstSepSymbol.$lnuTemValue : (( $pstPosition == 'after' )? $lnuTemValue.$pstSepSymbol.$pstSymbol : $lnuTemValue.$pstSymbol) ;
		$this->lstDataTypeFormat = ( $pstPosition == 'before' )? $pstSymbol.$pstSepSymbol.$this->lstDataTypeFormat : (( $pstPosition == 'after' )? $this->lstDataTypeFormat.$pstSepSymbol.$pstSymbol : $this->lstDataTypeFormat.$pstSymbol) ;
		return $this->lstDataTypeFormat;
	}

	private function mAddItem( $pstItem, $pnuTotal )
	{
		$lstResul = '';

		for ($xI=0; $xI < $pnuTotal; $xI++)
		{ 
			$lstResul .= $pstItem;
		}

		return $lstResul;
	}

	private function mCreateFormat($pstValue,$pstType,$pstQuantity,$pstPosition,$pstSymbol,$pstSepSymbol='',$pstdec_point='.',$pstthousands_sep=',')
	{
	    $lnuTemValue = ($pstType == 'i') ? (int)$pstValue : (($pstType == 'f' || $pstType == 'r' ) ? (float)$pstValue : $pstValue);

	    if( $pstType == 'i' || $pstType == 'f' || $pstType == 'r' )
	    {
	        $pstQuantity = ( $pstType == 'i' )? 0 : $pstQuantity;

	        if( $pstType == 'f' && ( $pstQuantity === -1 || $pstQuantity === "-1") )
	        {
	            $layDecimal  = explode('.', (string)$lnuTemValue);
	            $lstDecimal  = $layDecimal[1];
	            $lnuTemValue = number_format( $lnuTemValue, 0, $pstdec_point, $pstthousands_sep ).'.'.$lstDecimal;
	        }
	        else if( $pstType == 'r' )
	        {
	            //$lnuTemValue = number_format( $lnuTemValue, 2, $pstdec_point, $pstthousands_sep );
	            $lnuTemValue = round( $lnuTemValue,$pstQuantity);
	        }
	        else if( $pstType == 'r' && ( $pstQuantity === -1 || $pstQuantity === "-1") )
	        {
	            //$lnuTemValue = number_format( $lnuTemValue, 2, $pstdec_point, $pstthousands_sep );
	            $lnuTemValue = round( $lnuTemValue,2);
	        }
	        else
	        {
	            $lnuTemValue = number_format( $lnuTemValue, $pstQuantity, $pstdec_point, $pstthousands_sep );
	        }
	    }

	    $lstValue    = ( $pstPosition == 'before' )? $pstSymbol.$pstSepSymbol.$lnuTemValue : (( $pstPosition == 'after' )? $lnuTemValue.$pstSepSymbol.$pstSymbol : $lnuTemValue.$pstSymbol) ;

	    return $lstValue;
	}

	private function mTypeData( $pstValue )
	{
		$layType = array("boolean" =>"s","integer" =>"i","double" =>"f","float" =>"f","string" =>"s","array" =>"s","object" =>"s","resource" =>"s","NULL" =>"s","unknown type" =>"s");
		$lstType = $layType[gettype($pstValue)];
		return $lstType;
	}

	private function mCreateFormatStringExcel($pstValue,$pstType,$pstQuantity,$pstPosition,$pstSymbol='',$pstSepSymbol='')
	{
		$this->lstDataTypeFormat = '@';
		$this->lstValueFormat     = $this->mCreateFormatString($pstValue,$pstType,$pstQuantity,$pstPosition,$pstSymbol,$pstSepSymbol);
		return $this->lstDataTypeFormat; 
	}

	private function mCreateFormatString($pstValue,$pstType,$pstQuantity,$pstPosition,$pstSymbol='',$pstSepSymbol='')
	{
		switch ( $pstQuantity )
		{
			case 'UpperCase':
					$lnuTemValue = mb_strtoupper($pstValue, 'UTF-8');
					$lstValue    = ( $pstPosition == 'before' )? $pstSymbol.$pstSepSymbol.$lnuTemValue : (( $pstPosition == 'after' )? $lnuTemValue.$pstSepSymbol.$pstSymbol : $lnuTemValue.$pstSymbol) ;
				break;
			case 'LowerCase':
					$lnuTemValue = mb_strtolower($pstValue, 'UTF-8');
					$lstValue    = ( $pstPosition == 'before' )? $pstSymbol.$pstSepSymbol.$lnuTemValue : (( $pstPosition == 'after' )? $lnuTemValue.$pstSepSymbol.$pstSymbol : $lnuTemValue.$pstSymbol) ;
				break;
			case 'Title':
					$lnuTemValue = $this->mb_Title($pstValue);
					$lstValue    = ( $pstPosition == 'before' )? $pstSymbol.$pstSepSymbol.$lnuTemValue : (( $pstPosition == 'after' )? $lnuTemValue.$pstSepSymbol.$pstSymbol : $lnuTemValue.$pstSymbol) ;
				break;
			case 'UppercaseFirst':
					$lnuTemValue = $this->mb_ucfirst($pstValue);
					$lstValue    = ( $pstPosition == 'before' )? $pstSymbol.$pstSepSymbol.$lnuTemValue : (( $pstPosition == 'after' )? $lnuTemValue.$pstSepSymbol.$pstSymbol : $lnuTemValue.$pstSymbol) ;
				break;
			default:
					$lstValue = $pstValue;
				break;
		}

		return $lstValue;
	}

	private function mb_Title($string, $delimiters = array(" ", "-", ".", "'", "O'", "Mc"), $exceptions = array("de", "da", "dos", "das", "do", "I", "II", "III", "IV", "V", "VI"))
	{
		/*
		* Exceptions in lower case are words you don't want converted
		* Exceptions all in upper case are any words you don't want converted to title case
		*   but should be converted to upper case, e.g.:
		*   king henry viii or king henry Viii should be King Henry VIII
		*/
		$string = mb_convert_case($string, MB_CASE_TITLE, "UTF-8");
		foreach ($delimiters as $dlnr => $delimiter)
		{
			$words    = explode($delimiter, $string);
			$newwords = array();

			foreach ($words as $wordnr => $word)
			{
				if (in_array(mb_strtoupper($word, "UTF-8"), $exceptions))
				{
					// check exceptions list for any words that should be in upper case
					$word = mb_strtoupper($word, "UTF-8");
				}
				elseif (in_array(mb_strtolower($word, "UTF-8"), $exceptions))
				{
					// check exceptions list for any words that should be in upper case
					$word = mb_strtolower($word, "UTF-8");
				}
				elseif (!in_array($word, $exceptions))
				{
					// convert to uppercase (non-utf8 only)
					$word = ucfirst($word);
				}
				array_push($newwords, $word);
			}

			$string = join($delimiter, $newwords);
		}//foreach
		return $string;
	}

	private function mb_ucfirst($pstString)
	{
	    $lstSubString = mb_strtoupper(mb_substr($pstString, 0, 1), 'UTF-8');
	    return $lstSubString.mb_strtolower(mb_substr($pstString, 1), 'UTF-8');
	}

	private function mCreateFormatDateExcel($pstValue,$pstType = 'Date' ,$pstQuantity ='d-m-Y',$pstPosition = 'before',$pstSymbol = '',$pstSepSymbol = '')
	{
		$this->lstDataTypeFormat = $pstQuantity;
		$this->lstValueFormat    = $this->mCreateFormatDate($pstValue,$pstType,$pstQuantity,$pstPosition,$pstSymbol,$pstSepSymbol);
		return $this->lstDataTypeFormat; 
	}

	private function mCreateFormatDate($pstValue,$pstType = 'Date' ,$pstQuantity ='d-m-Y',$pstPosition = 'before',$pstSymbol = '',$pstSepSymbol = '')
	{
		$lnuTemValue = date($pstQuantity,strtotime($pstValue));
		$lstValue    = ( $pstPosition == 'before' )? $pstSymbol.$pstSepSymbol.$lnuTemValue : (( $pstPosition == 'after' )? $lnuTemValue.$pstSepSymbol.$pstSymbol : $lnuTemValue.$pstSymbol);
		return $lstValue;
	}
}
?>