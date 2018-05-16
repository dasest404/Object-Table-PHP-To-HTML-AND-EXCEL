<?php
use ObjectTablePhp\Core\Cell;
use ObjectTablePhp\Core\Row;
use ObjectTablePhp\Core\Caption;
use ObjectTablePhp\Core\Colgroup;
use ObjectTablePhp\Core\Section;
use ObjectTablePhp\Core\Table;

//******************* Exaple5 *******************//
$layDatosTabla = array('Enero'=>array( 
										array('Activo 1','432','4321','432','4321','4321','00.00'),
										array('Activo 2','432','4321','432','4321','4321','00.00'),
										array('Activo 3','432','4321','432','4321','4321','00.00'),
										array('Activo 4','432','4321','432','4321','4321','00.00'),
										array('Activo 5','432','4321','432','4321','4321','00.00')
									),
						'Febrero'=>array( 
										array('Activo 1','432','4321','432','43521','4321','00.00'),
										array('Activo 2','4382','4321','4632','4321','4321','00.00'),
										array('Activo 3','432','4321','432','43241','4321','00.00')
									),
						'Marzo'=>array( 
										array('Activo 1','432','4321','432','4321','4321','00.00'),
										array('Activo 2','432','43421','432','4321','4321','00.00'),
										array('Activo 3','432','43821','432','4321','4321','00.00'),
										array('Activo 4','432','4321','4372','4321','4321','00.00'),
										array('Activo 5','432','4321','4352','4321','4321','00.00')
									),
						'Abril'=>array( 
										array('Activo 1','4832','4321','432','43281','4321','00.00'),
										array('Activo 2','432','4321','4532','4321','4321','00.00'),
										array('Activo 3','4632','4321','4832','46321','4321','00.00')
									),
						'Mayo'=>array( 
										array('Activo 1','432','4321','432','4321','4321','00.00'),
										array('Activo 2','6432','49321','432','4321','4321','00.00')
									),
						'Junio'=>array( 
										array('Activo 1','432','4321','432','4321','4321','00.00'),
										array('Activo 2','6432','49321','432','4321','4321','00.00'),
										array('Activo 3','432','43421','432','4321','4321','00.00'),
										array('Activo 4','432','43821','432','4321','4321','00.00'),
										array('Activo 5','432','4321','4372','4321','4321','00.00'),
										array('Activo 6','432','4321','4352','4321','4321','00.00')
									)
					  );

//-->******** Create the table ********<--//
$lobTable    = new Table();
$lobTable->setId('tabla5');
$lobTable->setClass('fht-table');

//-->******** Create Header (Thead) ********<--//
$lobSection = new Section();
$lobSection->setType('Thead');

//-->row 1 Thead
$lobRow = new Row();
	$lobCell = new Cell();
	$lobCell->setClass('celda_encabezado_general');
	$lobCell->setType('th');
	$lobCell->setHtml('Mes');
	$lobCell->setValue('Mes');
	$lobCell->setRowspan(3);
	$lobRow->setCell($lobCell);

	$lobCell = new Cell();
	$lobCell->setClass('celda_encabezado_general');
	$lobCell->setType('th');
	$lobCell->setHtml('Gastos');
	$lobCell->setValue('Gastos');
	$lobCell->setColspan(6);
	$lobRow->setCell($lobCell);

	$lobCell = new Cell();
	$lobCell->setClass('celda_encabezado_general');
	$lobCell->setType('th');
	$lobCell->setHtml('Total');
	$lobCell->setValue('Total');
	$lobCell->setRowspan(3);
	$lobRow->setCell($lobCell);

$lobSection->setRow($lobRow);

//-->row 2 Thead
$lobRow = new Row();
	$lobCell = new Cell();
	$lobCell->setClass('celda_encabezado_general');
	$lobCell->setType('th');
	$lobCell->setHtml('Mujeres');
	$lobCell->setValue('Mujeres');
	$lobCell->setColspan(3);
	$lobRow->setCell($lobCell);

	$lobCell = new Cell();
	$lobCell->setClass('celda_encabezado_general');
	$lobCell->setType('th');
	$lobCell->setHtml('Hombres');
	$lobCell->setValue('Hombres');
	$lobCell->setColspan(3);
	$lobRow->setCell($lobCell);

$lobSection->setRow($lobRow);

//-->row 3 Thead
$lobRow = new Row();
	$lobCell = new Cell();
	$lobCell->setClass('celda_encabezado_general');
	$lobCell->setType('th');
	$lobCell->setHtml('Concepto 1');
	$lobCell->setValue('Concepto 1');
	$lobRow->setCell($lobCell);

	$lobCell = new Cell();
	$lobCell->setClass('celda_encabezado_general');
	$lobCell->setType('th');
	$lobCell->setHtml('Concepto 2');
	$lobCell->setValue('Concepto 2');
	$lobRow->setCell($lobCell);

	$lobCell = new Cell();
	$lobCell->setClass('celda_encabezado_general');
	$lobCell->setType('th');
	$lobCell->setHtml('Concepto 3');
	$lobCell->setValue('Concepto 3');
	$lobRow->setCell($lobCell);

	$lobCell = new Cell();
	$lobCell->setClass('celda_encabezado_general');
	$lobCell->setType('th');
	$lobCell->setHtml('Concepto 1');
	$lobCell->setValue('Concepto 1');
	$lobRow->setCell($lobCell);

	$lobCell = new Cell();
	$lobCell->setClass('celda_encabezado_general');
	$lobCell->setType('th');
	$lobCell->setHtml('Concepto 2');
	$lobCell->setValue('Concepto 2');
	$lobRow->setCell($lobCell);

	$lobCell = new Cell();
	$lobCell->setClass('celda_encabezado_general');
	$lobCell->setType('th');
	$lobCell->setHtml('Concepto 3');
	$lobCell->setValue('Concepto 3');
	$lobRow->setCell($lobCell);
$lobSection->setRow($lobRow);

$lobTable->setSection($lobSection);

//-->******** Create Body (Tbody) ********<--//
$lobSection = new Section();
$lobSection->setType('Tbody');

$lnuCountRow = 0;
foreach ( $layDatosTabla as $layMes => $layDatosMeses)
{
	$lnuTotalSubRow = count($layDatosMeses);
	$lobRow         = new Row();
	$lobCell        = new Cell();
	$lobCell->setClass('celda_encabezado_general');
	$lobCell->setHtml($layMes);
	$lobCell->setValue($layMes);
	$lobCell->setRowspan($lnuTotalSubRow);
	$lobRow->setCell($lobCell);

	
	foreach ( $layDatosMeses as $layDatosMes => $layDatos) 
	{
		if( $lnuCountRow > 0 )
			$lobRow      = new Row();

		$lnuCountCell = 0;
		foreach ($layDatos as $lstValor)
		{
			$lobCell = new Cell();

			if( $lnuCountCell == 0 )
				$lobCell->setDataType('String_s_UpperCase');
			
			if( $lnuCountCell == 0 || $lnuCountCell == count($layDatos)-1 )
				$lobCell->setCapsulaHtml('<strong>##</strong>');

			$lobCell->setClass('_cell_Default');

			if( $lnuCountCell != 0 )
				$lobCell->setDataType('Money_f_3_before_USD');

			$lobCell->setHtml($lstValor);
			$lobCell->setValue($lstValor);
			$lobRow->setCell($lobCell);
			$lnuCountCell++;
		}
		$lnuCountRow ++;
		$lobSection->setRow($lobRow);
	}
	$lnuCountRow =0;
}

$lobTable->setSection($lobSection);

?>