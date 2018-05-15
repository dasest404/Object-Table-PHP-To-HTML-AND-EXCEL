<?php
namespace ObjectTablePhp\Core;
/**
* .
* @author    : Agustin Rios Reyes <nitsugario@gmail.com>
* @copyright : Copyright (c) 2018 nitsugario
* @package   : Core
*/
class Colgroup
{
	private $lstColgroupId    = '';
	private $lstColgroupClass = '';
	private $lstColgroupStyle = '';
	private $lstColgroupSpan  = '';
	private $layColgroupCol   = array();

	public function setColgroupId   ( $pstValor ){ $this->lstColgroupId    = $pstValor; }
	public function setColgroupClass( $pstValor ){ $this->lstColgroupClass = $pstValor; }
	public function setColgroupStyle( $pstValor ){ $this->lstColgroupStyle = $pstValor; }
	public function setColgroupSpan ( $pstValor ){ $this->lstColgroupSpan  = $pstValor; }
	public function setColgroupCols ( $payValor ){ $this->layColgroupCol   = $payValor; }

	public function setColgroupCol( $pstId='',$pstClass='',$pstStyle='',$pstSpan='' )
	{
		$this->layColgroupCol[] = array("lstId" =>$pstId,"lstClass"=>$pstClass,"lstStyle"=>$pstStyle,"lstSpan"=>$pstSpan);
	}

	public function getColgroupId   (){ return $this->lstColgroupId   ; }
	public function getColgroupClass(){ return $this->lstColgroupClass; }
	public function getColgroupStyle(){ return $this->lstColgroupStyle; }
	public function getColgroupSpan (){ return $this->lstColgroupSpan ; }
	public function getColgroupCol  (){ return $this->layColgroupCol  ; }
	public function getLengthColgroupCol(){ return count( $this->layColgroupCol )  ; }
}
?>