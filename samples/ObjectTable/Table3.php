<?php
use ObjectTablePhp\Core\Cell;
use ObjectTablePhp\Core\Row;
use ObjectTablePhp\Core\Caption;
use ObjectTablePhp\Core\Colgroup;
use ObjectTablePhp\Core\Section;
use ObjectTablePhp\Core\Table;

//******************* Exaple3 *******************//
//-->******** Create the table ********<--//
$lobTable    = new Table();
$lobTable->setId('table3');
$lobTable->setClass('fht-table');

//-->******** Create Col group of the Table ********<--//
$lobColgroup = new Colgroup();
$lobColgroup->setColgroupCol('c01','','background-color:#ccc;border: 1px solid #fff;color: red;',2);
$lobColgroup->setColgroupCol('02c','','background-color:red');
$lobColgroup->setColgroupCol('03c','','background-color:#0033ff;border: 1px solid #fff;',3);
$lobColgroup->setColgroupCol('04c','','background-color:#00cccc;border: 1px solid #fff;',2);
$lobTable->setColgroup( $lobColgroup );

//-->******** Create Caption of the Table ********<--//
$lobCaption  = new Caption();
$lobCaption->setCaption('Table 3: Example of a table with colgroup.','cap3','CaptionT3');
$lobTable->setCaption( $lobCaption );

//-->******** Create Header (Thead) ********<--//
$lobSection = new Section();
$lobSection->setType('Thead');
//-->2 row
for ($xTr=0; $xTr < 2; $xTr++)
{ 
	$lobRow = new Row();

	//-->8 cell
	for ($xTh=0; $xTh < 8 ; $xTh++)
	{ 
		$lobCell = new Cell();
		$lobCell->setClass('celda_encabezado_general');
		$lobCell->setType('th');
		$lobCell->setHtml('Titulo (F'.$xTr.',C'.$xTh.')');
		$lobCell->setValue('Titulo (F'.$xTr.',C'.$xTh.')');
		$lobRow->setCell($lobCell);
	}

	$lobSection->setRow($lobRow);
}
$lobTable->setSection($lobSection);

//-->******** Create Body (Tbody) ********<--//
$lobSection = new Section();
$lobSection->setType('Tbody');

//-->10 row
for ($xTr=0; $xTr <10 ; $xTr++)
{ 
	$lobRow = new Row();

	//-->8 cell
	for ($xTd=0; $xTd < 8; $xTd++)
	{ 
		$lobCell = new Cell();

		if( $xTr == 4 )
		{
			$lobCell->setDataType('Money_f_1_before_USD');
			$lobCell->setCapsulaHtml('<div class="fechas"><strong>##</strong></div>');
			$lobCell->setHtml( rand() );
			$lobCell->setValue( rand() );
		}
		else
		{
			$lobCell->setHtml('(F'.$xTr.',C'.$xTd.')');
			$lobCell->setValue('(F'.$xTr.',C'.$xTd.')');
		}

		$lobRow->setCell($lobCell);
	}
	$lobSection->setRow($lobRow);
}
$lobTable->setSection($lobSection);

?>