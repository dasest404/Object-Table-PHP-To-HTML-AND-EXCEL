<?php
require_once '../ObjectTable/Header.php';
use ObjectTablePhp\Html\TableToHtml;
use ObjectTablePhp\Excel\TableToExcel;

echo "<br>";
include '../ObjectTable/Table6.php';

//-->******** Print the Table in Excel ********<--//
$lobTableExcel = new TableToExcel();
$lobTableExcel->setSpreadsheetPassword('12345');
$lobTableExcel->setSpreadsheetBlocked(true);
$lobTableExcel->setStorageDirectory('Excel/');
$lobTableExcel->setFileCss( '../css/Table.css' );
$lobTableExcel->setObjectTable($lobTable);
$lobTableExcel->mPrintObjectTableInExcel();

//-->******** Print the Table in HTML ********<--//
$lobTableHtml  = new TableToHtml();
$lobTableHtml->setObjectTable($lobTable);
echo $lobTableHtml->mPrintObjectTableInHtml();

require_once '../ObjectTable/Footer.php';
?>