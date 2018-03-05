<?php
include_once('Celda.php');
include_once('Fila.php');
include_once('Caption.php');
include_once('Colgroup.php');
include_once('Seccion.php');
include_once('Tabla.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Ejemplos Tablas HTML</title>
	<link rel="stylesheet" type="text/css" href="Tablas.css">
</head>
<body>
<?php
echo "<br>";
//******************* Exaple1 *******************//
	$lobTabla    = new Tabla();

	$lobTabla->setId('Example1');
	$lobTabla->setClass('fht-table');
	$lobTabla->setTitle('Es la primer tabla.');

	//-->crear encabezado
	$lobSeccion = new Seccion();
	$lobSeccion->setType('Thead');

	//-->1 fila
	$lobFila = new Fila();

	//-->1 celdas
	$lobCelda = new Celda();
	$lobCelda->setClass('excel_cell _cell_header');
	$lobCelda->setType('th');
	$lobCelda->setHtml('Titulo 1');
	$lobFila->setCelda($lobCelda);
	//-->2 celdas
	$lobCelda = new Celda();
	$lobCelda->setClass('excel_cell _cell_header');
	$lobCelda->setType('th');
	$lobCelda->setHtml('Titulo 2');
	$lobFila->setCelda($lobCelda);
	//-->3 celdas
	$lobCelda = new Celda();
	$lobCelda->setClass('excel_cell _cell_header');
	$lobCelda->setType('th');
	$lobCelda->setHtml('Titulo 3');
	$lobFila->setCelda($lobCelda);

	$lobSeccion->setFila($lobFila);
	$lobSeccion->mCrearSeccionHtml();
	$lobTabla->setSeccion($lobSeccion);

	//-->crear cuerpo
	$lobSeccion = new Seccion();
	$lobSeccion->setType('Tbody');
	
	//-->10 fila
	for ($xTr=0; $xTr <10 ; $xTr++)
	{ 
		$lobFila = new Fila();

		//-->8 celdas
		for ($xTd=0; $xTd < 3; $xTd++)
		{ 
			$lobCelda = new Celda();
			$lobCelda->setClass('excel_cell _cell_Default');
			$lobCelda->setDataType();
			$lobCelda->setHtml($xTr.','.$xTd);
			$lobFila->setCelda($lobCelda);
		}
		$lobSeccion->setFila($lobFila);
	}

	$lobSeccion->mCrearSeccionHtml();
	$lobTabla->setSeccion($lobSeccion);

    $lobTabla->mCrearTablaHtml();

    //-->Imprimimos la tabla
    echo $lobTabla->getTablaHtml();

    echo "<br>";
//******************* Exaple2 *******************//
    $lobTabla    = new Tabla();
    $lobCaption  = new Caption();

	$lobTabla->setId('Example2');
	$lobTabla->setClass('fht-table');
	$lobTabla->setTitle('Es la Segunda tabla.');

	$lobCaption->mCrearCaptionHtmlParametros('Tabla2: prueba de objeto tabla.');
	$lobTabla->setCaption( $lobCaption );
	//-->crear encabezado
	$lobSeccion = new Seccion();
	$lobSeccion->setType('Thead');

	//-->1 fila
	$lobFila = new Fila();

	//-->1 celdas
	$lobCelda = new Celda();
	$lobCelda->setClass('excel_cell _cell_header');
	$lobCelda->setType('th');
	$lobCelda->setHtml('Titulo 1');
	$lobFila->setCelda($lobCelda);
	//-->2 celdas
	$lobCelda = new Celda();
	$lobCelda->setClass('excel_cell _cell_header');
	$lobCelda->setType('th');
	$lobCelda->setHtml('Titulo 2');
	$lobFila->setCelda($lobCelda);
	//-->3 celdas
	$lobCelda = new Celda();
	$lobCelda->setClass('excel_cell _cell_header');
	$lobCelda->setType('th');
	$lobCelda->setHtml('Titulo 3');
	$lobFila->setCelda($lobCelda);

	$lobSeccion->setFila($lobFila);
	$lobSeccion->mCrearSeccionHtml();
	$lobTabla->setSeccion($lobSeccion);

	//-->crear cuerpo
	$lobSeccion = new Seccion();
	$lobSeccion->setType('Tbody');
	
	//-->10 fila
	for ($xTr=0; $xTr <10 ; $xTr++)
	{ 
		$lobFila = new Fila();

		//-->8 celdas
		for ($xTd=0; $xTd < 3; $xTd++)
		{ 
			$lobCelda = new Celda();
			$lobCelda->setClass('excel_cell _cell_Default');
			$lobCelda->setDataType();
			$lobCelda->setHtml($xTr.','.$xTd);
			$lobFila->setCelda($lobCelda);
		}
		$lobSeccion->setFila($lobFila);
	}

	$lobSeccion->mCrearSeccionHtml();
	$lobTabla->setSeccion($lobSeccion);

	//-->crear Pie
	$lobSeccion = new Seccion();
	$lobSeccion->setType('Tfoot');

	//-->1 fila
	$lobFila = new Fila();

	//-->1 celdas
	$lobCelda = new Celda();
	$lobCelda->setClass('excel_cell _cell_header');
	$lobCelda->setType('td');
	$lobCelda->setHtml('Pie 1');
	$lobFila->setCelda($lobCelda);
	//-->2 celdas
	$lobCelda = new Celda();
	$lobCelda->setClass('excel_cell _cell_header');
	$lobCelda->setType('td');
	$lobCelda->setHtml('Pie  2');
	$lobFila->setCelda($lobCelda);
	//-->3 celdas
	$lobCelda = new Celda();
	$lobCelda->setClass('excel_cell _cell_header');
	$lobCelda->setType('td');
	$lobCelda->setHtml('Pie 3');
	$lobFila->setCelda($lobCelda);

	$lobSeccion->setFila($lobFila);
	$lobSeccion->mCrearSeccionHtml();
	$lobTabla->setSeccion($lobSeccion);
    $lobTabla->mCrearTablaHtml();

    //-->Imprimimos la tabla
    echo $lobTabla->getTablaHtml();

    echo "<br>";
//******************* Exaple3 *******************//
   	$lobCaption  = new Caption();
	$lobColgroup = new Colgroup();
	$lobTabla    = new Tabla();

	$lobTabla->setId('tabla3');
	$lobTabla->setClass('fht-table');
	$lobTabla->setTitle('Es la Tercera tabla de muestra');
	
	$lobCaption->mCrearCaptionHtmlParametros('Tabla3: prueba de objeto tabla.');

	$lobColgroup->setColgroupCol('c01','','background-color:#ccc;border: 1px solid #fff;color: red;',2);
	$lobColgroup->setColgroupCol('02c','','background-color:red');
	$lobColgroup->setColgroupCol('03c','','background-color:#0033ff;border: 1px solid #fff;',3);
	$lobColgroup->setColgroupCol('04c','','background-color:#00cccc;border: 1px solid #fff;',2);
	$lobColgroup->mCreaColgroupColHtml();

	$lobTabla->setCaption( $lobCaption );
	$lobTabla->setColgroup( $lobColgroup );

	//-->crear encabezado
	$lobSeccion = new Seccion();
	$lobSeccion->setType('Thead');
	
	//-->2 fila
	for ($xTr=0; $xTr < 2; $xTr++)
	{ 
		$lobFila = new Fila();

		//-->8 celdas
		for ($xTh=0; $xTh < 8 ; $xTh++)
		{ 
			$lobCelda = new Celda();
			$lobCelda->setClass('celda_encabezado_general');
			$lobCelda->setType('th');
			$lobCelda->setHtml('Titulo (F'.$xTr.',C'.$xTh.')');
			$lobFila->setCelda($lobCelda);
		}

		$lobSeccion->setFila($lobFila);
	}
	$lobSeccion->mCrearSeccionHtml();
	$lobTabla->setSeccion($lobSeccion);

	//-->crear cuerpo
	$lobSeccion = new Seccion();
	$lobSeccion->setType('Tbody');
	
	//-->10 fila
	for ($xTr=0; $xTr <10 ; $xTr++)
	{ 
		$lobFila = new Fila();

		//-->8 celdas
		for ($xTd=0; $xTd < 8; $xTd++)
		{ 
			$lobCelda = new Celda();
			//$lobCelda->setClass('datos');
			
			if( $xTr == 4 )
			{
				$lobCelda->setDataType('Moneda_1_Peso');
				$lobCelda->setCapsulaHtml('<div class="fechas"><strong>##</strong></div>');
				$lobCelda->setHtml( rand() );
			}
			else
			{
				$lobCelda->setDataType();
				$lobCelda->setHtml('(F'.$xTr.',C'.$xTd.')');
			}

			//if( $xTr == 6 )
			//	$lobCelda->setCapsulaHtml('<div class="fechas"><strong>##</strong></div>');

			$lobFila->setCelda($lobCelda);
		}

		$lobSeccion->setFila($lobFila);
	}
	$lobSeccion->mCrearSeccionHtml();
	$lobTabla->setSeccion($lobSeccion);
    $lobTabla->mCrearTablaHtml();

    echo $lobTabla->getTablaHtml();

    echo "<br>";
//******************* Exaple4 *******************//
	$lobTabla    = new Tabla();

	$lobTabla->setId('tabla4');
	$lobTabla->setClass('fht-table');

	//-->crear encabezado
	$lobSeccion = new Seccion();
	$lobSeccion->setType('Thead');
	
	//-->Fila 1 Thead
	$lobFila = new Fila();
		$lobCelda = new Celda();
		$lobCelda->setClass('celda_encabezado_general');
		$lobCelda->setType('th');
		$lobCelda->setHtml('Titulo 1,1');
		$lobCelda->setRowspan(3);
		$lobFila->setCelda($lobCelda);

		$lobCelda = new Celda();
		$lobCelda->setClass('celda_encabezado_general');
		$lobCelda->setType('th');
		$lobCelda->setHtml('Titulo 1,2 ');
		$lobCelda->setRowspan(3);
		$lobFila->setCelda($lobCelda);

		$lobCelda = new Celda();
		$lobCelda->setClass('celda_encabezado_general');
		$lobCelda->setType('th');
		$lobCelda->setHtml('Titulo 1,3');
		$lobCelda->setColspan(6);
		$lobFila->setCelda($lobCelda);

	$lobSeccion->setFila($lobFila);

	//-->Fila 2 Thead
	$lobFila = new Fila();
		$lobCelda = new Celda();
		$lobCelda->setClass('celda_encabezado_general');
		$lobCelda->setType('th');
		$lobCelda->setHtml('Titulo 2,1');
		$lobCelda->setColspan(3);
		$lobFila->setCelda($lobCelda);

		$lobCelda = new Celda();
		$lobCelda->setClass('celda_encabezado_general');
		$lobCelda->setType('th');
		$lobCelda->setHtml('Titulo 2,2');
		$lobCelda->setColspan(3);
		$lobFila->setCelda($lobCelda);

	$lobSeccion->setFila($lobFila);

	//-->Fila 2 Thead
	$lobFila = new Fila();
		$lobCelda = new Celda();
		$lobCelda->setClass('celda_encabezado_general');
		$lobCelda->setType('th');
		$lobCelda->setHtml('Titulo 3,1');
		$lobFila->setCelda($lobCelda);

		$lobCelda = new Celda();
		$lobCelda->setClass('celda_encabezado_general');
		$lobCelda->setType('th');
		$lobCelda->setHtml('Titulo 3,2');
		$lobFila->setCelda($lobCelda);

		$lobCelda = new Celda();
		$lobCelda->setClass('celda_encabezado_general');
		$lobCelda->setType('th');
		$lobCelda->setHtml('Titulo 3,3');
		$lobFila->setCelda($lobCelda);

		$lobCelda = new Celda();
		$lobCelda->setClass('celda_encabezado_general');
		$lobCelda->setType('th');
		$lobCelda->setHtml('Titulo 3,4');
		$lobFila->setCelda($lobCelda);

		$lobCelda = new Celda();
		$lobCelda->setClass('celda_encabezado_general');
		$lobCelda->setType('th');
		$lobCelda->setHtml('Titulo 3,5');
		$lobFila->setCelda($lobCelda);

		$lobCelda = new Celda();
		$lobCelda->setClass('celda_encabezado_general');
		$lobCelda->setType('th');
		$lobCelda->setHtml('Titulo 3,6');
		$lobFila->setCelda($lobCelda);
	$lobSeccion->setFila($lobFila);

	$lobSeccion->mCrearSeccionHtml();
	$lobTabla->setSeccion($lobSeccion);

	//-->crear cuerpo
	$lobSeccion = new Seccion();
	$lobSeccion->setType('Tbody');
	
	//-->10 fila
	for ($xTr=0; $xTr <10 ; $xTr++)
	{ 
		$lobFila = new Fila();

		//-->8 celdas
		for ($xTd=0; $xTd < 8; $xTd++)
		{ 
			$lobCelda = new Celda();
			$lobCelda->setClass('excel_cell _cell_Default');
			
			if( $xTr == 4 )
			{
				if( $xTd == 3)
				{
					$lobCelda->setCapsulaHtml('<strong>##</strong>');
					$lobCelda->setHtml('(F'.$xTr.',C'.$xTd.')');
				}
				elseif( $xTd == 1)
					$lobCelda->setHtml( '<img src="ok.png">' );
				else
				{
					$lobCelda->setDataType('Moneda_1_Peso');
					$lobCelda->setHtml( rand(100,100000) );
				}
			}
			elseif( $xTr == 5 )
			{
				if( $xTd == 1)
					$lobCelda->setHtml( '<img src="ok.png">' );
				else
				{
					$lobCelda->setCapsulaHtml('<strong>##</strong>');
					$lobCelda->setHtml('(F'.$xTr.',C'.$xTd.')');
				}
			}
			else
			{
				if( $xTd == 3)
				{
					$lobCelda->setCapsulaHtml('<strong>##</strong>');
					$lobCelda->setDataType();
					$lobCelda->setHtml('(F'.$xTr.',C'.$xTd.')');
				}
				elseif( $xTd == 1)
					$lobCelda->setHtml( '<img src="ok.png">' );
				else
				{
					$lobCelda->setDataType();
					$lobCelda->setHtml('(F'.$xTr.',C'.$xTd.')');
				}
			}

			$lobFila->setCelda($lobCelda);
		}

		$lobSeccion->setFila($lobFila);
	}
	$lobSeccion->mCrearSeccionHtml();
	$lobTabla->setSeccion($lobSeccion);
    $lobTabla->mCrearTablaHtml();

    echo $lobTabla->getTablaHtml();

    echo "<br>";
//******************* Exaple5 *******************//

    echo "<br>";
//******************* Exaple6 *******************//

    echo "<br>";
//******************* Exaple7 *******************//
?>
</body>
</html>