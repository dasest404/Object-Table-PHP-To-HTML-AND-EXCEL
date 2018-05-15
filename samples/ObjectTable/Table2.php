<?php
use ObjectTablePhp\Core\Cell;
use ObjectTablePhp\Core\Row;
use ObjectTablePhp\Core\Caption;
use ObjectTablePhp\Core\Colgroup;
use ObjectTablePhp\Core\Section;
use ObjectTablePhp\Core\Table;

//******************* Exaple2 *******************//
$lnuColumnas = 20;
$lnuRowTbody = 11;

//-->******** Create the table ********<--//
$lobTable    = new Table();
$lobTable->setId('Example2');
$lobTable->setClass('fht-table');

//-->******** Create Caption of the Table ********<--//
$lobCaption  = new Caption();
$lobCaption->setCaption('Table 2: Table Caption Object Test.','cap2','','color: #c5c; font-weight: 700;caption-side: bottom;padding-top: 11px;');
$lobTable->setCaption( $lobCaption );

//-->******** Create Header section(Thead) ********<--//
$lobSection = new Section();
$lobSection->setType('Thead');

//-->1 row
$lobRow = new Row();

for ( $xTh=0; $xTh < $lnuColumnas ; $xTh++ )
{ 
	$lobCell = new Cell();
	$lobCell->setClass('excel_cell _cell_header');
	$lobCell->setHtml($lobCell->mstColumnaNumeroCadena($xTh));
	$lobCell->setValue($lobCell->mstColumnaNumeroCadena($xTh));
	$lobRow->setCell($lobCell);
}

$lobSection->setRow($lobRow);
$lobTable->setSection($lobSection);

//-->******** Create Body section(Tbody) ********<--//
$lobSection = new Section();
$lobSection->setType('Tbody');

for ($xTr=1; $xTr <=$lnuRowTbody ; $xTr++)
{ 
	$lobRow = new Row();
	for ($xTd=0; $xTd < $lnuColumnas; $xTd++)
	{ 
		
		$lobCell = new Cell();
		$lobCell->mcreateIdExcel( $xTr,$xTd);
		$lstIdExcel = $lobCell->getIdExcel();
		$lobCell->setId($lstIdExcel);
		if( $xTd == 10 )
			$lobCell->setClass('excel_cell _cell_header');
		else
			$lobCell->setClass('excel_cell _cell_Default');

		
		if( $xTr == 3 || $xTr == 6 || $xTr == 9 )
		{
			if( $xTd == 10 )
			{
				$lobCell->setHtml('-->');
				$lobCell->setValue('-->');
			}
			else
			{
				$lobCell->setDataType('Decimal_f_3_before_#');
				$lobCell->setCapsulaHtml('<strong>##</strong>');
				$lobCell->setHtml('000');
				$lobCell->setValue('000');
			}
		}
		else
		{
			if( $xTd == 10 )
			{
				$lobCell->setHtml('-->');
				$lobCell->setValue('-->');
			}
			else
			{
				$lobCell->setHtml('Cell('.$xTr.','.$xTd.')');
				$lobCell->setValue('Cell('.$xTr.','.$xTd.')');
			}
		}
		$lobRow->setCell($lobCell);
	}
	$lobSection->setRow($lobRow);
}

$lobTable->setSection($lobSection);

//-->******** Create Footer section(Tfoot) ********<--//
$lobSection = new Section();
$lobSection->setType('Tfoot');

//-->1 row
$lobRow = new Row();

for ( $xTh=1; $xTh <= $lnuColumnas ; $xTh++ )
{ 
	$lobCell = new Cell();
	$lobCell->setClass('excel_cell _cell_header');
	$lobCell->setHtml('Tfoot '.$xTh);
	$lobCell->setValue('Tfoot '.$xTh);
	$lobRow->setCell($lobCell);
}

$lobSection->setRow($lobRow);
$lobTable->setSection($lobSection);

?>