<?php
namespace ObjectTablePhp\Core;
/**
* .
* @author    : Agustin Rios Reyes <nitsugario@gmail.com>
* @copyright : Copyright (c) 2018 nitsugario
* @package   : Core
*/
class CssParserToArray
{
	private $lstFileCss    = '';
	private $lstDataCss    = '';
	private $layCssParser  = array();

	public function setDataCss( $pstCss = '' )
	{
		$this->lstDataCss = $pstCss;
		$this->mayCssParser();
	}

	public function setFileCss( $pstFileCss )
	{
		$this->lstDataCss = file_get_contents($pstFileCss);

		if( $this->lstDataCss === false )
		{
			$this->lstDataCss    = '';
			$this->layCssParser  = array();
			error_log('Class: CssParserToArray Method: setFileCssl  Erro: No se encontró el archivo: '.$pstFileCss);
		}
		else
		{
			$this->mayCssParser();
		}
	}

	public function setProperty( $pstKey, $pstCode )
	{
		$lstKey  = mb_strtolower($pstKey, 'UTF-8');
		$lstCode = mb_strtolower($pstCode, 'UTF-8');

		if( !isset( $this->layCssParser[ $lstKey ] ) ) 
		{
			$this->layCssParser[$lstKey] = array();
		}

		$layCodes 		= explode( ";", $lstCode );

		if( count( $layCodes ) > 0 ) 
		{
			foreach( $layCodes as $lstCodeK ) 
			{
				$lstCodeK   = trim( $lstCodeK );
				$layCodeKes = explode( ":", $lstCodeK );

				if( count( $layCodeKes ) > 1 )
				{
					list( $lstCodeKey, $lstCodeValue ) = $layCodeKes;

					if( strlen( $lstCodeKey ) > 0) 
					{
						$this->layCssParser[$lstKey][trim($lstCodeKey)] = trim($lstCodeValue);
					}
				}
			}
		}
	}

	public function getDataCss()  { return $this->lstDataCss;          }
	public function getCssParser(){ return $this->layCssParser;        }
	public function getCountCss() { return count($this->layCssParser); }

	public function getStyle( $pstKey ) 
	{
		$lstKey 	            	= mb_strtolower($pstKey, 'UTF-8');
		list($lstTag, $subtag)  	= (strpos($lstKey,":") !== false) ? explode(":",$lstKey): array($lstKey,'');
		list($lstTag, $lstClassK) 	= (strpos($lstTag,".") !== false) ? explode(".",$lstTag): array($lstTag,'');
		list($lstTag, $lstidK) 	    = (strpos($lstTag,"#") !== false) ? explode("#",$lstTag): array($lstTag,'');

		$layStyle = array();

		foreach($this->layCssParser as $layCssTag => $lstValue) 
		{
			list($layCssTag, $lstSubTag) 	= (strpos($layCssTag,":") !== false) ? explode(":",$layCssTag): array($layCssTag,'');
			list($layCssTag, $lstClass) 	= (strpos($layCssTag,".") !== false) ? explode(".",$layCssTag): array($layCssTag,'');
			list($layCssTag, $lstId) 		= (strpos($layCssTag,"#") !== false) ? explode("#",$layCssTag): array($layCssTag,'');

			$lstTagMatch    = (strcmp($lstTag, $layCssTag)   == 0) | (strlen($layCssTag) == 0);
			$lstSubTagMatch = (strcmp($subtag, $lstSubTag)   == 0) | (strlen($lstSubTag) == 0);
			$lstClassMatch 	= (strcmp($lstClassK, $lstClass) == 0) | (strlen($lstClass)  == 0);
			$lstIdMatch 	= (strcmp($lstidK, $lstId)       == 0);

			if($lstTagMatch & $lstSubTagMatch & $lstClassMatch & $lstIdMatch) 
			{
				$lstTemp 	= $layCssTag;

				if((strlen($lstTemp) > 0) & (strlen($lstClass) > 0)) 
				{
					$lstTemp .= ".".$lstClass;
				}
				elseif(strlen($lstTemp) == 0) 
				{
					$lstTemp  = ".".$lstClass;
				}

				if((strlen($lstTemp) > 0) & (strlen($lstSubTag) > 0)) 
				{
					$lstTemp .= ":".$lstSubTag;
				}
				elseif(strlen($lstTemp) == 0) 
				{
					$lstTemp  = ":".$lstSubTag;
				}

				foreach($this->layCssParser[$lstTemp] as $lstProperty => $lstValue) 
				{
					$layStyle[$lstProperty] = $lstValue;
				}
			}
		}

		return $layStyle;
	}

	public function getProperty( $pstKey, $pstProperty ) 
	{
		$lstKey 		= mb_strtolower($pstKey, 'UTF-8');
		$lstProperty 	= mb_strtolower($pstProperty, 'UTF-8');
		$lstPropertyR   = '';

		if( isset( $this->layCssParser[ $lstKey ][ $lstProperty ] ) )
			$lstPropertyR 	= $this->layCssParser[ $lstKey ][ $lstProperty ];

		return $lstPropertyR;
	}

	public function getCssString() 
	{ 
		$lstCss = '';
		foreach( $this->layCssParser as $lstKey => $layPropertys ) 
		{
			$lstCss .= "\n".$lstKey." {";

			foreach( $layPropertys as $lstProperty => $lstValue ) 
			{
				$lstCss .= "\n\t$lstProperty: $lstValue;";
			}

			$lstCss .= "\n}\n";
		}

		return $lstCss;
	}

	private function mayCssParser()
	{
		if( $this->lstDataCss == '')
		{
			$this->lstDataCss    = '';
			$this->layCssParser  = array();
			error_log('Class: CssParserToArray Method: mayCssParser  Erro: No se definió CSS valido o esta vacío.');
		}
		else
		{
			$lstTemCss   = '';
			//-->eliminanmos comentarios
			$lstTemCss   = preg_replace( "/\/\*(.*)?\*\//Usi", "", $this->lstDataCss );
			//-->Separamos casa selector por el fin del mismo.
			$laySections = explode( "}", $lstTemCss );
			if( count($laySections) > 0 )
			{
				foreach ( $laySections as $lstSection)
				{
					$laySelectors = explode('{', $lstSection);

					if( count($laySelectors) > 1 )
					{
						list($lstKeys,$lstCode) = $laySelectors;
						$layKeys                = explode(',', $lstKeys);

						if( count($layKeys) > 0 )
						{
							foreach ( $layKeys as $lstKey)
							{
								if(strlen($lstKey) > 0)
								{
									$lstKey = str_replace("\n", "", $lstKey);
									$lstKey = str_replace("\\", "", $lstKey);
									$lstKey = str_replace("\r", "", $lstKey);

									$this->setProperty( trim( $lstKey ), trim( $lstCode ) );
								}
							}
						}
					}
				}
			}
		}
	}
}
?>