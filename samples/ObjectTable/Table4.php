<?php
use ObjectTablePhp\Core\Cell;
use ObjectTablePhp\Core\Row;
use ObjectTablePhp\Core\Caption;
use ObjectTablePhp\Core\Colgroup;
use ObjectTablePhp\Core\Section;
use ObjectTablePhp\Core\Table;

//******************* Exaple4 *******************//
//-->******** Create the table ********<--//
$lobTable    = new Table();
$lobTable->setId('tabla4');
$lobTable->setClass('fht-table');

//-->******** Create Header (Thead) ********<--//
$lobSection = new Section();
$lobSection->setType('Thead');

//-->row 1 Thead
$lobRow = new Row();
	$lobCell = new Cell();
	$lobCell->setClass('celda_encabezado_general');
	$lobCell->setType('th');
	$lobCell->setHtml('Titulo 1,1');
	$lobCell->setValue('Titulo 1,1');
	$lobCell->setRowspan(3);
	$lobRow->setCell($lobCell);

	$lobCell = new Cell();
	$lobCell->setClass('celda_encabezado_general');
	$lobCell->setType('th');
	$lobCell->setHtml('Titulo 1,2 ');
	$lobCell->setValue('Titulo 1,2 ');
	$lobCell->setRowspan(3);
	$lobRow->setCell($lobCell);

	$lobCell = new Cell();
	$lobCell->setClass('celda_encabezado_general');
	$lobCell->setType('th');
	$lobCell->setHtml('Titulo 1,3');
	$lobCell->setValue('Titulo 1,3');
	$lobCell->setColspan(6);
	$lobRow->setCell($lobCell);

$lobSection->setRow($lobRow);

//-->row 2 Thead
$lobRow = new Row();
	$lobCell = new Cell();
	$lobCell->setClass('celda_encabezado_general');
	$lobCell->setType('th');
	$lobCell->setHtml('Titulo 2,1');
	$lobCell->setValue('Titulo 2,1');
	$lobCell->setColspan(3);
	$lobRow->setCell($lobCell);

	$lobCell = new Cell();
	$lobCell->setClass('celda_encabezado_general');
	$lobCell->setType('th');
	$lobCell->setHtml('Titulo 2,2');
	$lobCell->setValue('Titulo 2,2');
	$lobCell->setColspan(3);
	$lobRow->setCell($lobCell);

$lobSection->setRow($lobRow);

//-->row 3 Thead
$lobRow = new Row();
	$lobCell = new Cell();
	$lobCell->setClass('celda_encabezado_general');
	$lobCell->setType('th');
	$lobCell->setHtml('Titulo 3,1');
	$lobCell->setValue('Titulo 3,1');
	$lobRow->setCell($lobCell);

	$lobCell = new Cell();
	$lobCell->setClass('celda_encabezado_general');
	$lobCell->setType('th');
	$lobCell->setHtml('Titulo 3,2');
	$lobCell->setValue('Titulo 3,2');
	$lobRow->setCell($lobCell);

	$lobCell = new Cell();
	$lobCell->setClass('celda_encabezado_general');
	$lobCell->setType('th');
	$lobCell->setHtml('Titulo 3,3');
	$lobCell->setValue('Titulo 3,3');
	$lobRow->setCell($lobCell);

	$lobCell = new Cell();
	$lobCell->setClass('celda_encabezado_general');
	$lobCell->setType('th');
	$lobCell->setHtml('Titulo 3,4');
	$lobCell->setValue('Titulo 3,4');
	$lobRow->setCell($lobCell);

	$lobCell = new Cell();
	$lobCell->setClass('celda_encabezado_general');
	$lobCell->setType('th');
	$lobCell->setHtml('Titulo 3,5');
	$lobCell->setValue('Titulo 3,5');
	$lobRow->setCell($lobCell);

	$lobCell = new Cell();
	$lobCell->setClass('celda_encabezado_general');
	$lobCell->setType('th');
	$lobCell->setHtml('Titulo 3,6');
	$lobCell->setValue('Titulo 3,6');
	$lobRow->setCell($lobCell);
$lobSection->setRow($lobRow);

$lobTable->setSection($lobSection);

//-->******** Create Body (Tbody) ********<--//
$lobSection = new Section();
$lobSection->setType('Tbody');

//-->10 fila
for ($xTr=0; $xTr <10 ; $xTr++)
{ 
	$lobRow = new Row();

	//-->8 celdas
	for ($xTd=0; $xTd < 8; $xTd++)
	{ 
		$lobCell = new Cell();
		$lobCell->setClass('_cell_Default');
		
		if( $xTr == 4 )
		{
			if( $xTd == 3)
			{
				$lobCell->setCapsulaHtml('<strong>##</strong>');
				$lobCell->setHtml('(F'.$xTr.',C'.$xTd.')');
				$lobCell->setValue('(F'.$xTr.',C'.$xTd.')');
			}
			elseif( $xTd == 1)
			{
				$lobCell->setHtml( '<img src="../img/ok.png">' );
				$lobCell->setValue('ok' );
			}
			else
			{
				$lobCell->setDataType('Money_f_1_before_USD');
				$lobCell->setHtml( rand(100,100000) );
				$lobCell->setValue( rand(100,100000) );
			}
		}
		elseif( $xTr == 5 )
		{
			if( $xTd == 1)
			{
				$lobCell->setHtml( '<img src="../img/ok.png">' );
				$lobCell->setValue('ok' );
			}
			else
			{
				$lobCell->setCapsulaHtml('<strong>##</strong>');
				$lobCell->setHtml('(F'.$xTr.',C'.$xTd.')');
				$lobCell->setValue('(F'.$xTr.',C'.$xTd.')');
			}
		}
		else
		{
			if( $xTd == 3)
			{
				$lobCell->setCapsulaHtml('<strong>##</strong>');
				$lobCell->setHtml('(F'.$xTr.',C'.$xTd.')');
				$lobCell->setValue('(F'.$xTr.',C'.$xTd.')');
			}
			elseif( $xTd == 1)
			{
				$lobCell->setHtml( '<img src="../img/ok.png">' );
				$lobCell->setValue( 'ok' );
			}
			else
			{
				$lobCell->setHtml('(F'.$xTr.',C'.$xTd.')');
				$lobCell->setValue('(F'.$xTr.',C'.$xTd.')');
			}
		}

		$lobRow->setCell($lobCell);
	}

	$lobSection->setRow($lobRow);
}
$lobTable->setSection($lobSection);

?>