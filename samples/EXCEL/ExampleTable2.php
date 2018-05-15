<?php
require_once '../ObjectTable/Header.php';
use ObjectTablePhp\Html\TableToHtml;
use ObjectTablePhp\Excel\TableToExcel;

echo "<br>";
include '../ObjectTable/Table2.php';

//-->******** Print the Table in Excel ********<--//
$lobTableExcel = new TableToExcel();
$lobTableExcel->setSpreadsheetPassword('123');
$lobTableExcel->setSpreadsheetBlocked(true);
$lobTableExcel->setStorageDirectory('Excel/');
$lobTableExcel->setFileCss( '../css/Table.css' );
//$lobTableExcel->setActiveSheet(0,'Exaple1');
$lobTableExcel->setMarginCaprion(1);
$lobTableExcel->setObjectTable($lobTable);
$lobTableExcel->mPrintObjectTableInExcel();

//-->******** Print the Table in HTML ********<--//
$lobTableHtml  = new TableToHtml();
$lobTableHtml->setObjectTable($lobTable);
echo $lobTableHtml->mPrintObjectTableInHtml();

require_once '../ObjectTable/Footer.php';
?>