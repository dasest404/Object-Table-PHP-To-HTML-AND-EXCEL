<?php
use ObjectTablePhp\Core\Cell;
use ObjectTablePhp\Core\Row;
use ObjectTablePhp\Core\Caption;
use ObjectTablePhp\Core\Colgroup;
use ObjectTablePhp\Core\Section;
use ObjectTablePhp\Core\Table;

//******************* Exaple1 *******************//
$lnuColumnas = 5;
$lnuRowTbody = 10;

//-->******** Create the table ********<--//
$lobTable    = new Table();
$lobTable->setId('Example1');
$lobTable->setClass('fht-table');
$lobTable->setTitle('Es la primer tabla.');

//-->******** Create Caption of the Table ********<--//
$lobCaption  = new Caption();
$lobCaption->setCaption('Table 1: Table Caption Object Test.','cap1','caption');
$lobTable->setCaption( $lobCaption );

//-->******** Create Header (Thead) ********<--//
$lobSection = new Section();
$lobSection->setType('Thead');

//-->1 row
$lobRow = new Row();

for ( $xTh=1; $xTh <= $lnuColumnas ; $xTh++ )
{ 
	$lobCell = new Cell();
	$lobCell->setClass('_header');
	$lobCell->setType('th');
	$lobCell->setHtml('Titulo '.$xTh);
	$lobCell->setValue('Titulo '.$xTh);
	$lobRow->setCell($lobCell);
}

$lobSection->setRow($lobRow);
$lobTable->setSection($lobSection);

//-->******** Create Body (Tbody) ********<--//
$lobSection = new Section();
$lobSection->setType('Tbody');

for ($xTr=1; $xTr <=$lnuRowTbody ; $xTr++)
{ 
	$lobRow = new Row();
	for ($xTd=0; $xTd < $lnuColumnas; $xTd++)
	{ 
		
		$lobCell    = new Cell();
		$lobCell->setDataType('Money_f_2__USD');
		$lobCell->mcreateIdExcel( $xTr,$xTd);
		$lstIdExcel = $lobCell->getIdExcel();
		$lobCell->setId($lstIdExcel);
		$lobCell->setClass('_cell');
		$lobCell->setCapsulaHtml('<strong>##</strong>');
		$lnuValue   = rand();
		$lobCell->setHtml($lnuValue);
		$lobCell->setValue($lnuValue);
		$lobRow->setCell($lobCell);
	}
	$lobSection->setRow($lobRow);
}

$lobTable->setSection($lobSection);

?>