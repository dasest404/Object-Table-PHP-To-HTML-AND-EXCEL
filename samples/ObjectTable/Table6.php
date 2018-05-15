<?php
use ObjectTablePhp\Core\Cell;
use ObjectTablePhp\Core\Row;
use ObjectTablePhp\Core\Caption;
use ObjectTablePhp\Core\Colgroup;
use ObjectTablePhp\Core\Section;
use ObjectTablePhp\Core\Table;

//-->******** Create the table ********<--//
$lobTable    = new Table();
$lobTable->setId('table6');
$lobTable->setClass('fht-table');

//-->******** Create Header (Thead) ********<--//
$lobSectionThead = new Section();
$lobSectionThead->setType('Thead');

//--> Row 1 Header
$lobRow  = new Row();

$lobCell = new Cell();
$lobCell->setClass('celda_encabezado_general');
$lobCell->setType('th');
$lobCell->setHtml('Title 1,1');
$lobCell->setValue('Title 1,1');
$lobCell->setRowspan(3);
$lobRow->setCell($lobCell);

$lobCell = new Cell();
$lobCell->setClass('celda_encabezado_general');
$lobCell->setType('th');
$lobCell->setHtml('Title 1,2');
$lobCell->setValue('Title 1,2');
$lobCell->setRowspan(3);
$lobRow->setCell($lobCell);

$lobCell = new Cell();
$lobCell->setClass('celda_encabezado_general');
$lobCell->setType('th');
$lobCell->setHtml('Title 1,3');
$lobCell->setValue('Title 1,3');
$lobCell->setRowspan(3);
$lobRow->setCell($lobCell);

$lobCell = new Cell();
$lobCell->setClass('celda_encabezado_general');
$lobCell->setType('th');
$lobCell->setHtml('Title 1,4');
$lobCell->setValue('Title 1,4');
$lobCell->setRowspan(3);
$lobRow->setCell($lobCell);

$lobCell = new Cell();
$lobCell->setClass('_Separador');
$lobCell->setMostrarCeros(false);
$lobCell->setType('th');
$lobCell->setHtml('');
$lobCell->setValue('');
$lobCell->setRowspan(3);
$lobRow->setCell($lobCell);

$lnuCuenta = 6;
for ($xC=0; $xC < 4 ; $xC++)
{ 
	$lobCell = new Cell();
	$lobCell->setClass('celda_encabezado_general');
	$lobCell->setType('th');
	$lobCell->setHtml('Title 1,'.$lnuCuenta);
	$lobCell->setValue('Title 1,'.$lnuCuenta);
	$lobCell->setColspan(6);
	$lobRow->setCell($lobCell);
	$lnuCuenta++;
}

$lobSectionThead->setRow($lobRow);

//--> Row 2 Header
$lobRow    = new Row();
$lnuCuenta = 1;
for ($xC=0; $xC < 8 ; $xC++)
{ 
	$lobCell = new Cell();
	$lobCell->setClass('celda_encabezado_general');
	$lobCell->setType('th');
	$lobCell->setHtml('Title 2,'.$lnuCuenta);
	$lobCell->setValue('Title 2,'.$lnuCuenta);
	$lobCell->setColspan(3);
	$lobRow->setCell($lobCell);
	$lnuCuenta++;
}
$lobSectionThead->setRow($lobRow);

//--> Row 3 Header
$lobRow    = new Row();
$lnuCuenta = 1;
for ($xC=0; $xC < 24 ; $xC++)
{ 
	$lobCell = new Cell();
	$lobCell->setClass('celda_encabezado_general');
	$lobCell->setType('th');
	$lobCell->setHtml('Title 3,'.$lnuCuenta);
	$lobCell->setValue('Title 3,'.$lnuCuenta);
	$lobRow->setCell($lobCell);
	$lnuCuenta++;
}
$lobSectionThead->setRow($lobRow);
$lobTable->setSection($lobSectionThead);

//-->******** Create Body (Tbody) ********<--//
$lobSectionTbody = new Section();
$lobSectionTbody->setType('Tbody');

//--> Row 1 Body
$lobRow  = new Row();

for ($xC=0; $xC < 4 ; $xC++)
{ 
	$lobCell = new Cell();
	$lobCell->setClass('celda_normal');
	$lobCell->setType ('td');
	$lobCell->setHtml ('data');
	$lobCell->setValue('data');
	$lobCell->setRowspan(2);
	$lobRow->setCell  ($lobCell);
}

$lobCell = new Cell();
$lobCell->setClass('_Separador');
$lobCell->setMostrarCeros(false);
$lobCell->setType ('td');
$lobCell->setHtml ('');
$lobCell->setValue('');
$lobRow->setCell  ($lobCell);

