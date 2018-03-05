<?php
/**
* 
*/
class Caption
{
	private $lstId          = '';
	private $lstClass       = '';
	private $lstStyle       = '';
	private $lstAlign       = ''; //--> left|right|top|bottom
	private $lstText        = ''; //--> Texto a mostrar en el capitón
	private $lstCaptionHtml = '';

	public function setCaptionId   ( $pstValor ){ $this->lstId    = $pstValor;}
	public function setCaptionClass( $pstValor ){ $this->lstClass = $pstValor;}
	public function setCaptionStyle( $pstValor ){ $this->lstStyle = $pstValor;}
	public function setCaptionAlign( $pstValor ){ $this->lstAlign = $pstValor;}
	public function setCaptionText ( $pstValor ){ $this->lstText  = $pstValor;}
	public function setCaption( $pstText='', $pstId='', $pstClass='', $pstStyle='', $pstAlign='' )
	{
		$this->lstId    = $pstId;
		$this->lstClass = $pstClass;
		$this->lstStyle = $pstStyle;
		$this->lstAlign = $pstAlign;
		$this->lstText  = $pstText;
	}

	public function getCaptionId()   { return $this->lstId;   }
	public function getCaptionClass(){ return $this->lstClass;}
	public function getCaptionStyle(){ return $this->lstStyle;}
	public function getCaptionAlign(){ return $this->lstAlign;}
	public function getCaptionText() { return $this->lstText; }
	public function setCaptionStyleClaveValor  ( $pstClave, $pstValor ){ $this->lstStyle .= $pstClave.":".$pstValor.";"; }
	public function getCaptionHtml(){ return $this->lstCaptionHtml;}

	public function mCrearCaptionHtml()
	{
		$lstId      = ( $this->lstId    != '' ) ? ' id="'.$this->lstId.'"'       : ''; 
		$lstClass   = ( $this->lstClass != '' ) ? ' class="'.$this->lstClass.'"' : ''; 
		$lstStyle   = ( $this->lstStyle != '' ) ? ' style="'.$this->lstStyle.'"' : ''; 
		$lstAlign   = ( $this->lstAlign != '' ) ? ' align="'.$this->lstAlign.'"' : ''; 
		$lstText    = ( $this->lstText  != '' ) ? $this->lstText : '';
		$this->lstCaptionHtml = '<caption'.$lstId.$lstClass.$lstStyle.$lstAlign.'>'.$lstText.'</caption>';

		//return $lstCaption;
	}

	public function mCrearCaptionHtmlParametros( $pstText='', $pstId='', $pstClass='', $pstStyle='', $pstAlign='' )
	{
		$this->lstId    = $pstId;
		$this->lstClass = $pstClass;
		$this->lstStyle = $pstStyle;
		$this->lstAlign = $pstAlign;
		$this->lstText  = $pstText;

		$this->mCrearCaptionHtml();
	}
}
?>