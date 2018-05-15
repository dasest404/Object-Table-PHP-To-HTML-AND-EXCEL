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
$lobCaption->setCaption('Table 1: Table Caption Object Test.','cap1');
$lobTable->setCaption( $lobCaption );

//-->******** Create Header (Thead) ********<--//
$lobSection = new Section();
$lobSection->setType('Thead');

//-->1 row
$lobRow = new Row();

for ( $xTh=1; $xTh <= $lnuColumnas ; $xTh++ )
{ 
	$lobCell = new Cell();
	$lobCell->setClass('_cell_header');
	//$lobCell->setStyle('border: 1px solid #19287A; color: #931D1D; font-size: 10px; font-weight: bold; padding: 4px; white-space: pre-line; empty-cells: show; background-color: aqua; text-align: right;');
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
		
		$lobCell = new Cell();
		$lobCell->setDataType('Date_d_d-m-Y');
		$lobCell->mcreateIdExcel( $xTr,$xTd);
		$lstIdExcel = $lobCell->getIdExcel();
		$lobCell->setId($lstIdExcel);
		$lobCell->setClass('_cell_Default');
		//$lobCell->setCapsulaHtml('<strong>##</strong>');
		//$lnuValue = rand();
		//$lnuValue = date('d-m-Y');
		$lobCell->setHtml('2018-05-15');
		$lobCell->setValue('2018-05-15');
		//$lobCell->setHtml($lstIdExcel);
		//$lobCell->setValue($lstIdExcel);
		$lobRow->setCell($lobCell);
	}
	$lobSection->setRow($lobRow);
}

$lobTable->setSection($lobSection);

?>