for ($xC=0; $xC < 24 ; $xC++)
{ 
	$lobCell = new Cell();
	$lobCell->setClass('celda_normal');
	$lobCell->setType ('td');
	$lobCell->setHtml ('data');
	$lobCell->setValue('data');
	$lobRow->setCell  ($lobCell);
}

$lobSectionTbody->setRow($lobRow);

//--> Row 2 Body
$lobRow  = new Row();

$lobCell = new Cell();
$lobCell->setClass('_Separador');
$lobCell->setMostrarCeros(false);
$lobCell->setType ('td');
$lobCell->setHtml ('');
$lobCell->setValue('');
$lobRow->setCell  ($lobCell);

for ($xC=0; $xC < 24 ; $xC++)
{ 
	$lobCell = new Cell();
	$lobCell->setClass('celda_normal');
	$lobCell->setType ('td');
	$lobCell->setHtml ('data');
	$lobCell->setValue('data');
	$lobRow->setCell  ($lobCell);
}

$lobSectionTbody->setRow($lobRow);

//--> Row 3 Body
$lobRow  = new Row();

$lobCell = new Cell();
$lobCell->setClass('celda_normal');
$lobCell->setType ('td');
$lobCell->setHtml ('Data');
$lobCell->setValue('Data');
$lobRow->setCell  ($lobCell);

$lobCell = new Cell();
$lobCell->setClass('celda_normal');
$lobCell->setType ('td');
$lobCell->setHtml ('Data');
$lobCell->setValue('Data');
$lobCell->setColspan(2);
$lobRow->setCell  ($lobCell);

$lobCell = new Cell();
$lobCell->setClass('celda_normal');
$lobCell->setType ('td');
$lobCell->setHtml ('Data');
$lobCell->setValue('Data');
$lobRow->setCell  ($lobCell);

$lobCell = new Cell();
$lobCell->setClass('_Separador');
$lobCell->setMostrarCeros(false);
$lobCell->setType ('td');
$lobCell->setHtml ('');
$lobCell->setValue('');
$lobRow->setCell  ($lobCell);

for ($xC=0; $xC < 24 ; $xC++)
{ 
	$lobCell = new Cell();
	$lobCell->setClass('celda_normal');
	$lobCell->setType ('td');
	$lobCell->setHtml ('data');
	$lobCell->setValue('data');
	$lobRow->setCell  ($lobCell);
}

$lobSectionTbody->setRow($lobRow);

//--> Row 4 Body
$lobRow  = new Row();

$lobCell = new Cell();
$lobCell->setClass('celda_normal');
$lobCell->setType ('td');
$lobCell->setHtml ('$Data');
$lobCell->setValue('$Data');
$lobCell->setColspan(2);
$lobRow->setCell  ($lobCell);

$lobCell = new Cell();
$lobCell->setClass('celda_normal');
$lobCell->setType ('td');
$lobCell->setHtml ('$Data');
$lobCell->setValue('$Data');
$lobCell->setColspan(2);
$lobRow->setCell  ($lobCell);

$lobCell = new Cell();
$lobCell->setClass('_Separador');
$lobCell->setMostrarCeros(false);
$lobCell->setType ('td');
$lobCell->setHtml ('');
$lobCell->setValue('');
$lobRow->setCell  ($lobCell);

for ($xC=0; $xC < 24 ; $xC++)
{ 
	$lobCell = new Cell();
	$lobCell->setClass('celda_normal');
	$lobCell->setType ('td');
	$lobCell->setHtml ('data');
	$lobCell->setValue('data');
	$lobRow->setCell  ($lobCell);
}

$lobSectionTbody->setRow($lobRow);

//--> Row 5 Body
$lobRow  = new Row();

$lobCell = new Cell();
$lobCell->setClass('celda_normal');
$lobCell->setType ('td');
$lobCell->setHtml ('data %');
$lobCell->setValue('data %');
$lobCell->setColspan(4);
$lobRow->setCell  ($lobCell);

$lobCell = new Cell();
$lobCell->setClass('_Separador');
$lobCell->setMostrarCeros(false);
$lobCell->setType ('td');
$lobCell->setHtml ('');
$lobCell->setValue('');
$lobRow->setCell  ($lobCell);

for ($xC=0; $xC < 24 ; $xC++)
{ 
	$lobCell = new Cell();
	$lobCell->setClass('celda_normal');
	$lobCell->setType ('td');
	$lobCell->setHtml ('data');
	$lobCell->setValue('data');
	$lobRow->setCell  ($lobCell);
}

$lobSectionTbody->setRow($lobRow);

