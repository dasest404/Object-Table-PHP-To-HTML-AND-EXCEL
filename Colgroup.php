<?php
/**
* 
*/
class Colgroup
{
	private $lstColgroupId    = '';
	private $lstColgroupClass = '';
	private $lstColgroupStyle = '';
	private $lstColgroupSpan  = '';
	private $lstColgroupHtml  = '';
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
	public function getColgroupHtml(){ return $this->lstColgroupHtml; }

	public function mCreaColgroupColHtml()
	{
		$lstColgroupId    = ( $this->lstColgroupId    != '' ) ? ' id="'.$this->lstColgroupId.'"' : '';
		$lstColgroupClass = ( $this->lstColgroupClass != '' ) ? ' class="'.$this->lstColgroupClass.'"' : '';
		$lstColgroupStyle = ( $this->lstColgroupStyle != '' ) ? ' style="'.$this->lstColgroupStyle.'"' : '';
		$lstColgroupSpan  = ( $this->lstColgroupSpan  != '' ) ? ' span="'.$this->lstColgroupSpan.'"' : '';
		$layColgroupCol   = ( $this->layColgroupCol > 0 ) ? $this->layColgroupCol : array();
		$lnuTotalCol      = $this->getLengthColgroupCol();

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
					$lstCols  .= '<col'.$lstId.$lstClass.$lstSpan.$lstStyle.'>';
				else
					continue;
			}

			$this->lstColgroupHtml = '<colgroup'.$lstColgroupId.$lstColgroupClass.$lstColgroupSpan.$lstColgroupStyle.'>'.$lstCols.'</colgroup>';
		}
		else
			$this->lstColgroupHtml = '<colgroup'.$lstColgroupId.$lstColgroupClass.$lstColgroupSpan.$lstColgroupStyle.'></colgroup>';
	}
}
?>