//--> Row 6 Body
$lobRow  = new Row();

$lobCell = new Cell();
$lobCell->setClass('celda_normal');
$lobCell->setType ('td');
$lobCell->setHtml ('Date');
$lobCell->setValue('Date');
$lobCell->setColspan(3);
$lobRow->setCell  ($lobCell);

$lobCell = new Cell();
$lobCell->setClass('celda_normal');
$lobCell->setType ('td');
$lobCell->setHtml ('Date');
$lobCell->setValue('Date');
$lobRow->setCell  ($lobCell);

$lobCell = new Cell();
$lobCell->setClass('_Separador');
$lobCell->setMostrarCeros(false);
$lobCell->setType ('td');
$lobCell->setHtml ('');
$lobCell->setValue('');
$lobRow->setCell  ($lobCell);

for ($xC=0; $xC < 24 ; $xC++)
{ 
	$lobCell = new Cell();
	$lobCell->setClass('celda_normal');
	$lobCell->setType ('td');
	$lobCell->setHtml ('data');
	$lobCell->setValue('data');
	$lobRow->setCell  ($lobCell);
}

$lobSectionTbody->setRow($lobRow);

//--> Row 7 Body
$lobRow  = new Row();

$lobCell = new Cell();
$lobCell->setClass('celda_normal');
$lobCell->setType ('td');
$lobCell->setHtml ('Text');
$lobCell->setValue('Text');
$lobCell->setColspan(4);
$lobRow->setCell  ($lobCell);

$lobCell = new Cell();
$lobCell->setClass('_Separador');
$lobCell->setMostrarCeros(false);
$lobCell->setType ('td');
$lobCell->setHtml ('');
$lobCell->setValue('');
$lobRow->setCell  ($lobCell);

for ($xC=0; $xC < 24 ; $xC++)
{ 
	$lobCell = new Cell();
	$lobCell->setClass('celda_normal');
	$lobCell->setType ('td');
	$lobCell->setHtml ('data');
	$lobCell->setValue('data');
	$lobRow->setCell  ($lobCell);
}

$lobSectionTbody->setRow($lobRow);

//--> Row 8 Body
$lobRow  = new Row();

$lobCell = new Cell();
$lobCell->setClass('celda_normal');
$lobCell->setType ('td');
$lobCell->setHtml ('data');
$lobCell->setValue('data');
$lobRow->setCell  ($lobCell);

$lobCell = new Cell();
$lobCell->setClass('celda_normal');
$lobCell->setType ('td');
$lobCell->setHtml ('data');
$lobCell->setValue('data');
$lobRow->setCell  ($lobCell);

$lobCell = new Cell();
$lobCell->setClass('celda_normal');
$lobCell->setType ('td');
$lobCell->setHtml ('data');
$lobCell->setValue('data');
$lobCell->setColspan(2);
$lobRow->setCell  ($lobCell);

$lobCell = new Cell();
$lobCell->setClass('_Separador');
$lobCell->setMostrarCeros(false);
$lobCell->setType ('td');
$lobCell->setHtml ('');
$lobCell->setValue('');
$lobRow->setCell  ($lobCell);

for ($xC=0; $xC < 24 ; $xC++)
{ 
	$lobCell = new Cell();
	$lobCell->setClass('celda_normal');
	$lobCell->setType ('td');
	$lobCell->setHtml ('data');
	$lobCell->setValue('data');
	$lobRow->setCell  ($lobCell);
}

$lobSectionTbody->setRow($lobRow);


//-->Row 9-20 Body
for ($xTr=0; $xTr < 12; $xTr++)
{ 
	$lobRow = new Row();

	for ($xC=0; $xC < 4 ; $xC++)
	{ 
		$lobCell = new Cell();
		$lobCell->setClass('celda_normal');
		$lobCell->setType ('td');
		$lobCell->setHtml ('data');
		$lobCell->setValue('data');
		$lobRow->setCell  ($lobCell);
	}

	$lobCell = new Cell();
	$lobCell->setClass('_Separador');
	$lobCell->setMostrarCeros(false);
	$lobCell->setType ('td');
	$lobCell->setHtml ('');
	$lobCell->setValue('');
	$lobRow->setCell  ($lobCell);

	for ($xC=0; $xC < 24 ; $xC++)
	{ 
		$lobCell = new Cell();
		$lobCell->setClass('celda_normal');
		$lobCell->setType ('td');
		$lobCell->setHtml ('data');
		$lobCell->setValue('data');
		$lobRow->setCell  ($lobCell);
	}

	$lobSectionTbody->setRow($lobRow);
}

$lobTable->setSection($lobSectionTbody);

?>